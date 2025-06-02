<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WordSet;

class Tag extends Model
{
    use HasFactory;

    protected $primaryKey = 'tag_id';

    public function wordSets()
    {
        return $this->belongsToMany(WordSet::class, 'word_set_tag', 'tag_id', 'word_set_id');
    }
}
