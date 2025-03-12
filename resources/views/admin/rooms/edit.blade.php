@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Update Room</h3>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="{{ route('admin.rooms.update', ['room' => $room->id]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-6">
                    <label class="form-label">Room Type Name</label>
                    <select name="room_type_id" class="form-select @error('room_type_id') is-invalid @enderror">
                        <option value="">Choose...</option>
                        @foreach($types as $type)
                            <option
                                value="{{ $type->id }}" @selected(old('room_type_id', $room->room_type_id) == $type->id)>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('room_type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label">Total Rooms</label>
                    <input type="number" name="total_room" value="{{ old('total_room', $room->total_room) }}"
                           class="form-control @error('total_room') is-invalid @enderror">
                    @error('total_room')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label">No of Beds</label>
                    <input type="number" name="no_beds" value="{{ old('no_beds', $room->no_beds) }}"
                           class="form-control @error('no_beds') is-invalid @enderror">
                    @error('no_beds')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" value="{{ old('price', $room->price) }}"
                           class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control @error('desc') is-invalid @enderror"
                              name="desc">{{ old('desc', $room->desc) }}</textarea>
                    @error('desc')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status"
                               @checked(old('status', $room->status)) role="switch">
                        <label class="form-check-label">Active/Disabled</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update Room</button>
                </div>
            </form>
        </div>
    </div>
@endsection
