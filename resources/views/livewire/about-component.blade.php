<div>
    <!-- site__body -->
    <div class="site__body">
        <div class="about-us">
            <div class="about-us__image"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="about-us__body">
                            <div class="row justify-content-around about-us-features">
                                <div class="col-sm-3 about-features">
                                    <div class="about-features-icon">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                    <div class="about-features-text">
                                        <p>
                                            Custom design
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3 about-features">
                                    <div class="about-features-icon">
                                        <i class="fas fa-award"></i>
                                    </div>
                                    <div class="about-features-text">
                                        <p>
                                            Quality assured
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3 about-features">
                                    <div class="about-features-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="about-features-text">
                                        <p>
                                            Timed Delivery
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="about-content">
                                <h2 class="about-us__title">About Us</h2>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="about-us__bigtext">
                                            <p>
                                                Office Printing made easy and hassle-free
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        @if($about)
                                        <div class="about-us__text ">
                                            <p>{{ $about->description }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="about-us__team">
                                <h2 class="about-us__team-title">Meat Our Team</h2>
                                <div class="about-us__team-subtitle text-muted">Want to work in our friendly
                                    team?<br><a href="contact-us.html">Contact us</a> and we will consider your
                                    candidacy.</div>
                                <div class="about-us__teammates teammates">
                                    <div class="owl-carousel">
                                        <div class="teammates__item teammate">
                                            <div class="teammate__avatar"><img src="images/teammates/teammate-1.jpg"
                                                    alt=""></div>
                                            <div class="teammate__name">Michael Russo</div>
                                            <div class="teammate__position text-muted">Chief Executive Officer</div>
                                        </div>
                                        <div class="teammates__item teammate">
                                            <div class="teammate__avatar"><img src="images/teammates/teammate-2.jpg"
                                                    alt=""></div>
                                            <div class="teammate__name">Katherine Miller</div>
                                            <div class="teammate__position text-muted">Marketing Officer</div>
                                        </div>
                                        <div class="teammates__item teammate">
                                            <div class="teammate__avatar"><img src="images/teammates/teammate-3.jpg"
                                                    alt=""></div>
                                            <div class="teammate__name">Anthony Harris</div>
                                            <div class="teammate__position text-muted">Finance Director</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- site__body / end -->
</div>
