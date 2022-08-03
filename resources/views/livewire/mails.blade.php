<div>
    @include('livewire.mail_update')
    @include('livewire.mail_delete')
    @include('livewire.mail_delete2')
    @include('livewire.mails_delete')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session('message')}}
    </div>
    @endif
    @if($count>0)
    <div class="row mb-4">
        <input wire:model="search" class="form-control col-sm-2" type="text" placeholder="Search E-mails...">
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
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Phone
                    </th>
                    <th>
                        Subject
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
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->subject }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#updateModal" wire:click="view({{$user->id}})" type="button" class="btn btn-dark btn-sm text-white">
                            View
                            </button>
                            @if($user->read_mail>'0')
                            <button data-toggle="modal" data-target="#deletexModal" wire:click="deleteId({{$user->id}})" type="button" class="btn btn-danger btn-sm text-white">
                            Mark As Unread
                            </button>
                            @else
                            <button data-toggle="modal" data-target="#deleteModal" wire:click="deleteId({{$user->id}})" type="button" class="btn btn-primary btn-sm text-white">
                            Mark As Read
                            </button>
                            @endif
                            <button data-toggle="modal" data-target="#deletexxModal" wire:click="deleteId({{$user->id}})" type="button" class="btn btn-primary btn-sm text-white">
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

