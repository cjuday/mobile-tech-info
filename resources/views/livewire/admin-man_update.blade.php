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
                        <label for="exampleFormControlInput1">* Full Name:</label></label>
                        <input type="text" class="form-control" wire:model="name" placeholder="Full Name..">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">* Email:</label></label>
                        <input type="text" class="form-control" wire:model="email" placeholder="Email..">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">* Password:</label></label>
                        <input type="password" class="form-control" wire:model="pass" placeholder="Unchanged">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">* Confirm Password:</label></label>
                        <input type="password" class="form-control" wire:model="pass2" placeholder="Unchanged">
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