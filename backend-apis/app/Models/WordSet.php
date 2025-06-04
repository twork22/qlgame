<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vocabulary;

class WordSet extends Model
{
    use HasFactory;

    protected $table = 'word_sets';

    protected $primaryKey = 'word_set_id';

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

    public function vocabularies() {
        return $this->hasMany(Vocabulary::class, 'word_set_id', 'word_set_id');
    }
}
