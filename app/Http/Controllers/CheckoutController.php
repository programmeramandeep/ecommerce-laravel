<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
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
            $contents = Cart::getContent()->map(function ($item) {
                return $item->model->slug . ', ' . $item->quantity;
            })->values()->toJson();

            $discounts = Cart::getConditions()->map(function ($item) {
                if ($item->getType() != 'tax') {
                    return $item->getName() . ', ' . $item->getValue();
                }
            })->values()->toJson();

            // Set your secret key. Remember to switch to your live secret key in production!
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            Stripe::setApiKey(config('services.stripe.secret_key'));

            PaymentIntent::create([
                'amount' => Cart::getTotal() * 100,
                'currency' => 'inr',
                'payment_method_types' => ['card'],
                'receipt_email' => $request['new-email'],
                'metadata' => [
                    'content' => $contents,
                    'quantity' => Cart::getContent()->count(),
                    'discount' => $discounts,
                ],
            ]);

            /**
             * Clears cart,
             */
            Cart::clear();
            /**
             * Clears all conditions on a cart,
             */
            Cart::clearCartConditions();

            return redirect('thankyou')->with('success', 'Thankyou! Your payment has been successfully accepted!');
        } catch (CardException $e) {
            // Invalid card exception
            return back()->withErrors('Error! ' . $e->getError()->message);
        } catch (RateLimitException $e) {
            // Too many requests made to the API too quickly
            return back()->withErrors('Error! ' . $e->getError()->message);
        } catch (InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
            return back()->withErrors('Error! ' . $e->getError()->message);
        } catch (AuthenticationException $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            return back()->withErrors('Error! ' . $e->getError()->message);
        } catch (ApiConnectionException $e) {
            // Network communication with Stripe failed
            return back()->withErrors('Error! ' . $e->getError()->message);
        } catch (ApiErrorException $e) {
            // Display a very generic error to the user, and maybe send
            return back()->withErrors('Error! ' . $e->getError()->message);
        } catch (\Throwable $th) {
            return back()->withErrors('Error! ' . $th->getMessage());
        }
    }
}
