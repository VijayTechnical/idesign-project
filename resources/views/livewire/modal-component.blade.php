<div>
    @if ($product)
        <div class="modal-dialog  modal-lg modal-dialog-centered " role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="container-fluid">
                    <div class="row">
                        <div class="bg-img d-none d-sm-flex align-items-center">
                            <!-- style="background-image: url('https://img.freepik.com/free-vector/elegant-minimal-black-yellow-business-card-template_1017-22513.jpg?size=338&ext=jpg')" -->
                            <img src="{{ asset('/storage/product_image') }}/{{ $product->image }}"
                                alt="{{ $product->name }}" height="300" width="400">
                        </div>
                        <div class="modal-content-container">
                            <h2>{{ $product->name }}</h2>
                            <div class="product-card__rating">
                                <div class="product-card__rating-stars">
                                    <div class="rating">
                                        <div class="rating__body">
                                            @php
                                                $avgrating = 0;
                                            @endphp
                                            @foreach ($product->orderItems->where('rstatus', 1) as $orderItem)
                                                @php
                                                    $avgrating = $avgrating + $orderItem->review->rating;
                                                @endphp
                                            @endforeach
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $avgrating)<i
                                                        class="fa fa-star text-warning"></i>
                                                @else
                                                    <i class="fa fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <div class="product-card__rating-legend">
                                    {{ $product->orderItems->where('rstatus', 1)->count() }} Reviews
                                </div>
                            </div>
                            @php
                                $discount_percent = ($product->regular_price - $product->sale_price) / 100;
                            @endphp
                            <div class="product-card__actions quickview-cardaction">
                                <div class="product-card__prices">
                                    Rs. {{ $product->regular_price }} <del> Rs. {{ $product->sale_price }}</del> <span
                                        class="discount_percent">{{ $discount_percent }}%</span>
                                </div>

                                <div class="quickview_availability">
                                    <p>
                                        @if ($product->status === 'instock')
                                            Availability: <span class="quickview-stock">Yes</span>
                                        @else
                                            Availability: <span class="quickview-stock">No</span>
                                        @endif
                                    </p>
                                </div>
                            </div>



                            <div class="quickview_description">
                                <p>
                                    {!! htmlspecialchars_decode($product->short_description) !!}
                                </p>
                            </div>

                            <label class="product__option-label" for="product-quantity">Quantity</label>
                            <div class="product__actions">
                                <div class="product__actions-item">
                                    <div class="input-number product__quantity product__quantity-quickview">
                                        <input id="product-quantity"
                                            class="input-number__input
                                    form-control
                                    form-control-lg"
                                            type="number" min="1" value="1" wire:model="qty" />
                                        <div class="input-number__add" wire:click.prevent="increaseQuantity"></div>
                                        <div class="input-number__sub" wire:click.prevent="decreaseQuantity"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__buttons quickview-productcard-button">
                                @if ($product->sale_price > 0)
                                <a href="#" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }})">
                                    <button class="btn btn-primary product-card__addtocart" type="button">
                                        Add To Cart
                                    </button>
                                </a>
                                @else
                                <a href="#" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }})">
                                    <button class="btn btn-primary product-card__addtocart" type="button">
                                        Add To Cart
                                    </button>
                                </a>
                                @endif
                                <button href="cart.html"
                                    class="btn btn-light btn-svg-icon--fake-svg product-card__wishlist price-calculator-button"
                                    type="button" style="white-space: nowrap;">
                                    Price Calculator
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
