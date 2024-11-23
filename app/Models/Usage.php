<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    /** @use HasFactory<\Database\Factories\UsageFactory> */
    use HasFactory;

    protected $guarded = [];

    public function line()
    {
        return $this->belongsTo(Line::class);
    }
}
