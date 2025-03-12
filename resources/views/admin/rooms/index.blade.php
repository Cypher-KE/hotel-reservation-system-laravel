@extends('layouts.app')

@section('content')
    @include('components.show-success')
    <div class="card">
        <div class="card-header">
            <h3>All Rooms
                <a href="{{ route('admin.rooms.create') }}" class="btn btn-success rounded-circle">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Total Rooms</th>
                    <th scope="col">No of Beds</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($rooms as $room)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $room->roomtype->name }}</td>
                        <td>{{ $room->total_room }}</td>
                        <td>{{ $room->no_beds }}</td>
                        <td>{{ $room->price }}</td>
                        <td><img src="{{ asset($room->image) }}" width="50" height="40"></td>
                        @if($room->status)
                        <td class="text-success">Active</td>
                        @else
                            <td class="text-danger">disabled</td>
                        @endif
                        <td>
                            <div class="btn-group" role="group">
                                <form method="post"
                                      action="{{ route('admin.rooms.destroy', ['room' => $room->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                                <a class="btn btn-warning"
                                   href="{{ route('admin.rooms.edit', ['room' => $room->id]) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <p class="text-primary fw-bold">You haven't created any Rooms.</p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
