<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;

class RoomPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Room $room): bool
    {
        return !in_array($room->id, [1,2,3]);
    }

    public function delete(User $user, Room $room): bool
    {
        return !in_array($room->id, [1,2,3]);
    }
}
