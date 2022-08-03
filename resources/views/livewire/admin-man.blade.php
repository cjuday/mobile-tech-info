<div>
    @include('livewire.admin-man_create')
    @include('livewire.admin-man_update')
    @include('livewire.admin-man_delete')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session('message')}}
    </div>
    @endif
    @if($count>0)
    <div class="row mb-4">
        <input wire:model="search" class="form-control col-sm-2" type="text" placeholder="Search Admin...">
        <div class="mr-auto"></div>
        <button data-toggle="modal" data-target="#createModal" wire:click="create_initiate()" type="button" class="btn btn-success btn-sm text-white">+ Add Admin</button>
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
                       <a wire:click.prevent="sortBy('name')" role="button" href="#">
                            Full Name
                            @include('includes.sort-icon', ['field' => 'name'])
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('email')" role="button" href="#">
                            Email
                            @include('includes.sort-icon', ['field' => 'email'])
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
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->id > 1)
                            <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{$user->id}})" type="button" class="btn btn-dark btn-sm text-white">
                            Edit
                            </button>
                            <button data-toggle="modal" data-target="#deleteModal" wire:click="deleteId({{$user->id}})" type="button" class="btn btn-danger btn-sm text-white">
                            Delete
                            </button>
                            @endif
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
    <center><h3>No Admins Added Yet</h3></center>
    @endif
</div>