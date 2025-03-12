<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Room extends Model {

    use HasFactory;

    protected $fillable = [
        'total_room',
        'no_beds',
        'price',
        'image',
        'status',
        'desc',
        'room_type_id',
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function roomtype(): BelongsTo {
        return $this->belongsTo(RoomType::class, 'room_type_id', 'id');
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class, 'room_id', 'id');
    }
}
