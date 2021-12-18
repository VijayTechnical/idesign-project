<div>
    <div class="page-header">
        <h3 class="page-title"> Slider Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.slider') }}">Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Slider
                        <a href="{{ route('admin.slider') }}" class="btn btn-danger btn-icon-text float-right"><i
                                class="mdi mdi-chevron-double-left btn-icon-prepend"></i> Back </a>
                    </h4>
                    <p class="card-description">Add new Slider.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="addSlider()">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Slider Name</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Enter Slider Name..." wire:model="name">
                                    @error('name')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Slider Image</label>
                                    <input type="file" class="form-control" id="image"
                                        placeholder="Enter Slider Image..." wire:model="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="60" height="60" alt="">
                                    @endif
                                    @error('image')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
