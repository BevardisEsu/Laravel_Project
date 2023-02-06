<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $amount
 * @property int $status_id
 * @property carbon $created_at
 * @property carbon $updated_at
 */


class Payments extends Model
{

    //Kintamieji kurių negalima pildyti MassAssignment metu

    protected $guarded = [

        'status_id',
        'id',
    ];

    //Kintamieji kurie gali būti pildomi MassAssignment metu

    protected $fillable = [

        'order_id',
        'amount',
    ];

    public function payment()
    {
        return $this->belongsTo(Status::class);
    }

}
