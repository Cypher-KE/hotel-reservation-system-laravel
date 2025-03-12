<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {

        $rooms = Room::with('roomtype')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $types = RoomType::all();
        return view('admin.rooms.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'room_type_id' => ['required', 'exists:room_types,id', 'unique:rooms'],
            'total_room' => ['required', 'numeric'],
            'no_beds' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'desc' => ['required', 'string'],
            'image' => ['required', 'image', 'max:2048'],
        ], [
            'room_type_id.unique' => 'This Room Type already exists in room table. please create a new room type'
        ]);
        $imageName = time() . '.' . $request->file('image')->extension();

        // download image
        $request->file('image')->move(public_path('img'), $imageName);
        $imagePath = 'img/' . $imageName;

        Room::create([
            'room_type_id' => $request->room_type_id,
            'total_room' => $request->total_room,
            'no_beds' => $request->no_beds,
            'price' => $request->price,
            'desc' => $request->desc,
            'image' => $imagePath,
            'status' => $request->has('status') ? 1 : 0
        ]);

        return redirect()->route('admin.rooms.index')
            ->with('message', 'Room has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id) {

        $room = Room::findOrFail($id);
        $this->authorize('update', $room);
        $types = RoomType::all();
        return view('admin.rooms.edit', compact('room', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id) {

        $request->validate([
            'room_type_id' => ['required', 'exists:room_types,id'],
            'total_room' => ['required', 'numeric'],
            'no_beds' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'desc' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $room = Room::findOrFail($id);
        $room->room_type_id = $request->room_type_id;
        $room->total_room = $request->total_room;
        $room->no_beds = $request->no_beds;
        $room->price = $request->price;
        $room->desc = $request->desc;
        $room->status = $request->has('status') ? 1 : 0;

        if ($request->hasFile('image') && !empty($request->file('image'))) {
            $imageName = time() . '.' . $request->file('image')->extension();

            // download image
            $request->file('image')->move(public_path('img'), $imageName);
            $imagePath = 'img/' . $imageName;
            $room->image = $imagePath;
        }
        $room->save();

        return redirect()->route('admin.rooms.index')
            ->with('message', 'Room has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) {
        $room = Room::findOrFail($id);
        $this->authorize('delete', $room);
        $room->delete();
        return redirect()->route('admin.rooms.index')
            ->with('message', 'Room has been deleted!');
    }
}
