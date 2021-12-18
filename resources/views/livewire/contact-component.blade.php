<div>
    <div class="site__body" style="margin-top: 50px;">
        <div class="page-header">
            <div class="page-header__container container">

                <div class="page-header__title">
                    <h1 class="brand-color">Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="card mb-0 contact-us">
                    <div class="contact-us__map" id="map-location">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.31627073038!2d85.29102727936817!3d27.708955922753717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1616147180099!5m2!1sen!2snp"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="card-body">
                        <div class="contact-us__container">
                            <div class="row">
                                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                    <h4 class="contact-us__header card-title brand-color">Our Address</h4>
                                    <div class="contact-us__address">
                                        @if ($about)
                                            <p>
                                                {{ $about->location }}<br />
                                                Email: {{ $about->email }}<br />
                                                Phone Number: {{ $about->phone }}
                                            </p>
                                            <p>
                                            <h4 class="contact-us__header card-title brand-color">Opening Hours</h4>
                                            {{ $about->opening_day }} : {{ $about->opening_hour }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h4 class="contact-us__header card-title brand-color">
                                        Leave us a Message
                                    </h4>
                                    <form action="#" wire:submit.prevent="storeContact">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="form-name">Your Name</label>
                                                <input type="text" id="form-name" class="form-control"
                                                    placeholder="Your Name" wire:model="name" />
                                                @error('name')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="form-email">Email</label>
                                                <input type="email" id="form-email" class="form-control"
                                                    placeholder="Email Address" wire:model="email" />
                                                @error('email')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-subject">Subject</label>
                                            <input type="text" id="form-subject" class="form-control"
                                                placeholder="Subject" wire:model="subject" />
                                            @error('subject')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="form-message">Message</label>
                                            <textarea id="form-message" class="form-control" rows="4"
                                                wire:model="message"></textarea>
                                            @error('message')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn idesign-button">
                                            Send Message
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
