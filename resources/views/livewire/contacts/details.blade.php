<div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>

    <div class="row">

        <div class=" @if (!$addData && !$updateData && !$updateStock) col-md-12 @else hide @endif grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    @if (!$addData)
                        <button wire:click="addPost()" class="btn btn-primary btn-sm float-right">Add Contact</button>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($contacts) > 0)
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td class="py-1">
                                                <img class="custome-table-img" src="{{ asset($contact->image) }}"
                                                    alt="image">
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $contact->title }}
                                                </div>

                                            </td>
                                            <td>
                                                @if ($contact->price >= 0 && $contact->price != '')
                                                    AED {{ $contact->price }}
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $contact->stock }}
                                                </div>

                                            </td>
                                            <td>
                                                <div>
                                                    {{ $contact->price * $contact->stock }}
                                                </div>

                                            </td>
                                            <td>
                                                <div>
                                                    @if ($contact->status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td>
                                                <button wire:click="viewData({{ $contact->id }})"
                                                    class="btn btn-primary btn-sm">View</button>
                                                <button wire:click="editPost({{ $contact->id }})"
                                                    class="btn btn-primary btn-sm">Edit</button>
                                                <button wire:click="confirmData({{ $contact->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                                <button wire:click="changeStatus({{ $contact->id }})"
                                                    class="btn btn-secondary btn-sm">
                                                    @if ($contact->status)
                                                        Deactivate
                                                    @else
                                                        Activate
                                                    @endif
                                                </button>

                                                <button wire:click="updateStock({{ $contact->id }})"
                                                    class="btn btn-primary btn-sm">Update Stock</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" align="center">
                                            No Data Found.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>

        @if ($addData)
            @include('livewire.products.create')
        @endif
        @if ($updateData)
            @include('livewire.products.update')
        @endif
        @if ($updateStock)
            @include('livewire.products.updateStock')
        @endif

    </div>
</div>


<x-confirmation-alert />
