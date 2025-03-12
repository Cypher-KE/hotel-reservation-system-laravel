<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AdminController extends Controller {

    public function index(): View {
        $totalRooms = Room::sum('total_room');
        $reservedRoom = Order::whereDate('check_in', '>=', Carbon::now())->count();
        $totalRevenue = Room::join('orders', 'rooms.id', '=', 'orders.room_id')
                            ->sum('rooms.price');
        $recentReservations = Order::with('user')->latest()->limit(5)->get();

        return view('admin.index', compact('totalRooms', 'reservedRoom', 'totalRevenue', 'recentReservations'));
    }
}
