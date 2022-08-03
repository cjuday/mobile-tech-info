<div>
    @include('livewire.news-man_create')
    @include('livewire.news-man_delete')
    @include('livewire.news-man_update')
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session('message')}}
    </div>
    @endif
    @if($count>0)
    <div class="row mb-4">
        <input wire:model="search" class="form-control col-sm-2" type="text" placeholder="Search News...">
        <div class="mr-auto"></div>
        <button data-toggle="modal" data-target="#createModal" wire:click="create_initiate()" type="button" class="btn btn-success btn-sm text-white">+ Add News</button>
    </div>

    <div class="row">
        <table class="table bg-white table-responsive-sm">
            <thead>
                <tr>
                    <th>
                        <a wire:click.prevent="sortBy('id')" role="button" href="#">
                            Date Posted
                            @include('includes.sort-icon', ['field' => 'id'])
                        </a>
                    </th>
                    <th>
                        Preview Image
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Meta Title
                    </th>
                    <th>
                        Meta Description
                    </th>
                    <th>
                        Meta Keywords
                    </th>
                    <th>
                        Options
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->post_date }}</td>
                        <td><img src="{{ asset('storage/news/'.$user->preview_img.'') }}" height="50px" width="70px"></td>
                        <td>{{ $user->title }}</td>
                        <td>{{ $user->meta_title }}</td>
                        <td>{{ $user->meta_des }}</td>
                        <td>{{ $user->meta_key }}</td>
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