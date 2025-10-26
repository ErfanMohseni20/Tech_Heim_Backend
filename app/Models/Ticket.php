<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'level',
        'title',
        'status'
    ];
    //relations 
    public function ticketreplies()
    {
        return $this->hasMany(TicketReply::class, 'ticket_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
