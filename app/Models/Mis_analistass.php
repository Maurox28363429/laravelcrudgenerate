<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Mis_analistass",
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
 *          property="Nombre",
 *          description="Nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Indicador",
 *          description="Indicador",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Cedula",
 *          description="Cedula",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Departamento",
 *          description="Departamento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Area_de_trabajo",
 *          description="Area_de_trabajo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Cargo",
 *          description="Cargo",
 *          type="string"
 *      )
 * )
 */
class Mis_analistass extends Model
{
    use SoftDeletes;


    public $table = 'Mis_analistass';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre',
        'Indicador',
        'Cedula',
        'Departamento',
        'Area_de_trabajo',
        'Cargo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Cedula' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
