<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wrapper extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function wrapper_category()
    {
        return $this->belongsTo(Wrapper::class);
    }

    public function number_category()
    {
        return $this->belongsTo(Number::class);
    }

}
