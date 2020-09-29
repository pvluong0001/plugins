<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Plugin
 * @package App\Models
 * @version September 29, 2020, 10:19 am UTC
 *
 * @property string $name
 * @property string $author
 * @property boolean $enabled
 */
class Plugin extends Model
{
    use SoftDeletes;

    public $table = 'plugins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'author',
        'enabled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'author' => 'string',
        'enabled' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255|min:5',
        'author' => 'required|email|max:255'
    ];

    
}
