<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Brand Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group" enctype="multipart/form-data">
                        <label for="exampleFormControlInput1">* Brand Name:</label></label>
                        <input type="text" class="form-control" wire:model="name" value="{{$name}}">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">* Category:</label></label>
                        <select class="form-control" wire:model="cat">
                            <option value="0">Unchanged</option>
                            @foreach($cats as $catss)
                                <option value="{{$catss->id}}">{{$catss->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">* Brand Image:</label>
                        <input type="file" class="form-control" wire:model="img_src_new">
                        @error('img_src') <span class="text-danger">{{ $message }}</span>@enderror<br/>
                        
                        <br/>

                        *Current Image:<br/>
                        <img src="{{asset('storage/brands/'.$img_srcx.'')}}" height="120px" width="150px">
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