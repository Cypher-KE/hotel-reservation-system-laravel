<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {

        $types = RoomType::all();
        return view('admin.roomtypes.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.roomtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => ['required', 'unique:room_types,name']
        ]);

        RoomType::create($validatedData);

        return redirect()->route('admin.roomtypes.index')
            ->with('message', 'Your list has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomType $roomType) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id) {
        $type = RoomType::findOrFail($id);
        $this->authorize('update', $type);

        return view('admin.roomtypes.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id) {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:room_types,name']
        ]);

        $type = RoomType::findOrFail($id);
        $type->update($validatedData);

        return redirect()->route('admin.roomtypes.index')
            ->with('message', 'Your RoomType has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) {

        $type = RoomType::findOrFail($id);
        $this->authorize('delete', $type);
        $type->delete();
        return redirect()->route('admin.roomtypes.index')
            ->with('message', 'Your RoomType has been deleted!');
    }
}
