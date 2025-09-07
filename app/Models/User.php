<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'ab15_userInfo_table';
    public $timestamps = false;

    // Primary key column
    protected $primaryKey = 'userID';

    // Auto-increment is true for bigint(20)
    public $incrementing = true;

    // If it's bigint
    protected $keyType = 'int';

    protected $fillable = [
        'globalUserID',
        'userName',
        'userType',
        'targetAudienceOfProducts',
        'email',
        'googleID' ,
        'profilePicture' ,
        'isEmailVerified',
    ];

    // Hide sensitive attributes (none here, but if needed add)
    protected $hidden = [
        // e.g. 'password', 'remember_token'
    ];

    // Cast attributes
    protected function casts(): array
    {
        return [
            'globalUserID' => 'integer',
            'userID' => 'integer',
            'targetAudienceOfProducts' => 'array', // since it's a SET type
        ];
    }
}
