<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'email', 'meno', 'priezvisko', 'firma', 'ulica', 'mesto',
        'psc', 'krajina', 'predvolba', 'telefon', 'delivery', 'payment', 'items', 'total'
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
