<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PublicationStatus extends Model
{
    protected $table = 'publicationstatus';
    public function products()
    {
        return $this->hasMany(Products::class, 'status', 'status_name');
    }
    //
}
