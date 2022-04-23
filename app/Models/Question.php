<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
use Carbon\Carbon;

class Question extends Model
{
    // use HasFactory;

    protected $fillable = ['title', 'content', 'status'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y/m/d');
    }
}
