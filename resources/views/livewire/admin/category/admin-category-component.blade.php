<div>
    <div class="page-header">
        <h3 class="page-title"> Category Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>
    <style>
        .list-star li.sub-category {
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }

        .list-star li.sub-category li.child-category {
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }

        .slink i {
            font-size: 16px;
            margin-left: 12px;

        }

    </style>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category Table
                        <a href="{{ route('admin.category.add') }}"
                            class="btn btn-success create-new-button float-right">+ Add Category</a>
                    </h4>
                    <div class="table-header">
                        <form action="#" class="mt-1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <select name="paginate" id="paginate" aria-placeholder="Number of orders"
                                            class="form-control" wire:model="paginate">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-7"></div>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Search here...." class="form-control"
                                            wire:model="searchTerm">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Sub Categories</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            @if ($category->status == 'active')
                                                <label
                                                    onclick="confirm('Are you sure you want to deactivate the category?') || event.stopImmediatePropagation()"
                                                    wire:click.prevent="statusupdate({{ $category->id }})"
                                                    style="cursor: pointer;" class="badge badge-success">Active</label>
                                            @else
                                                <label
                                                    onclick="confirm('Are you sure you want to active the category?') || event.stopImmediatePropagation()"
                                                    wire:click.prevent="statusupdate({{ $category->id }})"
                                                    style="cursor: pointer;" class="badge badge-danger">Deactive</label>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-star">
                                                @foreach ($category->subCategories as $sub_category)
                                                    <li class="sub-category">
                                                        {{ $sub_category->name }}
                                                        <a class="slink"
                                                            href="{{ route('admin.category.edit', ['category_slug' => $category->slug, 'sub_category_slug' => $sub_category->slug]) }}"><i
                                                                class="mdi mdi-briefcase-edit"></i>
                                                        </a>
                                                        <a class="slink" href="#"
                                                            onclick="confirm('Are you sure you want to delete the subcategory?') || event.stopImmediatePropagation()"
                                                            wire:click.prevent="deleteSubCategory({{ $sub_category->id }})"><i
                                                                class="mdi mdi-delete"></i>
                                                        </a>
                                                        <ul class="list-star">
                                                            @foreach ($sub_category->childCategories as $child_category)
                                                                <li class="child-category">
                                                                    {{ $child_category->name }}
                                                                    <a class="slink"
                                                                        href="{{ route('admin.category.edit', ['category_slug' => $category->slug,'child_category_slug'=>$child_category->slug]) }}"><i
                                                                            class="mdi mdi-briefcase-edit"></i>
                                                                    </a>
                                                                    <a class="slink" href="#"
                                                                        onclick="confirm('Are you sure you want to delete the subcategory?') || event.stopImmediatePropagation()"
                                                                        wire:click.prevent="deleteChildCategory({{ $child_category->id }})"><i
                                                                            class="mdi mdi-delete"></i>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', ['category_slug' => $category->slug]) }}"
                                                class="btn btn-primary"><i class="mdi mdi-briefcase-edit"></i></a>
                                            <a href="#"
                                                onclick="confirm('Are you sure you want to delete the category?') || event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteCategory({{ $category->id }})"
                                                class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $categories->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
