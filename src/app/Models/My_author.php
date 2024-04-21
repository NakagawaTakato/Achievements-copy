<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class My_author extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function wrapper()
    {
        return $this->belongsTo(Wrapper::class);
    }

    public function number()
    {
        return $this->belongsTo(Number::class);
    }
}
