<div>
    <div class="page-header">
        <h3 class="page-title"> Password Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Password
                    </h4>
                    <p class="card-description">Update Password.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="changePassword()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password-current">Current Password</label>
                                    <input type="password" class="form-control" id="password-current"
                                        placeholder="Current Password" wire:model="current_password" />
                                        @error('current_password')
                                            <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password-new">New Password</label>
                                    <input type="password" class="form-control" id="password-new"
                                        placeholder="New Password" wire:model="password" />
                                        @error('password')
                                            <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input type="password" class="form-control" id="password-confirm"
                                        placeholder="Confirm Password" wire:model="password_confirmation" />
                                        @error('password_confirmation')
                                            <div class="help-block with-errors">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
