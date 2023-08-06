<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class example
 * @package App\Models
 * @version August 6, 2023, 1:16 am +07
 *
 * @property \App\Models\herramientas $herramientas
 * @property string $foto
 * @property integer $herramienta_id
 */
class example extends Model
{


    public $table = 'example';
    



    public $fillable = [
        'foto',
        'herramienta_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'herramienta_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function herramientas()
    {
        return $this->hasOne(\App\Models\herramientas::class, 'id', 'herramienta_id');
    }
}
