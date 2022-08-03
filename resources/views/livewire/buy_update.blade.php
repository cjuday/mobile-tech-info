<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Buying Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Title:</label></label>
                        <input type="text" class="form-control" wire:model="title" placeholder="Title..">
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput2">* Item Image:</label>
                        <input type="file" class="form-control" wire:model="img_src">
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Specification Link:</label></label>
                        <input type="text" class="form-control" wire:model="spec" placeholder="Specification Link..">
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput2">* Description:</label>
                        <textarea wire:model="des" class="form-control"></textarea>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Shop Link:</label></label>
                        <input type="text" class="form-control" wire:model="shop" placeholder="Shop Link..">
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput2">* Ram/Rom:</label>
                        <input type="text" class="form-control" wire:model="ram" placeholder="Ram/Rom..">
                        </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput1">* Shop Image:</label></label>
                        <input type="file" class="form-control" wire:model="img_srcx">
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleFormControlInput2">* Price:</label>
                        <input type="text" class="form-control" wire:model="price" placeholder="Price..">
                        </div>
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