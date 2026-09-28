<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'application';

    protected $fillable = [
        'app',
        'url',
        'editeur',
        'direction',
        'sla',
       
    ];
 
    public $timestamps = false;

    // Reste du code du modèle...
}

