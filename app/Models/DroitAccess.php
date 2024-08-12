<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroitAccess extends Model
{
    use HasFactory;

    // Nom exact de la table dans la base de données
    protected $table = 'Droit_access';

    // Attributs mass assignables
    protected $fillable = [
        'nom_droit_access',
        'niveau_droit_access',
    ];

    // Relation avec UtilisateurRole
    public function utilisateurRoles()
    {
        return $this->hasMany(UtilisateurRole::class, 'droit_access_id');
    }

    // Relation avec Utilisateur
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'droit_access_id');
    }
}
