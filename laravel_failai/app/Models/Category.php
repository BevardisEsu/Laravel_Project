<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $image
 * @property string $status
 * @property int $parent_id
 * @property int $sort_order
 * @property carbon $created_at
 * @property carbon $updated_at
 */


class Category extends Model
{
    use HasFactory;




    //Kintamieji kurie gali būti pildomi MassAssignment metu

    protected $fillable = [

        'name',
        'slug',
        'description',
        'image',
        'status',
        'sort_order',
        'parent_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
