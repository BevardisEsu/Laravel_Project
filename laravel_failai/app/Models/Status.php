<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property carbon $created_at
 * @property carbon $updated_at
 */



class Status extends Model
{
  protected $table = 'status';

//Kintamieji kurie gali būti pildomi, tačiau pildomi vartotojo

    protected $fillable = [

        'name',
        'type',
    ];

}
