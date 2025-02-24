<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tata_usaha extends Model
{
    protected $guarded = [];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class);
    }
}
