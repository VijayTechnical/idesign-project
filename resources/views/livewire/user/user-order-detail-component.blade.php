<div>
    <!-- site__body -->
    <div class="site__body" style="margin-top: 50px;">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__title mt-2">
                    <h1 class="brand-color">My Account</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 mt-4 mt-lg-0">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Order Status</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body dash-order-card-body">
                                <table class="dash-order-table table-striped">
                                    <th>Order Id</th>
                                    <th>Status</th>
                                    <th>
                                        @if ($order->status == 'delivered')
                                            Delivered Date
                                        @elseif($order->status == 'ordered')
                                            Ordered Date
                                        @else
                                            Cancelled Date
                                        @endif
                                    </th>
                                    <th>Action</th>
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>
                                            @if($order->status == 'ordered')
                                            <p class="text-warning">{{ $order->status }}</p>
                                            @elseif($order->status == 'delivered')
                                            <p class="text-info">{{ $order->status }}</p>
                                            @else
                                            <p class="text-danger">{{ $order->status }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->status == 'delivered')
                                            <p class="text-success">{{ $order->delivered_date }}</p>
                                            @elseif($order->status == 'ordered')
                                            <p class="text-info">{{ $order->created_at->diffForHumans() }}</p>
                                            @else
                                            <p class="text-danger">{{ $order->cancelled_date }}</p>
                                            @endif
                                        </td>
                                        <td>
                                        @if($order->status == 'ordered')
                                            <a href="#" class="btn btn-danger" wire:click.prevent="cancelOrder">Cancel Order</a>
                                        @endif
                                            <a href="{{ route('user.order') }}" class="btn btn-primary">Back</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Order Details</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body dash-order-card-body">
                                <table class="dash-order-table table-striped">
                                    <tr class="text-black">
                                        <th>Product Name</th>
                                        <th>Product Cost</th>
                                        <th>Product Attributes</th>
                                        <th>Product Quantity</th>
                                        <th>Product Total Cost</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('/storage/product_image') }}/{{ $item->product->image }}"
                                                alt="{{ $item->product->name }}"
                                                style="width: 30px;height:30px;border-radius:50px;" />
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
                                        <td>
                                            @if($order->status == 'delivered' && $item->rstatus == false)
                                            <a class="btn btn-info" href="{{ route('user.review',['order_item_id'=>$item->id]) }}">Write Review</a>
                                            @endif
                                            <a class="btn btn-primary" href="{{ route('detail',['slug'=>$item->product->slug]) }}"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Order Summary</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body dash-order-card-body">
                                <table class="dash-order-table table-striped">
                                    <tr>
                                        <th>Subtotal</th>
                                        <th>Tax</th>
                                        <th>Shipping</th>
                                        <th>Total</th>
                                    </tr>
                                    <td>Rs. {{ $order->subtotal }}</td>
                                    <td>Rs. {{ $order->tax }}</td>
                                    <td>Rs. 50</td>
                                    <td>Rs. {{ $order->total }}</td>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Billing Summary</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body dash-order-card-body">
                                <table class="dash-order-table table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Line1</th>
                                        <th>Line2</th>
                                        <th>City</th>
                                        <th>Province</th>
                                        <th>Country</th>
                                    </tr>
                                    <tr>
                                        <td>{{ Illuminate\Support\Str::limit($order->firstname . ' ' . $order->lastname, 15) }}</td>
                                        <td>{{ Illuminate\Support\Str::limit($order->mobile,10) }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->line1 }}</td>
                                        <td>{{ $order->line2 }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>{{ $order->province }}</td>
                                        <td>{{ $order->country }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @if($order->is_shipping_different)
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Shipping Summary</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body dash-order-card-body">
                                <table class="dash-order-table table-striped">
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
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @endif
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Transaction Summary</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body dash-order-card-body">
                                <table class="dash-order-table table-striped">
                                    <tr>
                                        <th>Transaction Mode</th>
                                        <th>Transaction Status</th>
                                        <th>Transaction Date</th>
                                    </tr>
                                    <tr>
                                        @if($order->transaction)
                                        <td>{{ $order->transaction->mode }}</td>
                                        <td>
                                            @if ($order->transaction->status == 'pending')
                                        <p class="text-warning">{{ $order->transaction->status }}</p>
                                            @elseif($order->transaction->status == 'approved')
                                        <p class="text-success">{{ $order->transaction->status }}</p>
                                            @elseif($order->transaction->status == 'declined')
                                        <p class="text-danger">{{ $order->transaction->status }}</p>
                                            @else
                                        <p class="text-info">{{ $order->transaction->status }}</p>
                                            @endif
                                        </td>
                                        <td>{{ $order->transaction->created_at->diffForHumans() }}</td>
                                    @endif
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->
</div>
