<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GameMode;

class Game extends Model
{
    use HasFactory;

    protected $primaryKey = 'game_id';

    protected $fillable = [
        'game_name',
        'rules'
    ];

    public function gameModes()
    {
        return $this->hasMany(GameMode::class, 'game_id');
    }
}
