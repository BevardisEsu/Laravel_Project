<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $image
 * @property int $category_id
 * @property int $price
 * @property string $status
 * @property int $cart_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Orders extends Model
{
    use HasFactory;

    //Kintamieji kurių negalima pildyti MassAssignment metu


    protected $guarded = [
        'id',

    ];

    //Kintamieji kurie gali būti pildomi MassAssignment metu

    protected $fillable =[

        'name',
        'user_id',
        'payment_id',
        'status_id',
        'shipping_address_id',
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
