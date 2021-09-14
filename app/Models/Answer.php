<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Question;
use Carbon\Carbon;

class Answer extends Model
{
    // use HasFactory;

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y/m/d');
    }
}
