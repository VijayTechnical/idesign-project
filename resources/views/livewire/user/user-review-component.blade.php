<div>
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
                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-header">
                                <h5>Review Product</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-12 col-lg-12 col-xl-12">
                                        <form class="reviews-view__form" action="#" wire:submit.prevent="addReview">
                                            <div
                                                class="form-group
                                                    col-md-12">
                                                <label for="review-stars">Review
                                                    Stars</label>
                                                <select id="review-stars" class="form-control" wire:model="rating">
                                                    <option value="5">5 Stars
                                                        Rating</option>
                                                    <option value="4">4 Stars
                                                        Rating</option>
                                                    <option value="3">3 Stars
                                                        Rating</option>
                                                    <option value="2">2 Stars
                                                        Rating</option>
                                                    <option value="1">1 Stars
                                                        Rating</option>
                                                </select>
                                                @error('rating')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="review-text">Your
                                                    Review</label>
                                                <textarea class="form-control" id="review-text" rows="6" wire:model="comment"></textarea>
                                                @error('comment')<span
                                                class="text-danger">{{ $message }}</span>@enderror
                                            </div>

                                            <div
                                                class="form-group
                                                mb-0 col-md-12">
                                                <button type="submit"
                                                    class="btn
                                                    btn-primary btn-lg">
                                                    Post Your Review
                                                </button>
                                            </div>
                                    </div>
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
<!-- site__body / end -->
</div>
