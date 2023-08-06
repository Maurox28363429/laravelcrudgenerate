<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="activos_de_la_empresa",
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
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="modelo",
 *          description="modelo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="marca",
 *          description="marca",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="diagnostico",
 *          description="diagnostico",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ODS",
 *          description="ODS",
 *          type="string"
 *      )
 * )
 */
class activos_de_la_empresa extends Model
{
    use SoftDeletes;


    public $table = 'activos_de_la_empresa';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'modelo',
        'marca',
        'diagnostico',
        'ODS'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'modelo' => 'string',
        'marca' => 'string',
        'diagnostico' => 'string',
        'ODS' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
