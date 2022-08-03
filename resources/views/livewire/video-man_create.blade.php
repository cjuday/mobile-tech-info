<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add A New Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Video Link:</label></label>
                        <input type="text" class="form-control" wire:model="link" placeholder="Video Link..">
                        @error('link') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary" data-dismiss="modal">Add Video</button>
            </div>
       </div>
    </div>
</div>