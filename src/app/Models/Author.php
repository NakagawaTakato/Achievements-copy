<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Wrapper()
    {
        return $this->belongsTo(Wrapper::class);
    }

    public function Number()
    {
        return $this->belongsTo(Number::class);
    }
}
