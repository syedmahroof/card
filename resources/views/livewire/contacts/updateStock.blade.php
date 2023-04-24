<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="updateStockPost" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <h4 class="card-title">Create New Service </h4>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Title</label>
                                    <input class="form-control" wire:model="title" type="text">
                                    @error('title')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Title</label>

                                    <select class=" form-control" wire:model="type" data-width="100%">
                                        <option value="">Please Select</option>
                                        <option value="in">In</option>
                                        <option value="out">Out</option>
                                    </select>
                                    @error('type')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Stock</label>
                                    <input class="form-control" wire:model="value" type="text">
                                    @error('value')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Project</label>
                                    <select class="js-example-basic-single form-select" wire:model="project_id"
                                        data-width="100%">
                                        <option value="">Please Select</option>
                                        @foreach ($this->projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_type_id')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>
                        <button class="btn btn-primary  btn-block max-width-button" type="submit"
                            value="Submit">Submit</button>
                        <button wire:click.prevent="cancelPost()"
                            class="btn btn-secondary btn-block max-width-button">Cancel</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
