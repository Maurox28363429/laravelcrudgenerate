<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Analista",
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
 *          property="apellido",
 *          description="apellido",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cedula",
 *          description="cedula",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Departamento",
 *          description="Departamento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Area de trabajo",
 *          description="Area de trabajo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Cargo",
 *          description="Cargo",
 *          type="string"
 *      )
 * )
 */
class Analista extends Model
{
    use SoftDeletes;


    public $table = 'analista';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'apellido',
        'cedula',
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
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
