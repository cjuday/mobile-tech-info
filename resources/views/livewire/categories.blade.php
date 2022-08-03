<div>
    @include('livewire.cat_create')
    @include('livewire.cat_delete')
    @include('livewire.cat_update')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session('message')}}
    </div>
    @endif
    @if($count>0)
    <div class="row mb-4">
        <input wire:model="search" class="form-control col-sm-2" type="text" placeholder="Search Categories...">
        <div class="mr-auto"></div>
        <button data-toggle="modal" data-target="#createModal" wire:click="create_initiate()" type="button" class="btn btn-success btn-sm text-white">+ Add Category</button>
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
                        <a wire:click.prevent="sortBy('arrival')" role="button" href="#">
                            New Arrival Position
                            @include('includes.sort-icon', ['field' => 'arrival'])
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('upcoming')" role="button" href="#">
                            Upcoming Position
                            @include('includes.sort-icon', ['field' => 'upcoming'])
                        </a>
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
                        <td><img src="{{ asset('storage/cats/'.$user->img_src.'') }}" height="50px"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->arrival }}</td>
                        <td>{{ $user->upcoming }}</td>
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
    <center><h3>No Categories Added Yet</h3></center>
    @endif
</div>