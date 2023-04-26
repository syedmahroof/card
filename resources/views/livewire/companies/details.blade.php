<div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Companies</li>
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
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
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
                                                <div> {{ $company->name }}</div>
                                            </td>
                                            <td>
                                                <div> {{ $company->phone }}</div>
                                            </td>
                                            <td>
                                                <div> {{ $company->email }}</div>
                                            </td>
                                            <td>
                                                <div> {{ $company->address }}</div>
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
                                                {{-- <button wire:click="viewData({{ $company->id }})"
                                                    class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button> --}}
                                                <button wire:click="editPost({{ $company->id }})"
                                                    class="btn btn-primary  btn-xs btn-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                                <button wire:click="confirmData({{ $company->id }})"
                                                    class="btn btn-danger  btn-xs btn-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                <button wire:click="changeStatus({{ $company->id }})"
                                                    class="btn btn-secondary  btn-xs btn-icon">
                                                    @if ($company->status)
                                                        
                                                    @else
                                                        
                                                    @endif
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" align="center">
                                            No Data Found.
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
