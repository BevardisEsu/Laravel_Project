<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Seeders\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property int $user_id
 * @property int $shipping_address_id
 * @property int $billing_address_id
 * @property int $payment_id
 * @property int $status_id
 * @property carbon $created_at
 * @property carbon $updated_at
 */
class Orders extends Model
{
    use HasFactory;

    //Kintamieji kurių negalima pildyti MassAssignment metu


    protected $guarded = [
        'id',
        'user_id',
        'payment_id',
        'status_id',
    ];

    //Kintamieji kurie gali būti pildomi MassAssignment metu

    protected $fillable =[

        'shipping_address_id',
        'billing_address_id',
    ];


    public function orders(): HasManyThrough
    {
        return $this->hasManyThrough(
            Category::class,
            Carts::class,
            'category_id',
            'id',
            'id',
            'cart_id'
        );
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart', 'order_id');
    }

}
