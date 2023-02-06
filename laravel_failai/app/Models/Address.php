<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string $zip_code
 * @property string $type
 * @property string $additional_info
 * @property int $user_id
 * @property carbon @created_at
 * @property carbon @updated_at
 */


class address extends Model
{
    use HasFactory;


    protected $fillable = [

        'country',
        'city',
        'street',
        'zip_code',
        'type',
        'additional_info',
        'user_id'=> 'user_id'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
