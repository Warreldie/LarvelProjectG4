<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nft extends Model
{
    use HasFactory;
    protected $fillable = [
        'token_id',
        'mint_id',
        'price',
        'forsale'
    ];

    public function collection()
    {
        return $this->belongsTo(\App\Models\Collection::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }
}
