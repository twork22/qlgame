<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\WordSet;
use App\Models\Vocabulary;
use App\Models\GameMode;

class GameSession extends Model
{
    use HasFactory;

    protected $primaryKey = 'session_id';

    protected $fillable = [
        'user_id',
        'word_set_id',
        'vocab_id',
        'play_date',
        'play_duration',
        'end_date',
        'game_mode_id',
        'game_theme',
        'game_outine',
        'game_music',
        'score'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wordSet()
    {
        return $this->belongsTo(WordSet::class, 'word_set_id');
    }

    public function vocabulary()
    {
        return $this->belongsTo(Vocabulary::class, 'vocab_id');
    }

    public function gameMode()
    {
        return $this->belongsTo(GameMode::class, 'game_mode_id');
    }
}
