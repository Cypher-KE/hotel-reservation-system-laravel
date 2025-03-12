<?php

namespace App\Policies;

use App\Models\RoomType;
use App\Models\User;

class RoomTypePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, RoomType $roomType): bool
    {
        return !in_array($roomType->name, ['Standard', 'Deluxe', 'Superior']);
    }

    public function delete(User $user, RoomType $roomType): bool
    {
        return !in_array($roomType->name, ['Standard', 'Deluxe', 'Superior']);
    }
}
