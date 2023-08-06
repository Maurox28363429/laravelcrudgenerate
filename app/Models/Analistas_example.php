<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Analistas_example",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="img",
 *          description="img",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="herramienta_id",
 *          description="herramienta_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Analistas_example extends Model
{
    use SoftDeletes;


    public $table = 'analistas_example';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'img',
        'herramienta_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'img' => 'string',
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
