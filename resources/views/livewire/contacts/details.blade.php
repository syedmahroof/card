<div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contacts</li>
        </ol>
    </nav>

    <div class="row">

        <div class=" @if (!$addData && !$updateData ) col-md-12 @else hide @endif grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    @if (!$addData)
                        <button wire:click="addPost()" class="btn btn-danger btn-sm float-right">Add Contact</button>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($contacts) > 0)
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td class="py-1">
                                                <img class="custome-table-img" src="{{ asset($contact->photo) }}"
                                                    alt="image">
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $contact->first_name }}
                                                </div>

                                            </td>
                                            <td>
                                                {{ $contact->last_name }}
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $contact->phone_work }}
                                                </div>

                                            </td>
                                            <td>
                                                <div>
                                                    {{ $contact->email_work }}
                                                </div>

                                            </td>
                                            <td>
                                                <div>
                                                    {{ (isset($contact->company) && isset($contact->company->name)) ? $contact->company->name : '' }}
                                                    
                                                </div>

                                            </td>
                                            <td>
                                                <div>
                                                    {{ $contact->designation }}
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
                                                {{-- <button wire:click="viewData({{ $contact->id }})"
                                                    class="btn btn-primary btn-xs btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"><i data-feather="edit"></i></button> --}}
                                                <button wire:click="editPost({{ $contact->id }})"
                                                    class="btn btn-primary  btn-xs btn-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                                <button wire:click="confirmData({{ $contact->id }})"
                                                    class="btn btn-danger  btn-xs btn-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                <button wire:click="changeStatus({{ $contact->id }})"
                                                    class="btn btn-secondary btn-xs btn-icon">
                                                    {{-- @if ($contact->status)
                                                    <i data-feather="check-square"></i>
                                                    @else
                                                    <i data-feather="check-square"></i>
                                                    @endif --}}
                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" align="center">
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
            @include('livewire.contacts.create')
        @endif
        @if ($updateData)
            @include('livewire.contacts.update')
        @endif


    </div>
</div>

