<div>
    <!-- site__body -->
    <div class="site__body">
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
                    <div class="col-12 col-lg-8 mt-4 mt-lg-0">
                        <form action="#" id="checkout-form" wire:submit.prevent="placeOrder"
                            onsubmit="$('#processing').show();">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Billing details</h5>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-body">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="firstname">First Name</label>
                                                <input type="text" class="form-control" id="firstname"
                                                    placeholder="First Name" wire:model="firstname" />
                                                @error('firstname')<span
                                                    class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Email Address" wire:model="email" />
                                                @error('email')<span
                                                    class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="country"
                                                    placeholder="Country" wire:model="country" />
                                                @error('country')<span
                                                    class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="line2">Address Line2</label>
                                                <input type="text" class="form-control" id="line2"
                                                    placeholder="Apartment, Suite, Unit, etc" wire:model="line2" />
                                                @error('line2')<span
                                                    class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="province">State/Province</label>
                                                <input type="text" class="form-control" id="province"
                                                    placeholder="State/Province" wire:model="province" />
                                                @error('province')<span
                                                    class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-xl-6 px-2">
                                            <div class="form-group">
                                                <label for="lastname">Last Name</label>
                                                <input type="text" class="form-control" id="lastname"
                                                    placeholder="Last Name" wire:model="lastname" />
                                                @error('lastname')<span
                                                    class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="text" class="form-control" id="phone"
                                                    placeholder="Phone Number" wire:model="mobile" />
                                                @error('mobile')<span
                                                    class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="line1">Address Line1</label>
                                                <input type="text" class="form-control" id="line1"
                                                    placeholder="House number and street name" wire:model="line1" />
                                                @error('line1')<span
                                                    class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="city">Town/City</label>
                                                <input type="text" class="form-control" id="city"
                                                    placeholder="Town/City" wire:model="city" />
                                                @error('city')<span
                                                    class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Company Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="company"
                                                    placeholder="Company Name" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="alternateAddressCheckbox"
                                                    name="alternateAddressCheckbox" value="1" type="checkbox"
                                                    wire:model="ship_to_different">
                                                <label class="custom-control-label text-small"
                                                    for="alternateAddressCheckbox">Alternate
                                                    billing address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($ship_to_different)
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h5>Billing details</h5>
                                    </div>
                                    <div class="card-divider"></div>
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col-12 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="s_firstname">First Name</label>
                                                    <input type="text" class="form-control" id="s_firstname"
                                                        placeholder="First Name" wire:model="s_firstname" />
                                                    @error('s_firstname')<span
                                                        class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="s_email">Email Address</label>
                                                    <input type="email" class="form-control" id="s_email"
                                                        placeholder="Email Address" wire:model="s_email" />
                                                    @error('s_email')<span
                                                        class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="s_country">Country</label>
                                                    <input type="text" class="form-control" id="s_country"
                                                        placeholder="Country" wire:model="s_country" />
                                                    @error('s_country')<span
                                                        class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="s_line2">Address Line2</label>
                                                    <input type="text" class="form-control" id="s_line2"
                                                        placeholder="Apartment, Suite, Unit, etc"
                                                        wire:model="s_line2" />
                                                    @error('s_line2')<span
                                                        class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="s_province">State/Province</label>
                                                    <input type="text" class="form-control" id="s_province"
                                                        placeholder="State/Province" wire:model="s_province" />
                                                    @error('s_province')<span
                                                        class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 col-xl-6 px-2">
                                                <div class="form-group">
                                                    <label for="s_lastname">Last Name</label>
                                                    <input type="text" class="form-control" id="s_lastname"
                                                        placeholder="Last Name" wire:model="s_lastname" />
                                                    @error('s_lastname')<span
                                                        class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="s_phone">Phone Number</label>
                                                    <input type="text" class="form-control" id="s_phone"
                                                        placeholder="Phone Number" wire:model="s_mobile" />
                                                    @error('s_mobile')<span
                                                        class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="s_line1">Address Line1</label>
                                                    <input type="text" class="form-control" id="s_line1"
                                                        placeholder="House number and street name"
                                                        wire:model="s_line1" />
                                                    @error('s_line1')<span
                                                        class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="s_city">Town/City</label>
                                                    <input type="text" class="form-control" id="s_city"
                                                        placeholder="Town/City" wire:model="s_city" />
                                                    @error('s_city')<span
                                                        class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="s_company">Company Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="s_company"
                                                        placeholder="Company Name" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-0">
                            <div class="card-body checkout-right-body">
                                <h3 class="card-title">Your Order</h3>
                                <table class="checkout__totals">
                                    @if (Cart::instance('cart')->count() > 0)
                                        <thead class="checkout__totals-header">
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="checkout__totals-products">
                                            @foreach (Cart::instance('cart')->content() as $item)
                                            <tr>
                                                <td>{{ $item->model->name }}</td>
                                                <td>Rs. {{ $item->subtotal() }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <!-- <tbody class="checkout__totals-subtotals">
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>$5,877.00</td>
                                        </tr>
                                        <tr>
                                            <th>Store Credit</th>
                                            <td>$-20.00</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td>$25.00</td>
                                        </tr>
                                    </tbody> -->
                                        <tfoot class="checkout__totals-footer">
                                            @if (session()->has('checkout'))
                                            <tr>
                                                <th>Total</th>
                                                <td>Rs. {{ Session::get('checkout')['total'] }}</td>
                                            </tr>
                                            @endif
                                        </tfoot>
                                </table>
                                @endif
                                <!-- <div class="payment-methods">
                                    <ul class="payment-methods__list">
                                        <li class="payment-methods__item payment-methods__item--active"><label
                                                class="payment-methods__item-header"><span
                                                    class="payment-methods__item-radio input-radio"><span
                                                        class="input-radio__body"><input class="input-radio__input"
                                                            name="checkout_payment_method" type="radio"
                                                            checked="checked"> <span
                                                            class="input-radio__circle"></span> </span></span><span
                                                    class="payment-methods__item-title">Direct bank
                                                    transfer</span></label>
                                            <div class="payment-methods__item-container">
                                                <div class="payment-methods__item-description text-muted">Make your
                                                    payment directly into our bank account. Please use your Order ID
                                                    as the payment reference. Your order will not be shipped until
                                                    the funds have cleared in our account.</div>
                                            </div>
                                        </li>
                                        <li class="payment-methods__item"><label
                                                class="payment-methods__item-header"><span
                                                    class="payment-methods__item-radio input-radio"><span
                                                        class="input-radio__body"><input class="input-radio__input"
                                                            name="checkout_payment_method" type="radio"> <span
                                                            class="input-radio__circle"></span> </span></span><span
                                                    class="payment-methods__item-title">Check
                                                    payments</span></label>
                                            <div class="payment-methods__item-container">
                                                <div class="payment-methods__item-description text-muted">Please
                                                    send a check to Store Name, Store Street, Store Town, Store
                                                    State / County, Store Postcode.</div>
                                            </div>
                                        </li>
                                        <li class="payment-methods__item"><label
                                                class="payment-methods__item-header"><span
                                                    class="payment-methods__item-radio input-radio"><span
                                                        class="input-radio__body"><input class="input-radio__input"
                                                            name="checkout_payment_method" type="radio"> <span
                                                            class="input-radio__circle"></span> </span></span><span
                                                    class="payment-methods__item-title">Cash on
                                                    delivery</span></label>
                                            <div class="payment-methods__item-container">
                                                <div class="payment-methods__item-description text-muted">Pay with
                                                    cash upon delivery.</div>
                                            </div>
                                        </li>
                                        <li class="payment-methods__item"><label
                                                class="payment-methods__item-header"><span
                                                    class="payment-methods__item-radio input-radio"><span
                                                        class="input-radio__body"><input class="input-radio__input"
                                                            name="checkout_payment_method" type="radio"> <span
                                                            class="input-radio__circle"></span> </span></span><span
                                                    class="payment-methods__item-title">PayPal</span></label>
                                            <div class="payment-methods__item-container">
                                                <div class="payment-methods__item-description text-muted">Pay via
                                                    PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div> -->
                                <!-- <div class="checkout__agree form-group">
                                    <div class="form-check"><span class="form-check-input input-check">
                                        <span class="input-check__body">
                                                <input class="input-check__input" type="checkbox" id="checkout-terms">
                                                <span class="input-check__box"></span>
                                                <svg class="input-check__icon" width="9px" height="7px">
                                                    <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                </svg>
                                            </span>
                                        </span>
                                        <label class="form-check-label" for="checkout-terms">I have read and agree
                                            to the website <a target="_blank" href="terms-and-conditions.html">terms
                                                and
                                                conditions</a>*</label>
                                    </div>
                                </div> -->
                                @if ($errors->isEmpty())
                                    <div wire:ignore id="processing"
                                        style="font-size: 22px;margin-bottom:20px;padding-left:20px;color:green;display:none;">
                                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        <span>Processing...</span>
                                    </div>
                                @endif
                                <button type="submit" form="checkout-form"
                                    class="btn btn-primary checkout-proceed-btn btn-block">Place
                                    Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->
</div>
