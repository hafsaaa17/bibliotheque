<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    protected $fillable = [
        'livre_id',
        'membre_id',
        'date_emprunt',
        'date_retour',
        'statut'
    ];

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
