<div>
    <!-- site__body -->
    <div class="site__body" style="margin-top: 70px;">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                New Year Card
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if ($product)
            <div class="block">
                <div class="container">
                    <div class="product product--layout--standard" data-layout="standard">
                        <div class="product__content">
                            @php
                                $images = explode(',', $product->images);
                            @endphp
                            <!-- .product__gallery -->
                            <div class="product__gallery" wire:ignore>
                                <div class="product-gallery">
                                    <div class="product-gallery__featured">
                                        <button class="product-gallery__zoom">
                                            <svg width="24px" height="24px">
                                                <use xlink:href="images/sprite.svg#zoom-in-24"></use>
                                            </svg>
                                        </button>
                                        <div class="owl-carousel" id="product-image">
                                            <div
                                                class="product-image
                                        product-image--location--gallery">
                                                <a href="{{ asset('/storage/product_image') }}/{{ $product->image }}"
                                                    data-width="700" data-height="700" class="product-image__body"
                                                    target="_blank"><img class="product-image__img"
                                                        src="{{ asset('/storage/product_image') }}/{{ $product->image }}"
                                                        alt="" /></a>
                                            </div>
                                            @foreach ($images as $key => $image)
                                                @if ($key > 0)
                                                    <div
                                                        class="product-image
                                                product-image--location--gallery">
                                                        <a href="{{ asset('/storage/product_image') }}/{{ $image }}"
                                                            data-width="700" data-height="700"
                                                            class="product-image__body" target="_blank"><img
                                                                class="product-image__img"
                                                                src="{{ asset('/storage/product_image') }}/{{ $image }}"
                                                                alt="" /></a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="product-gallery__carousel">
                                        <div class="owl-carousel" id="product-carousel">
                                            <a href="{{ asset('/storage/product_image') }}/{{ $product->image }}"
                                                class="product-image
                                                product-gallery__carousel-item">
                                                <div class="product-image__body">
                                                    <img class="product-image__img
                                                        product-gallery__carousel-image"
                                                        src="{{ asset('/storage/product_image') }}/{{ $product->image }}"
                                                        alt="" />
                                                </div>
                                            </a>
                                            @foreach ($images as $key => $image)
                                                @if ($key > 0)
                                                    <a href="{{ asset('/storage/product_image') }}/{{ $image }}"
                                                        class="product-image
                                           product-gallery__carousel-item">
                                                        <div class="product-image__body">
                                                            <img class="product-image__img
                                                   product-gallery__carousel-image"
                                                                src="{{ asset('/storage/product_image') }}/{{ $image }}"
                                                                alt="" />
                                                        </div>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .product__gallery / end -->
                            <!-- .product__info -->
                            <div class="product__info">
                                <div class="product__wishlist-compare">
                                    <button type="button"
                                        class="btn btn-sm
                                        btn-light btn-svg-icon"
                                        data-toggle="tooltip" data-placement="right" title="Wishlist">
                                        <i class="fa fa-heart"></i>
                                    </button>

                                </div>
                                <h1 class="product__name">
                                    {{ $product->name }}
                                </h1>
                                <div class="product__rating">
                                    <div class="product__rating-stars">
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
                                    <div class="product__rating-legend">
                                        <a href="#">{{ $product->orderItems->where('rstatus', 1)->count() }}
                                            Reviews</a>
                                    </div>
                                </div>
                                <div class="product__description">
                                    {!! htmlspecialchars_decode($product->short_description) !!}
                                </div>
                                <!-- <ul class="product__features">
                                <li>Speed: 750 RPM</li>
                                <li>Power Source: Cordless-Electric</li>
                                <li>Battery Cell Type: Lithium</li>
                                <li>Voltage: 20 Volts</li>
                                <li>Battery Capacity: 2 Ah</li>
                            </ul>
                        -->
                                <ul class="product__meta">
                                    <li class="product__meta-availability">
                                        @if ($product->status === 'instock')
                                            Availability: <span class="text-success">In Stock</span>
                                        @else
                                            Availability: <span class="text-danger">Out Of Stock</span>
                                        @endif
                                    </li>
                                    <li>Tag: <a href="#">{{ $product->tag->name }}</a></li>
                                    <li>SKU: {{ $product->SKU }}</li>
                                </ul>
                            </div>
                            <!-- .product__info / end -->
                            <!-- .product__sidebar -->
                            <div class="product__sidebar">
                                <div class="product__availability">
                                    Availability: <span class="text-success">In Stock</span>
                                </div>
                                @php
                                    $discount_percent = ($product->regular_price - $product->sale_price) / 100;
                                @endphp
                                <div class="product-card__prices">Rs. {{ $product->regular_price }}
                                </div>
                                <div class="product-card__prices">
                                    <del>Rs. {{ $product->sale_price }}</del> <span
                                        class="discount_percent">{{ $discount_percent }}%</span>
                                </div>
                                <!-- .product__options -->
                                <div class="color-picker">
                                    <div class="color-picker__item">
                                        <fieldset>
                                            <div class="form-group">
                                                @foreach ($product->attributeValues->unique('attribute_id') as $attributeValue)
                                                    <h3>{{ $attributeValue->Attribute->name }}</h3>
                                                    <select name="{{ $attributeValue->Attribute->name }}"
                                                        id="{{ $attributeValue->Attribute->name }}"
                                                        class="form-control"
                                                        id="{{ $attributeValue->Attribute->name }}"
                                                        wire:model="sattr.{{ $attributeValue->Attribute->name }}">
                                                        <option value="">Choose</option>
                                                        @foreach ($attributeValue->Attribute->attributeValues->where('product_id', $product->id) as $pav)
                                                            <option value="{{ $pav->value }}">
                                                                {{ $pav->value }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                    <label
                                                        for="{{ $attributeValue->Attribute->name }}">{{ $attributeValue->Attribute->name }}</label>
                                                @endforeach
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <form class="product__options">
                                    <div class="form-group product__option">
                                        <label class="product__option-label" for="product-quantity">Quantity</label>
                                        <div class="product__actions">
                                            <div class="product__actions-item">
                                                <div
                                                    class="input-number
                                                    product__quantity">
                                                    <input id="product-quantity"
                                                        class="input-number__input
                                                        form-control
                                                        form-control-lg"
                                                        type="number" min="1" value="1" value="1" data-max="120"
                                                        pattern="[0-9]*" wire:model="qty" />
                                                    <div class="input-number__add"
                                                        wire:click.prevent="increaseQuantity"></div>
                                                    <div class="input-number__sub"
                                                        wire:click.prevent="decreaseQuantity"></div>
                                                </div>
                                            </div>
                                            <br>


                                            <div
                                                class="product__actions-item
                                                product__actions-item--addtocart">

                                                @if ($product->sale_price > 0)
                                                    <a href="#"
                                                        wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }})">Add
                                                        to cart</a>
                                                @else
                                                    <a href="#"
                                                        wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                                                        to cart</a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </form>
                                <div class="product-price-calculator">
                                    <button
                                        class="btn-lg
                                        product-price-calculator-button"
                                        data-toggle="modal"
                                        wire:click.prevent="$emitTo('product-calculator-component', 'open', {{ $product->id }})"
                                        wire:key="{{ $product->id }}">
                                        Price calculator <i
                                            class="fas
                                            fa-calculator"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- .product__options / end -->
                        </div>
                        <!-- .product__end -->
                        <!-- <div class="product__footer">
                            <div class="product__tags tags">
                                <div class="tags__list">
                                    <a href="#">Mounts</a> <a href="#">Electrodes</a>
                                    <a href="#">Chainsaws</a>
                                </div>
                            </div>
                            <div class="product__share-links
                                    share-links">
                                <ul class="share-links__list">
                                    <li class="share-links__item
                                            share-links__item--type--like">
                                        <a href="#">Like</a>
                                    </li>
                                    <li class="share-links__item
                                            share-links__item--type--tweet">
                                        <a href="#">Tweet</a>
                                    </li>
                                    <li class="share-links__item
                                            share-links__item--type--pin">
                                        <a href="#">Pin It</a>
                                    </li>
                                    <li class="share-links__item
                                            share-links__item--type--counter">
                                        <a href="#">4K</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="product-tabs product-tabs--sticky">
                    <div class="product-tabs__list">
                        <div class="product-tabs__list-body">
                            <div class="product-tabs__list-container
                                    container">
                                <a href="#tab-description"
                                    class="product-tabs__item
                                        product-tabs__item--active">Description</a>
                                <a href="#tab-specification" class="product-tabs__item">Specification</a>
                                <a href="#tab-reviews" class="product-tabs__item">Reviews</a>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="product-tabs__content">
                            <div class="product-tabs__pane
                                    product-tabs__pane--active"
                                id="tab-description">
                                <div class="typography">
                                    <h4>Product Full Description</h4>
                                    <p>
                                        {!! htmlspecialchars_decode($product->description) !!}
                                    </p>
                                </div>
                            </div>
                            <div class="product-tabs__pane" id="tab-specification">
                                <div class="spec">
                                    <h4 class="spec__header">Specification</h4>
                                    <div class="spec__section">
                                        <h5 class="spec__section-title">General</h5>
                                        <div class="spec__row">
                                            <div class="spec__name">Material</div>
                                            <div class="spec__value">Aluminium,
                                                Plastic</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Engine
                                                Type</div>
                                            <div class="spec__value">Brushless</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Battery
                                                Voltage</div>
                                            <div class="spec__value">18 V</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Battery
                                                Type</div>
                                            <div class="spec__value">Li-lon</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Number
                                                of Speeds</div>
                                            <div class="spec__value">2</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Charge
                                                Time</div>
                                            <div class="spec__value">1.08 h</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Weight</div>
                                            <div class="spec__value">1.5 kg</div>
                                        </div>
                                    </div>
                                    <div class="spec__section">
                                        <h4 class="spec__section-title">Dimensions</h4>
                                        <div class="spec__row">
                                            <div class="spec__name">Length</div>
                                            <div class="spec__value">99 mm</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Width</div>
                                            <div class="spec__value">207 mm</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Height</div>
                                            <div class="spec__value">208 mm</div>
                                        </div>
                                    </div>
                                    <div class="spec__disclaimer">
                                        Information on technical
                                        characteristics, the delivery
                                        set, the country of manufacture and
                                        the appearance of the
                                        goods is for reference only and is
                                        based on the latest
                                        information available at the time of
                                        publication.
                                    </div>
                                </div>
                            </div>
                            <div class="product-tabs__pane" id="tab-reviews">
                                <div class="reviews-view">
                                    <div class="reviews-view__list">
                                        <h4 class="reviews-view__header">Customer
                                            Reviews</h4>
                                        <div class="reviews-list">
                                            <ol class="reviews-list__content">
                                                @if ($orderItems->count() > 0)
                                                    @foreach ($orderItems as $orderItem)
                                                        <li class="reviews-list__item">
                                                            <div class="review">
                                                                <div class="review__avatar">
                                                                    <img src="{{ asset('/storage/user_image') }}/{{ $orderItem->order->user->profile_photo_path }}"
                                                                        alt="{{ $orderItem->order->user->name }}" />
                                                                </div>
                                                                <div class="review__content">
                                                                    <div class="review__author">
                                                                        {{ $orderItem->order->user->name }}</div>
                                                                    <div class="review__rating">
                                                                        <div class="rating">
                                                                            <div class="rating__body">
                                                                                @for ($i = 0; $i < 5; $i++)
                                                                                    @if ($i < $orderItem->review->rating)
                                                                                        <i
                                                                                            class="fa fa-star text-warning"></i>
                                                                                    @else<i
                                                                                            class="fa fa-star"></i>
                                                                                    @endif
                                                                                @endfor
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="review__text">
                                                                        {{ $orderItem->review->comment }}
                                                                    </div>
                                                                    <div class="review__date">
                                                                        {{ $orderItem->review->created_at->diffForHumans() }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <p>No reviews yet on this product.
                                                    </p>
                                                @endif
                                            </ol>
                                            {{-- <div class="reviews-list__pagination">
                                                <ul
                                                    class="pagination
                                                        justify-content-center">
                                                    <li
                                                        class="page-item
                                                            disabled">
                                                        <a class="page-link
                                                                page-link--with-arrow"
                                                            href="#" aria-label="Previous">
                                                            <i class="fa fa-angle-left"></i>
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li
                                                        class="page-item
                                                            active">
                                                        <a class="page-link" href="#">2 <span
                                                                class="sr-only">(current)</span></a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link
                                                                page-link--with-arrow"
                                                            href="#" aria-label="Next">
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2" wire:ignore>
        @if ($r_products->count() > 0)
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Related Products</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow
                                block-header__arrow--left"
                            type="button">
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <button class="block-header__arrow
                                block-header__arrow--right"
                            type="button">
                            <i class="fa fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel">
                        @foreach ($r_products as $key => $product)
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div
                                        class="product-card
                                        product-card--hidden-actions">
                                        <button class="product-card__quickview" type="button" data-toggle="modal"
                                            wire:click.prevent="$emitTo('modal-component', 'open', {{ $product->id }})"
                                            wire:key="{{ $product->id }}">
                                            <a class="fa fa-eye"></a>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div
                                                class="product-card__badge
                                                product-card__badge--new">
                                                New
                                            </div>
                                        </div>
                                        <div
                                            class="product-card__image
                                            product-image">
                                            <a href="{{ route('detail', ['slug' => $product->slug]) }}"
                                                class="product-image__body"><img class="product-image__img"
                                                    src="{{ asset('/storage/product_image') }}/{{ $product->image }}"
                                                    alt="{{ $product->name }}" /></a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a
                                                    href="{{ route('detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                            </div>
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
                                                                @if ($i <= $avgrating)
                                                                    <i class="fa fa-star text-warning"></i>
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
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source:
                                                    Cordless-Electric</li>
                                                <li>Battery Cell Type:
                                                    Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability:
                                                <span class="text-success">In
                                                    Stock</span>
                                            </div>
                                            @php
                                                $discount_percent = ($product->regular_price - $product->sale_price) / 100;
                                            @endphp
                                            @if ($product->sale_price > 0)
                                                <div class="product-card__prices">
                                                    <del>Rs. {{ $product->sale_price }}</del> <span
                                                        class="discount_percent">{{ $discount_percent }}%</span>
                                                </div>
                                            @endif
                                            <div class="product-card__buttons">
                                                @if ($product->sale_price > 0)
                                                    <a href="#"
                                                        wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->sale_price }})">
                                                        <button class="btn btn-primary product-card__addtocart"
                                                            type="button">
                                                            Add To Cart
                                                        </button>
                                                    </a>
                                                @else
                                                    <a href="#"
                                                        wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">
                                                        <button class="btn btn-primary product-card__addtocart"
                                                            type="button">
                                                            Add To Cart
                                                        </button>
                                                    </a>
                                                @endif

                                                <button data-toggle="modal"
                                                    wire:click.prevent="$emitTo('product-calculator-component', 'open', {{ $product->id }})"
                                                    wire:key="{{ $product->id }}"
                                                    class="btn
                                                    btn-primary
                                                    product-card_priceCalc">
                                                    Price Calculator</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- .block-products-carousel / end -->
</div>
