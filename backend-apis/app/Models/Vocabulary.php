<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GameSession;
use App\Models\WordSet;

class Vocabulary extends Model
{
    use HasFactory;

    protected $primaryKey = 'vocab_id';

    protected $fillable = [
        'word_set_id',
        'term',
        'definition'
    ];

    public function wordSet()
    {
        return $this->belongsTo(WordSet::class, 'word_set_id');
    }

    public function gameSessions()
    {
        return $this->hasMany(GameSession::class, 'vocab_id');
    }
}
