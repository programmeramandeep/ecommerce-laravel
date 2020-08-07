@extends('layouts.app')

@push('extra_css')
<script src="https://js.stripe.com/v3/"></script>
@endpush

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active"><a href="{{ route('checkout.index') }}">Checkout</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- coupon-area start -->
<div class="coupon-area">
    <div class="container">
        @include('partials._messages')

        <!-- Section Title Start -->
        <div class="section-title mb-20">
            <h2>checkout</h2>
        </div>
        <!-- Section Title Start End -->
        <div class="row">
            <div class="col-lg-12">
                <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    <h3>Have a coupon?</h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="{{ route('coupon.store') }}" method="POST">
                                @csrf
                                <p class="checkout-coupon">
                                    <input type="text" class="code" placeholder="Coupon code" id="coupon_code" name="coupon_code" value="{{ old('coupon_code') }}" required />
                                    <input type="submit" value="Apply Coupon" />
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- ACCORDION END -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- coupon-area end -->
<!-- checkout-area start -->
<div class="checkout-area pt-30  pb-60">
    <form action="{{ route('checkout.store') }}" method="POST" id="payment-form" autocomplete="on">
        @csrf

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_firstname">First Name <span class="required">*</span></label>
                                    <input id="billing_firstname" type="text" class="form-control @error('billing_firstname') is-invalid @enderror" name="billing_firstname" value="{{ old('billing_firstname') }}" required autocomplete="billing_firstname" autofocus />

                                    @error('billing_firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label for="billing_lastname">Last Name <span class="required">*</span></label>
                                    <input id="billing_lastname" type="text" class="form-control @error('billing_lastname') is-invalid @enderror" name="billing_lastname" value="{{ old('billing_lastname') }}" required autocomplete="billing_lastname" />

                                    @error('billing_lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label for="billing_email">Email <span class="required">*</span></label>
                                    <input type="email" name="billing_email" id="billing_email" class="form-control @error('billing_email') is_invalid @enderror" value="{{ auth()->user()->email }}" readonly autocomplete="billing_email" />

                                    @error('billing_email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input id="billing_address_line1" type="text" class="form-control @error('billing_address_line1') is-invalid @enderror" name="billing_address_line1" value="{{ old('billing_address_line1') }}" required placeholder="Street address" autocomplete="billing_address_line1" />

                                    @error('billing_address_line1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mtb-30">
                                    <input id="billing_address_line2" type="text" class="form-control @error('billing_address_line2') is-invalid @enderror" name="billing_address_line2" value="{{ old('billing_address_line2') }}" placeholder="Apartment, suite, unit etc. (optional)" autocomplete="billing_address_line2" />

                                    @error('billing_address_line2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input id="billing_city" type="text" class="form-control @error('billing_city') is-invalid @enderror" name="billing_city" value="{{ old('billing_city') }}" required autocomplete="billing_city" />

                                    @error('billing_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>State / Province <span class="required">*</span></label>
                                    <input id="billing_province" type="text" class="form-control @error('billing_province') is-invalid @enderror" name="billing_province" value="{{ old('billing_province') }}" required autocomplete="billing_province" />

                                    @error('billing_province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input id="billing_postalcode" type="text" class="form-control @error('billing_postalcode') is-invalid @enderror" name="billing_postalcode" value="{{ old('billing_postalcode') }}" required autocomplete="billing_postalcode" />

                                    @error('billing_postalcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="country-select mb-30">
                                    <label>Country <span class="required">*</span></label>
                                    <select name="billing_country" id="billing_country" class="@error('billing_country') is-invalid @enderror" required>
                                        <option value="">Select</option>
                                        <option @if (old('billing_country')=='India' ) selected="selected" @endif value="India">
                                            India</option>
                                    </select>

                                    @error('billing_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Phone <span class="required">*</span></label>
                                    <input id="billing_phone" type="text" class="form-control @error('billing_phone') is-invalid @enderror" name="billing_phone" value="{{ old('billing_phone') }}" placeholder="+91 1234567890" required autocomplete="billing_phone" />

                                    @error('billing_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="different-address">
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Order Notes</label>
                                    <textarea id="billing_order_notes" name="billing_order_notes" class="@error('billing_order_notes') is-invalid @enderror" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery.">{{ old('billing_order_notes') }}</textarea>
                                    @error('billing_order_notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartCollection as $item)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{ $item->model->name }} <strong class="product-quantity"> ×
                                                {{ $item->quantity }}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">
                                                {{ moneyformat(($item->model->price * $item->quantity), 'INR')}}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    @foreach (Cart::getConditions() as $item)
                                    <tr>
                                        <th>
                                            {{ ucfirst($item->getType()) }} ({{ $item->getName() }})
                                            @if ($item->getType() != 'tax')
                                            <a href="javascript:void(0);" class="remove-condition" data-id="{{ $item->getName() }}" title="Remove {{ ucfirst($item->getType()) }}">
                                                <i class="fa fa-trash text-danger ml-1"></i>
                                            </a>
                                            @endif
                                        </th>
                                        <td>
                                            <span class="amount">
                                                {{ ($item->getType() != 'tax' ? '-' : '') . moneyformat($item->getCalculatedValue(Cart::getSubTotal()), 'INR') }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach

                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td>
                                            <span class="amount">{{ moneyformat(Cart::getSubTotal(), 'INR') }}</span>
                                        </td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td>
                                            <strong>
                                                <span class="amount">
                                                    {{ moneyformat(Cart::getTotal(), 'INR') }}
                                                </span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Credit Card
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse  in show" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="billing_name_on_card">Name on Card</label>
                                                    <input type="text" name="billing_name_on_card" id="billing_name_on_card" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="card-element">
                                                        Credit or debit card details
                                                    </label>
                                                    <div id="card-element">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>

                                                    <!-- Used to display form errors. -->
                                                    <div id="card-errors" role="alert"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input type="submit" id="complete-order" value="Place order" @if(Cart::getContent()->count() === 0 || Cart::getTotal() == 0) disabled @endif
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- checkout-area end -->
@endsection

@push('extra_js')
<script>
    (function() {
        // Create a Stripe client.
        var stripe = Stripe("pk_test_TYooMQauvdEDq54NiTphI7jx");
        
        // Create an instance of Elements.
        var elements = stripe.elements();
        
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Rubik", "Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                color: "#495057"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };
        
        // Create an instance of the card Element.
        var card = elements.create("card", {
            style: style,
            hidePostalCode: true
        });
        
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount("#card-element");
    
        // Handle real-time validation errors from the card Element.
        card.on("change", function(event) {
            var displayError = document.getElementById("card-errors");
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = "";
            }
        });
    
        // Handle form submission.
        var form = document.getElementById("payment-form");
        form.addEventListener("submit", function(event) {
            event.preventDefault();

            // Disable the submit button to prevent repeated clicks
            document.getElementById('complete-order').disabled = true;

            var options = {
                name: document.getElementById('billing_name_on_card').value,
                address_line1: document.getElementById('billing_address_line1').value,
                address_city: document.getElementById('billing_city').value,
                address_state: document.getElementById('billing_province').value,
                address_zip: document.getElementById('billing_postalcode').value,
            };
    
            stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById("card-errors");
                    errorElement.textContent = result.error.message;

                    // Enable the submit button
                    document.getElementById('complete-order').disabled = false;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
    
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById("payment-form");
            var hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", "stripeToken");
            hiddenInput.setAttribute("value", token.id);
            form.appendChild(hiddenInput);
        
            // Submit the form
            form.submit();
        }

        // Remove Conditions
        const classname = document.querySelectorAll('.remove-condition');
        
        Array.from(classname).forEach(function(element) {
            element.addEventListener('click', function() {
                const coupon = element.getAttribute('data-id');
            
                axios.delete(`/coupon/${coupon}/condition`)
                .then(function(response) {
                    window.location.href = '{{ route('checkout.index') }}';
                })
                .catch(function(error) {
                    console.error(error);
                    window.location.href = '{{ route('checkout.index') }}';
                })
            })
        });
    })();
</script>
@endpush