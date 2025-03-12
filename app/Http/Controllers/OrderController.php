<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();

        $orders = $user->orders()->with('room.roomtype')->orderBy('check_in', 'DESC')->get();
        return view('pages.list-orders', ['orders' => $orders]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $order = new Order([
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'room_id' => $request->input('room_id')
        ]);
        $user->orders()->save($order);

        return redirect()->route('orders.index')
            ->with('message', 'Your orders has been created successfully!');
    }
}
