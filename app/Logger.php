<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['action'];
    
    //
    const UPDATED_AT = null;
}
