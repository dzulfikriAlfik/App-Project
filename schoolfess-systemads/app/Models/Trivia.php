<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trivia extends Model
{
    protected $primaryKey = 'trivia_id';
    protected $fillable = [
        'trivia_id', 'trivia_text', 'created_by', 'updated_by'
    ];
    public $timestamps = false;
}
