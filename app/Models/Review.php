<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prodact;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'prodact_id',
        'rating',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prodact()
    {
        return $this->belongsTo(Prodact::class, 'prodact_id');
    }
}