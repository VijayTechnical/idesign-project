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
                    <div class="col-12 col-lg-3">
                        <div class="account-nav flex-grow-1">
                            <h4 class="account-nav__title">Settings</h4>
                            @livewire('user.sidebar-component')
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-header">
                                <h5>Order History</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body dash-order-card-body">
                                <table class="dash-order-table table-striped">
                                        <tr>
                                            <th>OrderId</th>
                                            <th>Subtotal</th>
                                            <th>Discount</th>
                                            <th>Tax</th>
                                            <th>Total</th>
                                            <th>F_Name</th>
                                            <th>L_Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->subtotal }}</td>
                                            <td>{{ $order->discount }}</td>
                                            <td>{{ $order->tax }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->firstname }}</td>
                                            <td>{{ $order->lastname }}</td>
                                            <td>
                                                @if ($order->status == 'ordered')
                                                    <p class="text-warning">{{ $order->status }}</p>
                                                @elseif($order->status == 'delivered')
                                                    <p class="text-info">{{ $order->status }}</p>
                                                @else
                                                    <p class="text-danger">{{ $order->status }}</p>
                                                @endif
                                            </td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ route('user.order.detail', ['order_id' => $order->id]) }}"><i
                                                        class="fa fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach
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
