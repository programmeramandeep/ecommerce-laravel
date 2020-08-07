@component('mail::message')
<table class="body" data-made-with-foundation="">
    <tr>
        <td class="float-center" align="center" valign="top">
            <center data-parsed="">
                <table class="spacer float-center">
                    <tbody>
                        <tr>
                            <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                        </tr>
                    </tbody>
                </table>
                <table align="center" class="container float-center">
                    <tbody>
                        <tr>
                            <td>
                                <table class="spacer">
                                    <tbody>
                                        <tr>
                                            <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row">
                                    <tbody>
                                        <tr>
                                            <th class="small-12 large-12 columns first last">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <h1>Thanks for your order.</h1>
                                                            <p>Thanks for shopping with us! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad earum ducimus, non, eveniet neque dolores voluptas architecto sed, voluptatibus aut dolorem odio. Cupiditate a recusandae, illum
                                                                cum voluptatum modi nostrum.</p>
                                                            <table class="spacer">
                                                                <tbody>
                                                                    <tr>
                                                                        <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="callout">
                                                                <tr>
                                                                    <th class="callout-inner secondary">
                                                                        <table class="row">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th class="small-12 large-6 columns first">
                                                                                        <table>
                                                                                            <tr>
                                                                                                <th>
                                                                                                    <p> <strong>Payment Method</strong><br> {{ $order->payment_gateway}} </p>
                                                                                                    <p> <strong>Email Address</strong><br> {{ $order->billing_email }} </p>
                                                                                                    <p> <strong>Order ID</strong><br> {{ $order->id }} </p>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                    <th class="small-12 large-6 columns last">
                                                                                        <table>
                                                                                            <tr>
                                                                                                <th>
                                                                                                    <p> <strong>Shipping Method</strong><br> Boat (1&ndash;2 weeks)<br> <strong>Shipping Address</strong><br> {{ $order->billing_address }}</p>
                                                                                                </th>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </th>
                                                                    <th class="expander"></th>
                                                                </tr>
                                                            </table>
                                                            <h4>Order Details</h4>
                                                            <table>
                                                                <tr>
                                                                    <th>Item</th>
                                                                    <th>#</th>
                                                                    <th>Price</th>
                                                                </tr>
                                                                @foreach ($order->products as $product)
                                                                <tr>
                                                                    <td>{{ $product->name }}</td>
                                                                    <td>{{ $product->pivot->quantity }}</td>
                                                                    <td>{{ $product->presentPrice() }}</td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td colspan="2"><b>Tax:</b></td>
                                                                    <td>{{ moneyformat($order->billing_tax, 'INR') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"><b>Discount:</b></td>
                                                                    <td>{{ moneyformat($order->billing_discount, 'INR') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"><b>Subtotal:</b></td>
                                                                    <td>{{ moneyformat($order->billing_subtotal, 'INR') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"><b>Total:</b></td>
                                                                    <td>{{ moneyformat($order->billing_total, 'INR') }}</td>
                                                                </tr>
                                                            </table>
                                                            <hr>
                                                            <h4>What's Next?</h4>
                                                            <p>Our carrier raven will prepare your order for delivery. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi necessitatibus itaque debitis laudantium doloribus quasi nostrum distinctio suscipit, magni soluta eius animi voluptatem qui velit eligendi quam praesentium provident culpa?</p>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="row footer text-center">
                                    <tbody>
                                        <tr>
                                            <th class="small-12 large-3 columns first">
                                                <table>
                                                    <tr>
                                                        <th> <img src="http://placehold.it/170x30" alt=""> </th>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="small-12 large-3 columns">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <p> Call us at 800.555.1923<br> Email us at support@discount.boat </p>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                            <th class="small-12 large-3 columns last">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <p> 123 Maple Rd<br> Campbell, CA 95112 </p>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="spacer float-center">
                    <tbody>
                        <tr>
                            <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                        </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
</table>

@endcomponent