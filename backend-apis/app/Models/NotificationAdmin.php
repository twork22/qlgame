<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReportedSet;
use App\Models\User;

class NotificationAdmin extends Model
{
    use HasFactory;

    protected $primaryKey = 'notification_id';

    protected $fillable = [
        'report_id',
        'user_sent',
        'admin_received',
        'title',
        'message',
        'created_date',
        'notification_status'
    ];

    public function report()
    {
        return $this->belongsTo(ReportedSet::class, 'report_id');
    }

    public function userSent()
    {
        return $this->belongsTo(User::class, 'user_sent');
    }

    public function adminReceived()
    {
        return $this->belongsTo(User::class, 'admin_received');
    }
}
