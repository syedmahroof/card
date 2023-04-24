<div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Projects</li>
        </ol>
    </nav>

    <div class="row">
        <div class=" @if (!$addData && !$updateData) col-md-12 @else hide @endif grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    @if (!$addData)
                        <button wire:click="addPost()" class="btn btn-primary btn-sm float-right">Add
                            Project</button>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                   
                                    <th> Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($projects) > 0)
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td class="py-1">
                                                <img class="custome-table-img" src="{{ asset($project->image) }}"
                                                    alt="image">
                                            </td>
                                            <td>
                                                <div>{{ $project->name }}</div>
                                            </td>
                                       
                                           
                                            <td>
                                                <div>
                                                    @if ($project->status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <button wire:click="editPost({{ $project->id }})"
                                                    class="btn btn-primary btn-sm">Edit</button>
                                                <button wire:click="confirmData({{ $project->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                                <button wire:click="changeStatus({{ $project->id }})"
                                                    class="btn btn-secondary btn-sm">
                                                    @if ($project->status)
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
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
        @if ($addData)
            @include('livewire.projects.create')
        @endif
        @if ($updateData)
            @include('livewire.projects.update')
        @endif

    </div>
</div>

<x-confirmation-alert />
