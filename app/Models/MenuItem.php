<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'pdv_id',
        'categoria',
        'produto',
        'preco',
    ];

    public function pdv()
    {
        return $this->belongsTo(Pdv::class);
    }
}