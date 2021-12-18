<div>
    <div class="site__body" style="margin-top: 50px;">
        <div class="page-header">
            <div class="page-header__container container">

            </div>
        </div>
        <div class="cart block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <table class="cart__table cart-table">
                            <thead class="cart-table__head">
                                <tr class="cart-table__row">
                                    <th
                                        class="cart-table__column
                                        cart-table__column--image">
                                        Image
                                    </th>
                                    <th
                                        class="cart-table__column
                                        cart-table__column--product">
                                        Product
                                    </th>
                                    <th
                                        class="cart-table__column
                                        cart-table__column--price">
                                        Price
                                    </th>
                                    <th
                                        class="cart-table__column
                                        cart-table__column--quantity">
                                        Quantity
                                    </th>
                                    <th
                                        class="cart-table__column
                                        cart-table__column--total">
                                        Total
                                    </th>
                                    <th
                                        class="cart-table__column
                                        cart-table__column--remove">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="cart-table__body">
                                @if (Cart::instance('cart')->count() > 0)
                                    @foreach (Cart::instance('cart')->content() as $item)
                                        <tr class="cart-table__row">
                                            <td
                                                class="cart-table__column
                                        cart-table__column--image">
                                                <div class="product-image">
                                                    <a href="#" class="product-image__body"><img
                                                            class="product-image__img"
                                                            src="{{ asset('/storage/product_image') }}/{{ $item->model->image }}"
                                                            alt="{{ $item->model->name }}" /></a>
                                                </div>
                                            </td>
                                            <td
                                                class="cart-table__column
                                        cart-table__column--product">
                                                <a href="{{ route('detail', ['slug' => $item->model->slug]) }}"
                                                    class="cart-table__product-name">{{ $item->model->name }}</a>
                                                <ul class="cart-table__options">
                                                    @foreach ($item->options as $key => $value)
                                                        <li>{{ $key }} : {{ $value }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="cart-table__column
                                        cart-table__column--price"
                                                data-title="Price">
                                                @if ($item->model->sale_price > 0)
                                                    {{ $item->model->sale_price }}
                                                @else
                                                    {{ $item->model->regular_price }}
                                                @endif
                                            </td>
                                            <td class="cart-table__column
                                        cart-table__column--quantity"
                                                data-title="Quantity">
                                                <div class="input-number">
                                                    <input
                                                        class="form-control
                                                input-number__input"
                                                        type="number" min="1" value="{{ $item->qty }}" />
                                                    <div class="input-number__add"
                                                        wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">
                                                    </div>
                                                    <div class="input-number__sub"
                                                        wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart-table__column
                                        cart-table__column--total"
                                                data-title="Total">
                                                {{ $item->subtotal() }}
                                            </td>
                                            <td
                                                class="cart-table__column
                                        cart-table__column--remove">
                                                <button type="button"
                                                    class="btn btn-light btn-sm
                                            btn-svg-icon"
                                                    wire:click.prevent="destroy('{{ $item->rowId }}')">
                                                    <svg width="12px" height="12px">
                                                        <use
                                                            xlink:href="{{ asset('user_assets/images/sprite.svg') }}#cross-12">
                                                        </use>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <p class="text-center text-black">No proucts on cart.</p>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="cart__actions">
                            <form class="cart__coupon-form" wire:submit.prevent="applyCouponCode">
                                <label for="input-coupon-code" class="sr-only">Password</label>
                                <input type="text" class="form-control" id="input-coupon-code"
                                    placeholder="Coupon Code" wire:model="couponCode" />
                                <button type="submit" class="btn btn-primary">
                                    Apply Coupon
                                </button>
                            </form>
                            <div class="cart__buttons">
                                <a href="{{ route('home') }}" class="btn btn-light">Continue
                                    Shopping</a>
                                <a href="{{ route('home') }}"
                                    class="btn btn-primary
                                    cart__update-button">Update
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Cart Totals</h3>
                                <table class="cart__totals">
                                    <thead class="cart__totals-header">
                                        <tr>
                                            <th>Subtotal</th>
                                            @if ($subtotalAfterDiscount)
                                                <td>Rs. {{ $subtotalAfterDiscount }}</td>
                                            @else
                                                <td>Rs. {{ Cart::instance('cart')->subtotal() }}</td>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody class="cart__totals-body">
                                        <tr>
                                            <th>Discount</th>
                                            @if ($discount)
                                                <td>Rs. {{ $discount }}</td>
                                            @else
                                                <td>Rs. 0.00</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td>
                                                Rs. 50
                                                <div class="cart__calc-shipping">
                                                    <!-- <a href="#">Calculate
                                                                Shipping</a> -->
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            @if ($taxAfterDiscount)
                                                <td>Rs. {{ $taxAfterDiscount }}</td>
                                            @else
                                                <td>Rs. {{ Cart::instance('cart')->tax() }}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                    <tfoot class="cart__totals-footer">
                                        <tr>
                                            <th>Total</th>
                                            @if ($totalAfterDiscount)
                                                <td>Rs. {{ $totalAfterDiscount }}</td>
                                            @else
                                                <td>Rs. {{ str_replace(',', '', Cart::instance('cart')->subtotal()) + 50 }}</td>
                                            @endif
                                        </tr>
                                    </tfoot>
                                </table>
                                <a class="btn btn-primary
                                            btn-block cart__checkout-button"
                                    href="#" wire:click.prevent="checkout">Proceed to
                                    checkout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
