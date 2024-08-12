<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreDistributionSansRef extends Model
{
    use HasFactory;

    protected $table = 'centreDistributionSansRef';

    protected $fillable = [
        'centreDistribution',
        'expDepannage',
        'libelleExpDepannage',
        'distLibelle',
    ];

    // Relation avec Zone
    public function zones()
    {
        return $this->hasMany(Zone::class, 'centre_exploitation_id', 'id');
    }
}
