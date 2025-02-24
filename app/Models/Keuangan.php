<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    // protected $table = 'keuangan';

    protected $guarded = [];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class);
    }
}
