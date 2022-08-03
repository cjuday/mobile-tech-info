<div>
    @include('livewire.buy_create')
    @include('livewire.buy_update')
    @include('livewire.buy_delete')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session('message')}}
    </div>
    @endif
    <div class="row mb-4">
        @if($count>0)
        <input wire:model="search" class="form-control col-sm-2" type="text" placeholder="Search Buy Now...">
        @endif
        <div class="mr-auto"></div>
        <button data-toggle="modal" data-target="#createModal" wire:click="create_initiate()" type="button" class="btn btn-success btn-sm text-white">+ Add Buy</button>
    </div>
    @if($count>0)

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
                        <a wire:click.prevent="sortBy('title')" role="button" href="#">
                            Title
                            @include('includes.sort-icon', ['field' => 'title'])
                        </a>
                    </th>
                    <th>
                        Spec. Link
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Shop Link
                    </th>
                    <th>
                        Ram/Rom
                    </th>
                    <th>
                        <a wire:click.prevent="sortBy('price')" role="button" href="#">
                            Price
                            @include('includes.sort-icon', ['field' => 'price'])
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
                        <td>{{ $user->title }}</td>
                        <td>{{ $user->spec_link }}</td>
                        <td>{{ $user->des }}</td>
                        <td>{{ $user->shop_link }}</td>
                        <td>{{ $user->ram }}</td>
                        <td>{{ $user->price }}</td>
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
    <center><h3>No Buying Option Added Yet</h3></center>
    @endif
</div>