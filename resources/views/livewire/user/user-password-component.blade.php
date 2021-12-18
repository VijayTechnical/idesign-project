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
                    <div class="col-12 col-lg-3">
                        <div class="account-nav flex-grow-1">
                            <h4 class="account-nav__title">Settings</h4>
                            @livewire('user.sidebar-component')
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-header">
                                <h5>Change Password</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-12 col-lg-7 col-xl-6">
                                        <form action="#" wire:submit.prevent="changePassword()">
                                            <div class="form-group">
                                                <label for="password-current">Current Password</label>
                                                <input type="password" class="form-control" id="password-current"
                                                    placeholder="Current Password" wire:model="current_password" />
                                                    @error('current_password')
                                                        <div class="help-block with-errors">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password-new">New Password</label>
                                                <input type="password" class="form-control" id="password-new"
                                                    placeholder="New Password" wire:model="password" />
                                                    @error('password')
                                                        <div class="help-block with-errors">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Confirm Password</label>
                                                <input type="password" class="form-control" id="password-confirm"
                                                    placeholder="Confirm Password" wire:model="password_confirmation" />
                                                    @error('password_confirmation')
                                                        <div class="help-block with-errors">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn idesign-btn">Change</button>
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
