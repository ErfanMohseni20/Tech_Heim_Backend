<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'email',
        'password',
        'avatar',
        'is_admin',
    ];
    //realtions 
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }
    public function ticketreplies()
    {
        return $this->hasMany(TicketReply::class, 'user_id');
    }
}
