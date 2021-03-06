<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->likes()->create([
            'user_id' => auth()->id(),
            'liked' => true
        ]);
    }

    public function dislike()
    {
        return $this->likes()->delete();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
