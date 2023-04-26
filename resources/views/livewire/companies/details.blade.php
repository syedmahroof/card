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
                        <button wire:click="addPost()" class="btn btn-danger btn-sm float-right">Add Company</button>
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
                                @if (count($companies) > 0)
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td class="py-1">
                                                <img class="custome-table-img" src="{{ asset($company->image) }}"
                                                    alt="image">
                                            </td>

                                            <td>
                                                <div>

                                                    {{ $company->name }}
                                                </div>

                                            </td>


                                            <td>
                                                <div>
                                                    @if ($company->status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <button wire:click="viewData({{ $company->id }})"
                                                    class="btn btn-primary btn-sm">View</button>
                                                <button wire:click="editPost({{ $company->id }})"
                                                    class="btn btn-primary btn-sm">Edit</button>
                                                <button wire:click="confirmData({{ $company->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                                <button wire:click="changeStatus({{ $company->id }})"
                                                    class="btn btn-secondary btn-sm">
                                                    @if ($company->status)
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
                    {{ $companies->links() }}
                </div>

            </div>

        </div>


        @if ($addData)
            @include('livewire.companies.create')
        @endif
        @if ($updateData)
            @include('livewire.companies.update')
        @endif

    </div>
</div>


<x-confirmation-alert />
