<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function semester() {
        return $this->belongsTo('App\Models\Semester');
    }
    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }
    public function teacher() {
        return $this->belongsTo('App\Models\User','teacher_id');
    }
    public function time() {
        return $this->belongsTo('App\Models\Time');
    }
}
