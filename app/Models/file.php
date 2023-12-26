<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'document',
        'downloads',
        'id',
        'user_id',
        'categorie_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categorie(){
        return $this->belongsTo(categorie::class);
    }
}
