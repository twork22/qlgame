<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\WordSet;

class WordSetTag extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;

    public function wordSet()
    {
        return $this->belongsTo(WordSet::class, 'word_set_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
