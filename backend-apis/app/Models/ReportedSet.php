<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\WordSet;

class ReportedSet extends Model
{
    use HasFactory;

    protected $primaryKey = 'report_id';

    protected $fillable = [
        'user_id',
        'word_set_id',
        'report_status',
        'reason',
        'reported_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wordset()
    {
        return $this->belongsTo(WordSet::class, 'word_set_id', 'word_set_id');
    }
}
