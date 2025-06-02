<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class WordSet extends Model
{
    use HasFactory;

    protected $table = 'word_sets';

    protected $fillable = [
        'title',
        'description',
        'created_date',
        'view_count',
        'is_hidden',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
