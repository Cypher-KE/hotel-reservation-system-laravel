<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller {

    public function index(): View {

        $rooms = Room::with('roomtype')->where('status', 1)->get();
        return view('pages.home', compact('rooms'));
    }

    public function list_rooms() {

        $rooms = Room::with('roomtype')->where('status', 1)->get();
        return view('pages.list-rooms', compact('rooms'));
    }

    public function search(Request $request) {

        $validatedData = $request->validate([
            'check_in' => ['required', 'date', 'after:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'no_peron' => ['required']
        ]);
        $rooms = Room::with('roomtype')->where('status', 1)
            ->whereHas('orders', function (Builder $query) use ($validatedData) {
                $query->whereBetween('check_in', [$validatedData['check_in'], $validatedData['check_out']])
                    ->orWhereBetween('check_out', [$validatedData['check_in'], $validatedData['check_out']]);
            }, '<', DB::raw('rooms.total_room'))->get();
        $searched = true;
        $fields = $validatedData;
        return view('pages.list-rooms', compact('rooms', 'searched', 'fields'));
    }

    public function showProfile() {
        return view('pages.profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->save();

        return redirect()->route('profile');
    }
}
