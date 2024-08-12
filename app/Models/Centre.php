<?php

// app/Models/Centre.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;

    protected $table = 'centreDistributionSansRef';

    protected $fillable = [
        'centreDistribution',
        'expDepannage',
        'libelleExpDepannage',
        'distLibelle',
    ];

    public function zones()
    {
        return $this->hasMany(Zone::class, 'centre_id', 'id');
    }
}
