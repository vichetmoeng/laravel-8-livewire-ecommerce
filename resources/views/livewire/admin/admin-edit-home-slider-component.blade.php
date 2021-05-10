<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Slide
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">
                                    All Slides
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="editSlide">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-4">
                                    <label>
                                        <input type="text" placeholder="Title" class="form-control input-md" wire:model="title">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Subtitle</label>
                                <div class="col-md-4">
                                    <label>
                                        <input type="text" placeholder="Subtitle" class="form-control input-md" wire:model="subTitle">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <label>
                                        <input type="text" placeholder="Price" class="form-control input-md" wire:model="price">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <label>
                                        <input type="text" placeholder="Link" class="form-control input-md" wire:model="link">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file"  wire:model="newImage">
                                    @if($newImage)
                                        <img src="{{ $newImage->temporaryUrl() }}" width="120" alt="" />
                                    @else
                                        <img src="{{ asset('assets/images/sliders') }}/{{ $image }}" width="120" alt="" />
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <label>
                                        <select class="form-control" wire:model="status">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
