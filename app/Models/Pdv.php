<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdv extends Model
{
    protected $fillable = [
        'nome',
        'testeira',
        'responsavel_nome',
        'responsavel_email',
    ];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}