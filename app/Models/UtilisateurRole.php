<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilisateurRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id', 'role_id', 'zone_id', 'droit_access_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function droitAccess()
    {
        return $this->belongsTo(DroitAccess::class);
    }
}
