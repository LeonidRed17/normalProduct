<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;


class Products extends Model
{
    public function publicationStatus()
    {
        return $this->belongsTo(PublicationStatus::class, 'status', 'status_name');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
    use HasFactory;
}
