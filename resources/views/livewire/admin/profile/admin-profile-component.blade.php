<div>
    <div class="page-header">
        <h3 class="page-title"> Profile Element </h3>
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
                    <h4 class="card-title">Update Profile
                    </h4>
                    <p class="card-description">Update Profile.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="updateProfile()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="newimage">User Image</label>
                                    <input type="file" class="form-control" id="image"
                                        placeholder="Enter User Image..." wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="60" height="60" alt="">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter User Name..."
                                        wire:model="name">
                                    @error('name')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">User Email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Enter User Email..." wire:model="email">
                                    @error('email')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
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
