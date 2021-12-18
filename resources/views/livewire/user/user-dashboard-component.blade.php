<div>
    <!-- site__body -->
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__title">
                    <h1 class="brand-color mt-2">My Account</h1>
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
                        <div class="dashboard">
                            <div class="dashboard__profile card profile-card">
                                <div class="card-body profile-card__body">
                                    <div class="profile-card__avatar">
                                        <img src="{{ asset('/storage/user_image') }}/{{ Auth::user()->profile_photo_path }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="profile-card__name">{{ Auth::user()->name }}</div>
                                    <div class="profile-card__email">{{ Auth::user()->email }}</div>
                                    <div class="profile-card__edit">
                                        <a href="{{ route('user.profile') }}" class="btn idesign-btn">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard__address card address-card address-card--featured">
                                <div class="address-card__badge">Default Information</div>
                                <div class="address-card__body">
                                    <div class="address-card__name">{{ Auth::user()->name }}</div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Total Orders</div>
                                         @php
                                             $orders = DB::table('orders')->where('user_id',Auth::user()->id)->get();
                                         @endphp
                                         {{ $orders->count() }}
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Sucessful Orders</div>
                                        <div class="address-card__row-content">
                                            @php
                                               $sucessful_orders = DB::table('orders')->where('user_id',Auth::user()->id)->where('delivered_date','>',0)->get();
                                            @endphp
                                            {{ $sucessful_orders->count() }}
                                        </div>
                                    </div>
                                    <div class="address-card__row">
                                        <div class="address-card__row-title">Email Address</div>
                                        <div class="address-card__row-content">
                                            {{ Auth::user()->email }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->
</div>
