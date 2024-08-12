<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $table = 'Utilisateurs';

    // Attributs mass assignables
    protected $fillable = [
        'nom',
        'prenom',
        'username',
        'email',
        'password',
        'droit_access_id',  // Ajout de la colonne droit_access_id
    ];

    // Relation avec UtilisateurRole
    public function utilisateurRoles()
    {
        return $this->hasMany(UtilisateurRole::class, 'utilisateur_id');
    }

    // Relation avec DroitAccess
    public function droitAccess()
    {
        return $this->belongsTo(DroitAccess::class, 'droit_access_id');
    }
}
