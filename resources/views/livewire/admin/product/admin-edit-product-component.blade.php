<div>
    <div class="page-header">
        <h3 class="page-title"> Product Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Product
                        <a href="{{ route('admin.product') }}" class="btn btn-danger btn-icon-text float-right"><i
                                class="mdi mdi-chevron-double-left btn-icon-prepend"></i> Back </a>
                    </h4>
                    <p class="card-description">Edit new product.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="editProduct()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Enter Product Name..." wire:model="name"
                                        wire:keyup="generateslug()">
                                    @error('name')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Product Slug</label>
                                    <input type="text" class="form-control" id="slug"
                                        placeholder="Enter Product Slug..." wire:model="slug">
                                    @error('slug')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="regular_price">Product Regular Price</label>
                                    <input type="text" class="form-control" id="regular_price"
                                        placeholder="Enter Product Regular Price..." wire:model="regular_price">
                                    @error('regular_price')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sale_price">Product Sale Price</label>
                                    <input type="text" class="form-control" id="sale_price"
                                        placeholder="Enter Product Sale Price..." wire:model="sale_price">
                                    @error('sale_price')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="SKU">Product SKU</label>
                                    <input type="text" class="form-control" id="SKU"
                                        placeholder="Enter Product SKU..." wire:model="SKU">
                                    @error('SKU')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock_status">Product Stock Status</label>
                                    <select name="stock_status" id="stock_status" class="form-control"
                                        wire:model="stock_status">
                                        <option value="instock">In-Stock</option>
                                        <option value="outofstock">Out-Of-Stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="featured">Product Featured</label>
                                    <select name="featured" id="featured" class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity">Product Quantity</label>
                                    <input type="text" class="form-control" id="quantity"
                                        placeholder="Enter Product Quantity..." wire:model="quantity">
                                    @error('quantity')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <input type="file" class="form-control" id="image" wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="60" height="60" alt="">
                                    @else
                                        <img src="{{ asset('/storage/product_image') }}/{{ $image }}" width="60" height="60"
                                            alt="">
                                    @endif
                                    @error('newimage')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images">Product Image</label>
                                    <input type="file" class="form-control" id="images" wire:model="newimages">
                                    @if ($newimages)
                                        @foreach ($newimages as $image)
                                            <img src="{{ $image->temporaryUrl() }}" width="60" height="60" alt="">
                                        @endforeach
                                    @else
                                        @php
                                            $images = explode(',', $images);
                                        @endphp
                                        @foreach ($images as $image)
                                            <img src="{{ asset('/storage/product_image') }}/{{ $image }}" width="60" height="60"
                                                alt="">
                                        @endforeach
                                    @endif
                                    @error('newimages')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Product Category</label>
                                    <select name="category_id" id="category_id" class="form-control"
                                        wire:model="category_id" wire:change="changeSubcategory" >
                                        <option value="0" data-hidden="true">Please select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="scategory_id">Product Sub Category</label>
                                    <select name="sub_category_id" id="scategory_id" class="form-control"
                                        wire:model="sub_category_id">
                                        <option value="0" data-hidden="true">Please select sub-category</option>
                                        @foreach ($sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="child_category_id">Product Child Category</label>
                                    <select name="child_category_id" id="child_category_id" class="form-control"
                                        wire:model="child_category_id">
                                        <option value="0" data-hidden="true">Please Celect Child Category</option>
                                        @foreach ($child_categories as $child_category)
                                            <option value="{{ $child_category->id }}">{{ $child_category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('child_category_id')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tag_id">Product Tag</label>
                                    <select name="tag_id" id="tag_id" class="form-control" wire:model="tag_id">
                                        <option value="0" data-hidden="true">Please select tag</option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_id')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="attr">Product Attributes</label>
                                            <select name="attr" id="attr" class="form-control" wire:model="attr">
                                                <option value="" data-hidden="true">Please select product attribute</option>
                                                @foreach ($pattributes as $pattribute)
                                                    <option value="{{ $pattribute->id }}">{{ $pattribute->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3"> <button type="button" class="btn btn-info mt-4"
                                                wire:click.prevent="add"><i class="mdi mdi-plus-box"></i> Add</button></div>
                                    </div>
                                </div>
                                @foreach ($inputs as $key => $value)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter {{ $pattributes->where('id', $attribute_arr[$key])->first()->name }}"
                                                    wire:model="attribute_values.{{ $value }}">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-danger"
                                                    wire:click.prevent="remove({{ $key }})"><i class="mdi mdi-delete-sweep"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="short_description">Product Short Description</label>
                            <textarea type="text" class="form-control" rows="5" id="short_description"
                                placeholder="Enter Product Short Description..."
                                wire:model="short_description"></textarea>
                            @error('short_description')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="description">Product Description</label>
                            <textarea type="text" class="form-control" rows="7" id="description"
                                placeholder="Enter Product Description..." wire:model="description"></textarea>
                            @error('description')
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


@push('scripts')
    <script>
        $(function() {
            tinymce.init({
                selector: '#short_description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    });
                }
            });
            tinymce.init({
                selector: '#description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    });
                }
            });
        });
    </script>
@endpush
