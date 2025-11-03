<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AstroProfile extends Model
{
    use HasFactory;

    // Specify the actual table name
    protected $table = 'ab15b_astroProfile_table';

    // Specify the primary key (if not 'id')
    protected $primaryKey = 'astroProfileID';

    // If the table doesn’t use created_at/updated_at columns, disable timestamps
    public $timestamps = false;

    // Mass-assignable fields
    protected $fillable = [
        'astroProfileName',
        'gender',
        'dateOfBirth',
        'placeOfBirthCity',
        'placeOfBirthState',
        'placeOfBirthCountry',
        'timeOfBirth',
        'isPaymentDone',
        'isAllianceProfile',        
        // add other columns present in your table as needed
    ];

    /**
     * Scope for active alliance profiles with payment done.
     */
    public function scopeActiveAlliance($query)
    {
        return $query->where('isPaymentDone', 'Y')
                     ->where('isAllianceProfile', 'Y');
    }
}
