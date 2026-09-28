<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Sblocchiamo i campi per il salvataggio sicuro nel database richiesto da Laravel
    protected $fillable = [
        'title',
        'body',
        'img'
    ];
}
