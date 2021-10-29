<div>
    @include('livewire.brand_create')
    @include('livewire.brand_delete')
    @include('livewire.brand_update')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session('message')}}
    </div>
    @endif
    @if($count>0)
    <div class="row mb-4">
        <input wire:model="search" class="form-control col-sm-2" type="text" placeholder="Search Brands..."/>  
        <select wire:model="show" class="form-control col-sm-3">
            <option value="0">Select Any Category...</option>
            @foreach($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
        <div class="mr-auto"></div>
        <button data-toggle="modal" data-target="#createModal" wire:click="create_initiate()" type="button" class="btn btn-success btn-sm text-white">+ Add Brands</button>
    </div>

    <div class="row">
        <table class="table bg-white table-responsive-sm">
            <thead>
                <tr>
                    <th>
                        <a wire:click.prevent="sortBy('id')" role="button" href="#">
                            ID
                            @include('includes.sort-icon', ['field' => 'id'])
                        </a>
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('name')" role="button" href="#">
                            Name
                            @include('includes.sort-icon', ['field' => 'name'])
                        </a>
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Options
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><img src="{{ asset('storage/brands/'.$user->img.'') }}" height="50px"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ get_category($user->cat_id) }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{$user->id}})" type="button" class="btn btn-dark btn-sm text-white">
                            Edit
                            </button>
                            <button data-toggle="modal" data-target="#deleteModal" wire:click="deleteId({{$user->id}})" type="button" class="btn btn-danger btn-sm text-white">
                            Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        <div class="float-right">
            {{ $users->links() }}
        </div>

    @else
    <center><h3>No Brands Added Yet</h3></center>
    @endif
</div>