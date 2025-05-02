<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_of_waste',
        'amount',
        'collection_date',
        'address',
        'status',
    ];

    // Relación: Un CollectionRequest pertenece a un User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
