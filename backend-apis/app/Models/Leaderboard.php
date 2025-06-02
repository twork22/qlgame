<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\WordSet;

class Leaderboard extends Model
{
    use HasFactory;

    protected $primaryKey = 'leaderboard_id';

    protected $fillable = [
        'user_id',
        'word_set_id',
        'created_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wordSet()
    {
        return $this->belongsTo(WordSet::class, 'word_set_id');
    }
}
