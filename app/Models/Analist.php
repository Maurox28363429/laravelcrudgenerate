<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Analist",
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
 *          property="Apellido",
 *          description="Apellido",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Cedula",
 *          description="Cedula",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Departamento",
 *          description="Departamento",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Cargo",
 *          description="Cargo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Area",
 *          description="Area",
 *          type="string"
 *      )
 * )
 */
class Analist extends Model
{
    use SoftDeletes;


    public $table = 'Analist';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'Nombre',
        'Apellido',
        'Cedula',
        'Departamento',
        'Cargo',
        'Area'
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
