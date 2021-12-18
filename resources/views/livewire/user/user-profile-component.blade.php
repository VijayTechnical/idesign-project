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
                                <h5>Edit Profile</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <form action="#" enctype="multipart/form-data"
                                            wire:submit.prevent="updateUser()">
                                            <div class="form-group">
                                                <label for="profile-image">Profile Picture</label>
                                                <input type="file" class="form-control" id="profile-image"
                                                    class="rounded img-fluid" wire:model="newimage" />
                                                @if ($newimage)
                                                    <img src="{{ $newimage->temporaryUrl() }}" width="60"
                                                        height="60" alt="">
                                                @else
                                                <img src="{{ asset('/storage/user_image') }}/{{ $image }}" width="60"
                                                        height="60" alt="">
                                                @endif
                                                @error('newimage')
                                                    <span class="error" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="profile-first-name">Full Name</label>
                                                <input type="text" class="form-control" id="profile-full-name"
                                                    placeholder="Full Name" wire:model="name" />
                                                @error('name')
                                                    <span class="error" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="profile-email">Email Address</label>
                                                <input type="email" class="form-control" id="profile-email"
                                                    placeholder="Email Address" wire:model="email" />
                                                @error('email')
                                                    <span class="error" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group save-edit-profile">
                                                <button class="btn idesign-btn" type="submit">Save</button>
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
