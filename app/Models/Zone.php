<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $table = 'zones';

    protected $fillable = [
        'name',
        'centre_exploitation_id',
        'service_id',
    ];

    // Relation avec CentreDistributionSansRef
    public function centreExploitation()
    {
        return $this->belongsTo(CentreDistributionSansRef::class, 'centre_exploitation_id');
    }

    // Relation avec Service
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function utilisateurRoles()
    {
        return $this->hasMany(UtilisateurRole::class, 'zone_id');
    }

}
