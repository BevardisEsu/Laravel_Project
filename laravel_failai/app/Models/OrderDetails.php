<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property string $price
 * @property int $status_id
 * @property carbon $created_at
 * @property carbon $updated_at
 */


class OrderDetails extends Model
{
    use HasFactory;

    //Kintamieji kurių negalima keisti, jie bus užpildyti patys

    protected $guarded = [

        'id',
        'price',
        'status_id',
    ];

    //Kintamieji kurie gali būti pildomi, tačiau pildomi vartotojo

    protected $fillable = [

        'quantity',
        'product_name',
        'order_id',
        'product_id',
    ];
}
