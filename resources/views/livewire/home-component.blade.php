<div>

    <div class="site__body">
        <!-- .block-slideshow -->
        <div class="block-slideshow block-slideshow--layout--with-departments block">
            <div class="container" style="max-width: 100%;">
                <div class="rowss no-padding">
                    <div class=" d-none d-lg-block"></div>
                    @if ($sliders->count() > 0)
                        <div class="">
                            <div class="swiper-container mainbans">
                                <div class="swiper-wrapper">
                                    @foreach ($sliders as $key => $slider)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('/storage/slider_image') }}/{{ $slider->image }}"
                                                alt="{{ $slider->name }}">
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- .block-slideshow / end -->
        <!-- .block-features -->
        <div class="block block-features block-features--layout--classic">
            <div class="container">
                <div class="block-features__list">
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <i class="fa fa-truck fa-2x"></i>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Free Shipping</div>
                            <div class="block-features__subtitle">
                                For orders from Rs50
                            </div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Support 24/7</div>
                            <div class="block-features__subtitle">Call us anytime</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">100% Safety</div>
                            <div class="block-features__subtitle">
                                Only secure payments
                            </div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <i class="fa fa-percent"></i>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Hot Offers</div>
                            <div class="block-features__subtitle">
                                Discounts up to 90%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .block-features / end -->
        <!-- .block-products-carousel -->
        {{-- <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Top Sold Products</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                            <i class="fa fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    @if (count($ts_products) > 0)
                        <div class="owl-carousel">
                            @foreach ($ts_products as $key => $product)
                                <div class="block-products-carousel__column">
                                    <div class="block-products-carousel__cell">

                                        <div class="product-card product-card--hidden-actions">
                                            <button class="product-card__quickview" type="button" data-toggle="modal"
                                                wire:click.prevent="$emitTo('modal-component', 'open', {{ $product->id }})"
                                                wire:key="{{ $product->id }}">
                                                <a class="fa fa-eye"></a>
                                            </button>

                                            <div class="product-card__badges-list">
                                                <div class="product-card__badge product-card__badge--new">
                                                    New
                                                </div>
                                            </div>
                                            <div class="product-card__image product-image">
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
                                                        {{ $product->orderItems->where('rstatus', 1)->count() }}
                                                        Reviews
                                                    </div>
                                                </div>
                                            </div>

                                            @php
                                                $discount_percent = ($product->regular_price - $product->sale_price) / 100;
                                            @endphp
                                            <div class="product-card__actions">
                                                <div class="product-card__prices">Rs. {{ $product->regular_price }}
                                                </div>
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
                                                    <button href="#" data-toggle="modal"
                                                        wire:click.prevent="$emitTo('product-calculator-component', 'open', {{ $product->id }})"
                                                        wire:key="{{ $product->id }}"
                                                        class="btn btn-light btn-svg-icon--fake-svg product-card__wishlist price-calculator-button"
                                                        type="button" style="white-space: nowrap;">
                                                        Price Calculator
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-black text-center">No top selling products found.</p>
                    @endif
                </div>
            </div>
        </div> --}}
        <!-- .block-products-carousel / end -->
        <!-- .block-banner -->
        <div class="block block-banner">
            <div class="container">
                <a href="#" class="block-banner__body">
                    <div class="block-banner__image block-banner__image--desktop"
                        style="background-image: url({{ asset('user_assets/images/idesign/index-mid-banner.png') }})">
                    </div>
                    <div class="block-banner__image block-banner__image--mobile"
                        style="background-image: url({{ asset('user_assets/images/banners/banner-1-mobile.jpg') }}) ">
                    </div>

                </a>
            </div>
        </div>

        <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Recent Products</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                            <i class="fa fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    @if ($r_products->count() > 0)
                        <div class="owl-carousel">
                            @foreach ($r_products as $key => $product)
                                <div class="block-products-carousel__column">
                                    <div class="block-products-carousel__cell">

                                        <div class="product-card product-card--hidden-actions">
                                            <button class="product-card__quickview" type="button" data-toggle="modal"
                                                wire:click.prevent="$emitTo('modal-component', 'open', {{ $product->id }})"
                                                wire:key="{{ $product->id }}">
                                                <a class="fa fa-eye"></a>
                                            </button>

                                            <div class="product-card__badges-list">
                                                <div class="product-card__badge product-card__badge--new">
                                                    New
                                                </div>
                                            </div>
                                            <div class="product-card__image product-image">
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
                                                        {{ $product->orderItems->where('rstatus', 1)->count() }}
                                                        Reviews
                                                    </div>
                                                </div>
                                            </div>

                                            @php
                                                $discount_percent = ($product->regular_price - $product->sale_price) / 100;
                                            @endphp
                                            <div class="product-card__actions">
                                                <div class="product-card__prices">Rs. {{ $product->regular_price }}
                                                </div>
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
                                                    <button href="#" data-toggle="modal"
                                                        wire:click.prevent="$emitTo('product-calculator-component', 'open', {{ $product->id }})"
                                                        wire:key="{{ $product->id }}"
                                                        class="btn btn-light btn-svg-icon--fake-svg product-card__wishlist price-calculator-button"
                                                        type="button" style="white-space: nowrap;">
                                                        Price Calculator
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-black text-center">No recent Products found.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="twoad">
            <div class="container">
                <div class="row" style="margin-bottom: 18px;">
                    <div class="col-lg-6">
                        <a href="#" class="block-banner__body">
                            <img
                                src="https://cdn.sastodeal.com/salesbanner_salesbanner/m/i/microsoftteams-image_76_.png">


                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="#" class="block-banner__body">
                            <img
                                src="https://cdn.sastodeal.com/salesbanner_salesbanner/m/i/microsoftteams-image_21_.png">


                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Our Products</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                            <i class="fa fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    @if ($products->count() > 0)
                        <div class="owl-carousel">
                            @foreach ($products as $key => $product)
                                <div class="block-products-carousel__column">
                                    <div class="block-products-carousel__cell">

                                        <div class="product-card product-card--hidden-actions">
                                            <button class="product-card__quickview" type="button" data-toggle="modal"
                                                wire:click.prevent="$emitTo('modal-component', 'open', {{ $product->id }})"
                                                wire:key="{{ $product->id }}">
                                                <a class="fa fa-eye"></a>
                                            </button>

                                            <div class="product-card__badges-list">
                                                <div class="product-card__badge product-card__badge--new">
                                                    New
                                                </div>
                                            </div>
                                            <div class="product-card__image product-image">
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
                                                        {{ $product->orderItems->where('rstatus', 1)->count() }}
                                                        Reviews
                                                    </div>
                                                </div>
                                            </div>

                                            @php
                                                $discount_percent = ($product->regular_price - $product->sale_price) / 100;
                                            @endphp
                                            <div class="product-card__actions">
                                                <div class="product-card__prices">Rs.
                                                    {{ $product->regular_price }}
                                                </div>
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
                                                    <button href="#" data-toggle="modal"
                                                        wire:click.prevent="$emitTo('product-calculator-component', 'open', {{ $product->id }})"
                                                        wire:key="{{ $product->id }}"
                                                        class="btn btn-light btn-svg-icon--fake-svg product-card__wishlist price-calculator-button"
                                                        type="button" style="white-space: nowrap;">
                                                        Price Calculator
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-black text-center">No products found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
