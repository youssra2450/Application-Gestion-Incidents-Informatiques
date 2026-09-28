<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateurs';

    
    protected $fillable = ['nom', 'prenom', 'date_naissance'];
}
