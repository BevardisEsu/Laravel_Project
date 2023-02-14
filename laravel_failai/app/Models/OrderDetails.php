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



    //Kintamieji kurie gali būti pildomi, tačiau pildomi vartotojo

    protected $fillable = [

       'order_id',
        'product_name',
        'product_id',
        'quantinty',
        'price',
        'status_id'
    ];
    public function odetails()
    {
        return $this->belongsTo(Orders::class);
    }
}
