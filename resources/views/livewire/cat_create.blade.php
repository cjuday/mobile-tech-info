<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add A New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group" enctype="multipart/form-data">
                        <label for="exampleFormControlInput1">* Category Name:</label></label>
                        <input type="text" class="form-control" wire:model="name" placeholder="Category Name..">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">* Category Image:</label>
                        <input type="file" class="form-control" wire:model="img_src">
                        @error('img_src') <span class="text-danger">{{ $message }}</span>@enderror
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
                <button type="button" wire:click.prevent="store()" class="btn btn-primary" data-dismiss="modal">Create Category</button>
            </div>
       </div>
    </div>
</div>