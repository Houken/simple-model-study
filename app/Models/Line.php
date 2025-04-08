<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function scopeBookFilter(Builder $query, Request $request)
    {
        $bookId = $request->book ?? 1;

        return $query->when($bookId, function ($query) use ($bookId) {
            return $query->where('book_id', $bookId);
        });
    }

    public function scopeIndexNoFilter(Builder $query, Request $request)
    {
        $indexNoFrom = $request->from ?? 1;
        $indexNoTo = $request->to ?? 100;

        return $query->when($indexNoFrom, function ($query) use ($indexNoFrom, $indexNoTo) {
            return $query->whereBetween('index_no', [$indexNoFrom, $indexNoTo]);
        });
    }
}
