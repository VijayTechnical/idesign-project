<div>
    <!-- site__body -->

    <div class="site__body">
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
                                Categories
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="category-container">
                <div class="row">
                    <!-- shop-products-wrapper end -->
                    <div class="col-lg-3">
                        <div class="shop-top-bar mt-30">
                            <div class="product-select-box">
                                <div class="product-short" wire:ignore>
                                    <p>Sort By:</p>
                                    <select class="nice-select" wire:model="sorting">
                                        <option value="default" selected="selected">Default sorting</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                        {{-- <option value="trending">Relevance</option>
                                        <option value="sales">Name (A - Z)</option>
                                        <option value="sales">Name (Z - A)</option>
                                        <option value="rating">Price (Low &gt; High)</option>
                                        <option value="date">Rating (Lowest)</option>
                                        <option value="price-asc">Model (A - Z)</option>
                                        <option value="price-asc">Model (Z - A)</option> --}}
                                    </select>
                                </div>
                            </div>
                            <!-- product-select-box end -->
                        </div>
                        <!--sidebar-categores-box start  -->
                        <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                            <div class="sidebar-title">
                                <h2>Office Material</h2>
                            </div>
                            <!-- category-sub-menu start -->
                            <div class="category-sub-menu">
                                @if ($categories->count() > 0)
                                    <ul>
                                        @foreach ($categories as $key => $category)
                                            <li class="has-sub"><a href="#">{{ $category->name }}</a>
                                                @if ($category->subCategories->count() > 0)
                                                    <ul>
                                                        @foreach ($category->subCategories as $sub_category)
                                                            <li class="has-sub"><a href="# ">{{ $sub_category->name }}</a>
                                                                @if ($sub_category->childCategories->count() > 0)
                                                                <ul>
                                                                    @foreach ($sub_category->childCategories as $child_category)
                                                                    <li><a href="{{ route('category',['category_slug'=>$child_category->slug]) }}">{{ $child_category->name }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <!-- category-sub-menu end -->
                        </div>

                        <!--sidebar-categores-box end  -->
                    </div>
                    <div class="col-lg-9">

                        <!-- shop-top-bar start -->

                        <!-- shop-top-bar end -->
                        <!-- shop-products-wrapper start -->
                        @if ($products->count() > 0)
                            <div class="shop-products-wrapper">
                                <div class="category-gridview-container">
                                    @foreach ($products as $key => $product)
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
                                                    <button data-toggle="modal"
                                                        wire:click.prevent="$emitTo('product-calculator-component', 'open', {{ $product->id }})"
                                                        wire:key="{{ $product->id }}"
                                                        class="btn btn-light btn-svg-icon--fake-svg product-card__wishlist price-calculator-button"
                                                        type="button" style="white-space: nowrap;">
                                                        Price Calculator
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @php
                                    $total_products = DB::table('products')->count();
                                @endphp
                                <div class="paginatoin-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <p>Showing {{ $products->count() }}-{{ $total_products }} of
                                                {{ $total_products }} item(s)</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <ul class="pagination-box">
                                                {{ $products->links('pagination::bootstrap-4') }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="text-black text-center">No products found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->
</div>
