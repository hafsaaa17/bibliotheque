<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    protected $fillable = ['nom', 'email', 'historique'];

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}
