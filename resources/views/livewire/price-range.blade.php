<div>
    @include('livewire.prange_update')
    @include('livewire.prange_create') 
    @include('livewire.prange_delete') 
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session('message')}}
    </div>
    @endif
    @if($count>0)
    <div class="row mb-4">
        <input wire:model="search" class="form-control col-sm-2" type="text" placeholder="Search Price Range...">
        <div class="mr-auto"></div>
        <button data-toggle="modal" data-target="#createModal" wire:click="create_initiate()" type="button" class="btn btn-success btn-sm text-white">+ Add Range</button>
    </div>

    <div class="row">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th>
                        <a wire:click.prevent="sortBy('value')" role="button" href="#">
                            Value
                            @include('includes.sort-icon', ['field' => 'value'])
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('lower')" role="button" href="#">
                            Lower Range
                            @include('includes.sort-icon', ['field' => 'lower'])
                        </a>
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('upper')" role="button" href="#">
                            Upper Range
                            @include('includes.sort-icon', ['field' => 'upper'])
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
                        <td>{{ $user->value }}</td>
                        <td>{{ $user->lower }}</td>
                        <td>{{ $user->upper }}</td>
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
    <center><h3>No Price Ranges Added Yet</h3></center>
    @endif
</div>

