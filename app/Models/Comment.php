<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function collection() {
        return $this->belongsTo(\App\Models\Nft::class);
    }

    public function author() {
        return $this->belongsTo(\App\Models\User::class);
    }
}
