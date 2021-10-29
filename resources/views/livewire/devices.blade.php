<div>
    @include('livewire.device_create')
    @include('livewire.device_update')
    @include('livewire.device_delete')
    @include('livewire.device_arrival')
    @include('livewire.device_unarrival')
    @include('livewire.device_upcoming')
    @include('livewire.device_unupcoming')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session('message')}}
    </div>
    @endif
    
    <div class="row mb-4">
        <input wire:model="search" class="form-control col-sm-2" type="text" placeholder="Search Device..."/>  
        <select wire:model="show" class="form-control col-sm-3">
            <option value="0">Select Any Category...</option>
            @foreach($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>  

        @if($this->show>'0')
        <select wire:model="show2" class="form-control col-sm-3">
            <option value="0">Select Any Brand...</option>
            @foreach($brnd as $brn)
                <option value="{{$brn->id}}">{{$brn->name}}</option>
            @endforeach
        </select>  
        @endif
        <div class="mr-auto"></div>
        <button data-toggle="modal" data-target="#createModal" wire:click="create_initiate()" type="button" class="btn btn-success btn-sm text-white">+ Add Devices</button>
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
                        Brand
                    </th>
                    <th>
                        Price
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
                        <td><img src="{{ asset('storage/devices/'.$user->img.'') }}" height="50px"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ get_category($user->cat_id) }}</td>
                        <td>{{ get_brand_name($user->brand_id) }}</td>
                        <td>{{$user->price}}</td>
                        <td>
                            @if(!get_arrival($user->id))
                            <button data-toggle="modal" data-target="#arrivalModal" wire:click="arrivalID({{$user->id}})" type="button" class="btn btn-success btn-sm text-white">Add as New Arrival
                            </button>
                            @else
                            <button data-toggle="modal" data-target="#unarrivalModal" wire:click="arrivalID({{$user->id}})" type="button" class="btn btn-danger btn-sm text-white">Remove From New Arrival
                            </button>
                            @endif
                            
                            @if(!get_upcoming($user->id))
                            <button data-toggle="modal" data-target="#upcomingModal" wire:click="upcomingID({{$user->id}})" type="button" class="btn btn-success btn-sm text-white">Add as Upcoming
                            </button>
                            @else
                            <button data-toggle="modal" data-target="#unupcomingModal" wire:click="upcomingID({{$user->id}})" type="button" class="btn btn-danger btn-sm text-white">Remove From Upcoming
                            </button>
                            @endif
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
    <center><h3>No Devices Added Yet</h3></center>
    @endif
</div>
