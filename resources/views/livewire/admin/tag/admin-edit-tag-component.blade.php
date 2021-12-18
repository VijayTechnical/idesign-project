<div>
    <div class="page-header">
        <h3 class="page-title"> Tag Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.tag') }}">Tag</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Tag</h4>
                    <p class="card-description">You can update Tag from here</p>
                    <form class="forms-sample" wire:submit.prevent="updateTag()">
                        <div class="form-group">
                            <label for="name">Tag Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Tag Name..."
                                wire:model="name" wire:keyup="generateslug()">
                            @error('name')
                            <span class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Tag Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Enter Tag Slug..."
                                wire:model="slug">
                            @error('slug')
                            <span class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{ route('admin.tag') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
