<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Category Name:</label></label>
                        <input type="text" class="form-control" wire:model="name" value="{{$name}}">
                        @error('value') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput2">* Category Image:</label>
                        <input type="file" class="form-control" wire:model="img_src_new">
                        @error('img_src_new') <span class="text-danger">{{ $message }}</span>@enderror

                        <br/>
                        *Current Image:<br/>
                        <img src="{{asset('storage/cats/'.$img_src.'')}}" width="100px" height="120px">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput2">* New Arrival Position:</label>
                        <input type="text" class="form-control" wire:model="arrival">
                        @error('arrival') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">* Upcoming Position:</label>
                        <input type="text" class="form-control" wire:model="upcoming">
                        @error('upcoming') <span class="text-danger">{{ $message }}</span>@enderror
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