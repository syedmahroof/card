<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="updatePost" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <h4 class="card-title">Create New Service </h4>

                        <div class="row">


                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Categories</label>
                                    <select class="js-example-basic-single form-select" wire:model="category_id"
                                        data-width="100%">
                                        <option value="">Please Select</option>
                                        @foreach ($this->categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_type_id')
                                        <span style="color:red" class="error"> * {{ $message }} <br> </span>
                                    @enderror
                                </div>
                            </div>



                        </div>

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






                            <div class="row">


                                <div class="mb-3">
                                    <h5 class="py-3">Price Details</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Price</label>
                                                <input class="form-control" type="text" name="price"
                                                    wire:model="price" placeholder="">
                                                @error('price')
                                                    <span style="color:red" class="error"> * {{ $message }} <br>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <h5 class="py-3">SEO</h5>




                                <h4 class="card-title">Images</h4>
                                <div class="row mb-3">

                                    <div class="row mb-3">

                                        <div class="col-lg-12">
                                            <label for="defaultconfig-4" class="col-form-label">Image <small>(
                                                    image size 650*850 )</small></label>
                                            <input type="file" wire:model="image" />


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




                                <div>
                                    <h4 class="card-title">Itinerary</h4>
                                    <div>
                                        @foreach ($itineraries as $index => $itinerary)
                                            <div class="row ">
                                                <div class="col-lg-4">
                                                    <input placeholder="Title" type="text" class="form-control mb-3"
                                                        id="itineraries_{{ $index }}_title"
                                                        wire:model="itineraries.{{ $index }}.title" />
                                                </div>
                                                <div class="col-lg-5">
                                                    <textarea wire:model="itineraries.{{ $index }}.details" class="form-control" maxlength="300" rows="2"
                                                        placeholder="Details"></textarea>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button type="button"
                                                        wire:click.prevent="removeItinerary({{ $index }})">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                        <button type="button" class="btn btn-light mb-3"
                                            wire:click.prevent="addItinerary()">Add </button>
                                    </div>
                                </div>
                            </div>
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



