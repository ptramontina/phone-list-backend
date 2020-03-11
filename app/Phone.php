<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'type', 'user_id'
    ];

    public const TYPE_LANDLINE   = 0;
    public const TYPE_CELL_PHONE = 1;
    public const TYPE_WHATSAPP   = 2;

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
