<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Seeders\addresses;
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
class Peoples extends Model
{
    use HasFactory;

    //Kintamieji kurių negalima keisti, jie bus užpildyti patys

    protected $guarded = [

        'id',
    ];

    //Kintamieji kurie gali būti pildomi, tačiau pildomi vartotojo

    protected $fillable = [

        'name',
        'surname',
        'personal_code',
        'email',
        'phone',
        'user_id',
        'address_id',
    ];

    public function peoples()
    {
        return $this->belongsTo(User::class);
    }
}
