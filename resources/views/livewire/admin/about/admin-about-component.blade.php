<div>
    <div class="page-header">
        <h3 class="page-title"> About Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update About</h4>
                    <p class="card-description">You can add About from here</p>
                    <form class="forms-sample" wire:submit.prevent="updateAbout()">
                        <div class="form-group">
                            <label for="email">Company Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Company Email..."
                                wire:model="email">
                            @error('email')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Company Phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter Company Phone..."
                                wire:model="phone">
                            @error('phone')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customer_service_number">Company Customer Service Number</label>
                            <input type="text" class="form-control" id="customers_service_number" placeholder="Enter Company Customer Service Number..."
                                wire:model="customers_service_number">
                            @error('customers_service_number')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="location">Company Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter Company Location..."
                                wire:model="location">
                            @error('location')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="opening_day">Company Opening Day</label>
                            <input type="text" class="form-control" id="opening_day" placeholder="Enter Company Opening Day..."
                                wire:model="opening_day">
                            @error('opening_day')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="opening_hour">Company Opening Hour</label>
                            <input type="text" class="form-control" id="opening_hour" placeholder="Enter Company Opening Hour..."
                                wire:model="opening_hour">
                            @error('opening_hour')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="youtube">Company Youtube Link</label>
                            <input type="text" class="form-control" id="youtube" placeholder="Enter Company Youtube Link..."
                                wire:model="youtube">
                            @error('youtube')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="facebook">Company Facebook Link</label>
                            <input type="text" class="form-control" id="facebook" placeholder="Enter Company Facebook Link..."
                                wire:model="facebook">
                            @error('facebook')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="instagram">Company Instagram Link</label>
                            <input type="text" class="form-control" id="instagram" placeholder="Enter Company Instagram Link..."
                                wire:model="instagram">
                            @error('instagram')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="twitter">Company Twitter Link</label>
                            <input type="text" class="form-control" id="twitter" placeholder="Enter Company Twitter Link..."
                                wire:model="twitter">
                            @error('twitter')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Company description Link</label>
                            <textarea type="text" rows="8" class="form-control" id="description" placeholder="Enter Company description Link..."
                                wire:model="description"></textarea>
                            @error('description')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
