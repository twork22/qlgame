<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GameSession;
use App\Models\Game;

class GameMode extends Model
{
    use HasFactory;

    protected $primaryKey = 'game_mode_id';

    protected $fillable = [
        'game_id',
        'grid_size',
        'min_words',
        'max_words'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function gameSessions()
    {
        return $this->hasMany(GameSession::class, 'game_mode_id');
    }
}
