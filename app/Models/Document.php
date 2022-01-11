<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Note;
use App\Models\Step;

class Document extends Model
{
    use HasFactory;

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

}
