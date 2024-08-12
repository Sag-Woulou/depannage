<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroitAdmin extends Model
{
    use HasFactory;

    // Nom exact de la table dans la base de données
    protected $table = 'Droit_admin';

    // Attributs mass assignables
    protected $fillable = [
        'nom_droit_admin',
        'niveau_droit_admin',
    ];

    // Relation avec UtilisateurRole
    public function utilisateurRoles()
    {
        return $this->hasMany(UtilisateurRole::class, 'droit_admin_id');
    }

    // Relation avec Role
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_droit_admin', 'droit_admin_id', 'role_id');
    }
}
