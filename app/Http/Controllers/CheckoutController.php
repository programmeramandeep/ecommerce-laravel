<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Order;
use App\OrderProduct;
use Cart;
use Stripe\Stripe;
use Stripe\Exception\CardException;
use Stripe\Exception\RateLimitException;
use Stripe\Exception\InvalidRequestException;
use Stripe\Exception\AuthenticationException;
use Stripe\Exception\ApiConnectionException;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $billing_discount;

    public function __construct()
    {
        $this->billing_discount = 0;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartCollection = Cart::getContent();

        if ($cartCollection->count() == 0) {
            return redirect()->route('shop.index');
        }

        return view('pages.checkout', compact('cartCollection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret_key'));

            PaymentIntent::create([
                'amount'               => Cart::getTotal() * 100,
                'currency'             => 'inr',
                'payment_method_types' => ['card'],
                'receipt_email'        => $request['new-email'],
                'metadata'             => [
                    'content'  => $this->getCartDetails(),
                    'quantity' => Cart::getContent()->count(),
                    'discount' => $this->getDiscountDetails(),
                ],
            ]);

            // Insert order
            $this->addToOrdersTable($request, null);

            // Clear cart
            Cart::clear();

            // Clears all conditions on a cart
            Cart::clearCartConditions();

            return redirect('thankyou')->with('success', 'Thankyou! Your payment has been successfully accepted!');
        } catch (CardException $error) {
            $this->addToOrdersTable($request, $error);
            // Invalid card exception
            return back()->withErrors('Error! ' . $error->getError()->message);
        } catch (RateLimitException $error) {
            $this->addToOrdersTable($request, $error);
            // Too many requests made to the API too quickly
            return back()->withErrors('Error! ' . $error->getError()->message);
        } catch (InvalidRequestException $error) {
            $this->addToOrdersTable($request, $error);
            // Invalid parameters were supplied to Stripe's API
            return back()->withErrors('Error! ' . $error->getError()->message);
        } catch (AuthenticationException $error) {
            $this->addToOrdersTable($request, $error);
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            return back()->withErrors('Error! ' . $error->getError()->message);
        } catch (ApiConnectionException $error) {
            $this->addToOrdersTable($request, $error);
            // Network communication with Stripe failed
            return back()->withErrors('Error! ' . $error->getError()->message);
        } catch (ApiErrorException $error) {
            $this->addToOrdersTable($request, $error);
            // Display a very generic error to the user, and maybe send
            return back()->withErrors('Error! ' . $error->getError()->message);
        } catch (\Throwable $error) {
            $this->addToOrdersTable($request, $error);
            return back()->withErrors('Error! ' . $error->getMessage());
        }
    }

    protected function addToOrdersTable($request, $error)
    {
        $order = Order::create([
            'user_id'                  => auth()->user()->id,
            'billing_email'            => $request->billing_email,
            'billing_name'             => $request->billing_firstname . ' ' . $request->billing_lastname,
            'billing_address'          => $request->billing_address_line1 . ', ' . $request->billing_address_line2,
            'billing_city'             => $request->billing_city,
            'billing_state'            => $request->billing_province,
            'billing_postalcode'       => $request->billing_postalcode,
            'billing_country'          => $request->billing_country,
            'billing_phone'            => $request->billing_phone,
            'billing_name_on_card'     => $request->billing_name_on_card,
            'billing_order_notes'      => $request->billing_order_notes,
            'billing_discount_details' => $this->getDiscountDetails(),
            'billing_discount'         => $this->billing_discount,
            'billing_tax'              => $this->getTaxDetails(),
            'billing_subtotal'         => Cart::getSubTotal(),
            'billing_total'            => Cart::getTotal(),
            'error'                    => $error
        ]);

        foreach (Cart::getContent() as $item) {
            OrderProduct::create([
                'order_id'   => $order->id,
                'product_id' => $item->model->id,
                'quantity'   => $item->quantity
            ]);
        }
    }

    protected function getDiscountDetails()
    {
        $discounts = Cart::getConditions()->map(function ($item) {
            if ($item->getType() != 'tax') {
                $this->billing_discount += $item->getValue();
                return $item->getName() . ', ' . $item->getValue();
            }
        })->values()->toJson();

        return $discounts;
    }

    protected function getCartDetails()
    {
        $contents = Cart::getContent()->map(function ($item) {
            return $item->model->slug . ', ' . $item->quantity;
        })->values()->toJson();

        return $contents;
    }

    protected function getTaxDetails()
    {
        $tax = 0;
        foreach (Cart::getConditions() as $item) {
            if ($item->getType() == 'tax') {
                $tax = $item->getCalculatedValue(Cart::getSubTotal());
            }
        }

        return $tax;
    }
}
