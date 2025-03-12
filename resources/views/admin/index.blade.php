@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5 display-4 font-weight-bold">Dashboard Overview</h1>
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Total Rooms -->
            <div class="col">
                <div class="card text-white bg-primary shadow-lg rounded-4">
                    <div class="card-header h4 text-center">Total Rooms</div>
                    <div class="card-body d-flex justify-content-center align-items-center py-5">
                        <h5 class="display-3 font-weight-bold">{{ $totalRooms }}</h5>
                    </div>
                </div>
            </div>

            <!-- Reserved Rooms -->
            <div class="col">
                <div class="card text-white bg-success shadow-lg rounded-4">
                    <div class="card-header h4 text-center">Total Reservations</div>
                    <div class="card-body d-flex justify-content-center align-items-center py-5">
                        <h5 class="display-3 font-weight-bold">{{ $reservedRoom }}</h5>
                    </div>
                </div>
            </div>

            <!-- Available Rooms -->
            <div class="col">
                <div class="card text-white bg-info shadow-lg rounded-4">
                    <div class="card-header h4 text-center">Available Rooms</div>
                    <div class="card-body d-flex justify-content-center align-items-center py-5">
                        <h5 class="display-3 font-weight-bold">{{ $totalRooms - $reservedRoom }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
            <!-- Occupancy Rate -->
            <div class="col">
                <div class="card text-white bg-warning shadow-lg rounded-4">
                    <div class="card-header h4 text-center">Occupancy Rate</div>
                    <div class="card-body d-flex justify-content-center align-items-center py-5">
                        <h5 class="display-3 font-weight-bold">
                            {{ round(($reservedRoom / $totalRooms) * 100, 2) }}%
                        </h5>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="col">
                <div class="card text-white bg-danger shadow-lg rounded-4">
                    <div class="card-header h4 text-center">Total Revenue</div>
                    <div class="card-body d-flex justify-content-center align-items-center py-5">
                        <h5 class="display-3 font-weight-bold">${{ number_format($totalRevenue, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header h4 text-center bg-dark text-white">Recent Reservations</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Room ID</th>
                                    <th>User</th>
                                    <th>Check-In</th>
                                    <th>Check-Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentReservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->room_id }}</td>
                                        <td>{{ $reservation->user->name }}</td>
                                        <td>{{ $reservation->check_in }}</td>
                                        <td>{{ $reservation->check_out }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection