<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $personal_code
 * @property string $email
 * @property string $phone
 * @property int $user_id
 * @property int $address_id
 * @property carbon $created_at
 * @property carbon $updated_at
 */


class Persons extends Model
{
    use HasFactory;

    //Kintamieji kurių negalima keisti, jie bus užpildyti patys

    protected $guarded = [

        'id',
        'user_id',
        'address_id',
    ];

    //Kintamieji kurie gali būti pildomi, tačiau pildomi vartotojo

    protected $fillable = [

        'name',
        'last_name',
        'personal_code',
        'email',
        'phone'
    ];

    public function person()
    {
        return $this->belongsTo(User::class);
    }
}
