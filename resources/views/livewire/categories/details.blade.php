<div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">categories</li>
        </ol>
    </nav>

    <div class="row">

        <div class=" @if (!$addData && !$updateData) col-md-12 @else hide @endif grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    @if (!$addData)
                        <button wire:click="addPost()" class="btn btn-primary btn-sm float-right">Add Category</button>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                   
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="py-1">
                                                <img class="custome-table-img" src="{{ asset($category->image) }}"
                                                    alt="image">
                                            </td>

                                            <td>
                                                <div>

                                                    {{ $category->name }}
                                                </div>

                                            </td>
                                          

                                        <td>
                                            <div>
                                                @if ($category->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <button wire:click="viewData({{ $category->id }})"
                                                class="btn btn-primary btn-sm">View</button>
                                            <button wire:click="editPost({{ $category->id }})"
                                                class="btn btn-primary btn-sm">Edit</button>
                                            @if ($category->parent_id != '')<button
                                                    wire:click="confirmData({{ $service_type->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>@endif
                                            <button wire:click="changeStatus({{ $category->id }})"
                                                class="btn btn-secondary btn-sm">
                                                @if ($category->status)
                                                    Deactivate
                                                @else
                                                    Activate
                                                @endif
                                            </button>
                                        </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" align="center">
                                            No Posts Found.
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $categories->links() }}
                    </div>

                </div>

            </div>


            @if ($addData)
                @include('livewire.categories.create')
            @endif
            @if ($updateData)

                @include('livewire.categories.update')
            @endif

        </div>
    </div>


    <x-confirmation-alert />
