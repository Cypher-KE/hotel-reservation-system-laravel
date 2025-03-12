<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
            <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
        </div>
        <div class="row g-4">
            @foreach($rooms as $room)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->iteration/10 }}s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative image-container">
                            <img src="{{ asset($room->image) }}" alt="">
                            <small class="position-absolute start-0 top-0 bg-primary
                            text-white rounded py-1 px-3 ms-4">${{ $room->price }}/Night</small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{ $room->roomtype->name }}</h5>
                                <div class="ps-2">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4"
                                   href="{{ route('rooms.index') }}">View Detail</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4"
                                   href="{{ route('rooms.index') }}">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
