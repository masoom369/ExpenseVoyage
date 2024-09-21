<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'destination_id', 'name', 'budget', 'start_date', 'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }
}
