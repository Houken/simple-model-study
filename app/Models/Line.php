<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    /** @use HasFactory<\Database\Factories\LineFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $with = ['book', 'word', 'usages'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function usages()
    {
        return $this->hasMany(Usage::class);
    }
}
