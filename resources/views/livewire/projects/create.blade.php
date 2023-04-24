<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Enter Name" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title">Location</label>
                            <input type="text"
                                class="form-control @error('location') is-invalid @enderror" id="name"
                                placeholder="Enter Location" wire:model="location">
                            @error('location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-lg-7">
                        <div class="mb-3">

                            <label for="defaultconfig-4" class="col-form-label">Image <small>(
                                    image size 650*850 )</small></label>
                            <input type="file" wire:model="image" />

                             <!-- Show a loading spinner while the image is being uploaded -->
                                <div wire:loading wire:target="image">
                                    Uploading...
                                </div>

                                <!-- Show the image preview once it's been uploaded -->
                                @if ($image)
                                    <img class="img-temp-preview" src="{{ $image->temporaryUrl() }}" />
                                @endif

                            @error('image')
                                <span style="color:red" class="error"> * {{ $message }} <br>
                                </span>
                            @enderror


                        </div>
                    </div>

               
                </div>

                <div class="">
                    <button wire:click.prevent="storePost()"
                        class="btn btn-success btn-block max-width-button">Save</button>
                    <button wire:click.prevent="cancelPost()"
                        class="btn btn-secondary btn-block max-width-button">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
