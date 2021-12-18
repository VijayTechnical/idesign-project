<div>
    <!-- site__footer -->
    <footer class="site__footer">
        <div class="site-footer">
            <div class="container">
                <div class="site-footer__widgets">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="site-footer__widget footer-contacts">
                                <div class="footer-logo">
                                    <a href="{{ route('home') }}"> <img
                                            src="{{ asset('user_assets/images/idesign/logo.jpg') }}" alt="logo"></a>
                                </div>
                                @if ($about)
                                    <div class="footer-contacts__text">
                                    </div>
                                    <ul class="footer-contacts__contacts">
                                        <li>
                                            <i class="footer-contacts__icon fas fa-globe-americas"></i>
                                            {{ $about->location }}
                                        </li>
                                        <li>
                                            <i class="footer-contacts__icon far fa-envelope"></i>
                                            {{ $about->email }}
                                        </li>
                                        <li>
                                            <i class="footer-contacts__icon fas fa-mobile-alt"></i>
                                            {{ $about->phone }}
                                        </li>
                                        <li>
                                            <i class="footer-contacts__icon far fa-clock"></i>
                                            {{ $about->opening_day }} {{ $about->opening_hour }}
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">Information</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item">
                                        <a href="{{ route('about') }}" class="footer-links__link">About Us</a>
                                    </li>
                                    <li class="footer-links__item">
                                        <a href="{{ route('terms') }}" class="footer-links__link">Terms & Conditions</a>
                                    </li>
                                    <li class="footer-links__item">
                                        <a href="{{ route('privacy') }}" class="footer-links__link">Privacy Policy</a>
                                    </li>
                                    <li class="footer-links__item">
                                        <a href="{{ route('contact') }}" class="footer-links__link">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">My Account</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item">
                                        <a href="{{ route('user.dashboard') }}"
                                            class="footer-links__link">Dashboard</a>
                                    </li>
                                    <!-- <li class="footer-links__item">
                        <a href="#" class="footer-links__link">Order History</a>
                      </li> -->
                                    <li class="footer-links__item">
                                        <a href="{{ route('user.order') }}" class="footer-links__link">Order
                                            History</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="site-footer__widget footer-newsletter">
                                <h5 class="footer-newsletter__title">Newsletter</h5>
                                <div class="footer-newsletter__text">
                                    Subscribe to know about great deals.
                                </div>
                                <form action="#" class="footer-newsletter__form" wire:submit.prevent="addSubscriber()">
                                    <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                                    <input type="text" class="footer-newsletter__form-input form-control"
                                        id="footer-newsletter-address" placeholder="Email Address..."
                                        wire:model="email" />
                                    @error('email')
                                        <span class="text-black mt-1">{{ $message }}</span>
                                    @enderror
                                    <button type="submit" class="footer-newsletter__form-button btn btn-primary">
                                        Subscribe
                                    </button>
                                </form>
                                <div class="footer-newsletter__text footer-newsletter__text--social">
                                    Follow us on:
                                </div>
                                <!-- social-links -->
                                <div class="social-links footer-newsletter__social-links social-links--shape--circle">
                                    @if ($about)
                                        <ul class="social-links__list">
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--youtube"
                                                    href="{{ $about->youtube }}" target="_blank"><i
                                                        class="fab fa-youtube"></i></a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--facebook"
                                                    href="{{ $about->facebook }}" target="_blank"><i
                                                        class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--twitter"
                                                    href="{{ $about->twitter }}" target="_blank"><i
                                                        class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--instagram"
                                                    href="{{ $about->instagram }}" target="_blank"><i
                                                        class="fab fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                                <!-- social-links / end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-footer__bottom">
                    <div class="site-footer__copyright">
                        <!-- copyright -->
                        <p> copyright &copy; All Right Reserved. Developed by <a href="nextaussietech.com"
                                class="brand-color">NAT</a>.</p>
                        <!-- copyright / end -->
                    </div>
                    <!-- <div class="site-footer__payments">
                <img src="images/payments.png" alt="" />
              </div> -->
                </div>
            </div>
            <div class="totop">
                <div class="totop__body">
                    <div class="totop__start"></div>
                    <div class="totop__container container"></div>
                    <div class="totop__end">
                        <button type="button" class="totop__button">
                            <i class="fa fa-angle-up" style="margin-bottom: 5px;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- site__footer / end -->
</div>
