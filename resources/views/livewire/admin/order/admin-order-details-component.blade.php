<div>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Status
                        <a href="{{ route('admin.orders') }}" class="float-right btn btn-danger">Back</a>
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Order Status</th>
                                    <th>Order Date</th>
                                    <th>
                                        @if ($order->status == 'delivered')
                                        Delivery Date
                                        @else
                                        Cancelled Date
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        @if ($order->status == 'ordered')
                                        <div class="badge badge-outline-warning">{{ $order->status }}</div>
                                        @elseif($order->status == 'delivered')
                                        <div class="badge badge-outline-success">{{ $order->status }}</div>
                                        @else
                                        <div class="badge badge-outline-danger">{{ $order->status }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @if ($order->status == 'delivered')
                                        <p class='text-primary'>{{ $order->delivered_date }}</p>
                                        @else
                                        <p class='text-danger'>{{ $order->cancelled_date }}</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Cost</th>
                                    <th>Product Attributes</th>
                                    <th>Product Quantity</th>
                                    <th>Product Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('/storage/product_image') }}/{{ $item->product->image }}"
                                            alt="{{ $item->product->name }}" />
                                        <span class="pl-2">{{ $item->product->name }}</span>
                                    </td>
                                    <td>Rs. {{ $item->price }}</td>
                                    <td>
                                        @if($item->options)
                                        <ul>
                                        @foreach (unserialize($item->options) as $key => $value)
                                            <li><p><b>{{ $key }} : {{ $value }}</b></p></li>
                                        @endforeach
                                        </ul>
                                        @endif
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rs. {{ number_format($item->price * $item->quantity,2)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Order Summary</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Subtotal</th>
                                    <th>Tax</th>
                                    <th>Shipping</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Rs. {{ $order->subtotal }}</td>
                                    <td>Rs. {{ $order->tax }}</td>
                                    <td>Rs. 50</td>
                                    <td>Rs. {{ $order->total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Billing Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Line1</th>
                                    <th>Line2</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->firstname }}</td>
                                    <td>{{ $order->lastname }}</td>
                                    <td>{{ $order->mobile }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->line1 }}</td>
                                    <td>{{ $order->line2 }}</td>
                                    <td>{{ $order->city }}</td>
                                    <td>{{ $order->province }}</td>
                                    <td>{{ $order->country }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($order->is_shipping_different)
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Shipping Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Line1</th>
                                    <th>Line2</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Country</th>
                                    <th>Zip Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->shipping->firstname }}</td>
                                    <td>{{ $order->shipping->lastname }}</td>
                                    <td>{{ $order->shipping->mobile }}</td>
                                    <td>{{ $order->shipping->email }}</td>
                                    <td>{{ $order->shipping->line1 }}</td>
                                    <td>{{ $order->shipping->line2 }}</td>
                                    <td>{{ $order->shipping->city }}</td>
                                    <td>{{ $order->shipping->province }}</td>
                                    <td>{{ $order->shipping->country }}</td>
                                    <td>{{ $order->shipping->zipcode }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Transaction Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Transaction Mode</th>
                                    <th>Transaction Status</th>
                                    <th>Transaction Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->transaction->mode }}</td>
                                    <td>
                                        @if ($order->transaction->status == 'pending')
                                        <div class="badge badge-outline-warning">{{ $order->transaction->status }}</div>
                                        @elseif($order->transaction->status == 'approved')
                                        <div class="badge badge-outline-success">{{ $order->transaction->status }}</div>
                                        @elseif($order->transaction->status == 'declined')
                                        <div class="badge badge-outline-danger">{{ $order->transaction->status }}</div>
                                        @else
                                        <div class="badge badge-outline-primary">{{ $order->transaction->status }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $order->transaction->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
