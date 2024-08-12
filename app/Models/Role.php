<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'Roles';
    protected $fillable = [
        'nom_role',
        'droit_admin_id', // Assurez-vous que cette colonne est bien définie dans la table
    ];

    // Relation avec DroitAdmin (beaucoup à beaucoup)
    public function droitAdmins()
    {
        return $this->belongsToMany(DroitAdmin::class, 'role_droit_admin', 'role_id', 'droit_admin_id');
    }
}
