<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

        'name',
        'country',
        'city',
        'zip_code',
        'street',
        'house_number',
        'apartment_number',
        'state',
        'type',
        'additional_info',
        'user_id',
        ];


    public function address()
    {
        return $this->belongsTo(User::class);
    }


}
