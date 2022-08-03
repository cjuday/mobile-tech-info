<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update News Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* News Title:</label></label>
                        <input type="text" class="form-control" wire:model="title">
                        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        </div>

                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Meta Title:</label></label>
                        <input type="text" class="form-control" wire:model="meta_title">
                        @error('meta_title') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Meta Description:</label></label>
                        <input type="text" class="form-control" wire:model="meta_des">
                        @error('meta_des') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        </div>

                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Meta Keywords:</label></label>
                        <input type="text" class="form-control" wire:model="meta_key">
                        @error('meta_key') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput2">* Preview Image:</label>
                        <input type="file" class="form-control" wire:model="img_src_new">
                        @error('img_src_new') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        </div>
                        </div>

                        *Current Image:<br/>
                        <img src="{{asset('storage/news/'.$img_src.'')}}">
                        <br/>
                        <br/>
                        <div class="row">
                        <div class="col-lg-12" wire:ignore>
                        <label for="exampleFormControlInput2">* Description:</label>
                        <x-input.tinymce wire:model="descrp" value="{!! $descrp !!}"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
       </div>
    </div>
</div>