<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class NotificationUser extends Model
{
    use HasFactory;

    protected $primaryKey = 'notification_id';

    protected $fillable = [
        'admin_sent',
        'user_received',
        'title',
        'message',
        'created_date',
        'notification_status'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_sent');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_received');
    }
}
