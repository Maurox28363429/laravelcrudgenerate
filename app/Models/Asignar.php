<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Asignar",
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
 *          property="Analista",
 *          description="Analista",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Activo",
 *          description="Activo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Herramienta",
 *          description="Herramienta",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Entrega",
 *          description="Entrega",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="Devuelto",
 *          description="Devuelto",
 *          type="string",
 *          format="date"
 *      )
 * )
 */
class Asignar extends Model
{
    use SoftDeletes;


    public $table = 'asignars';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'Analista',
        'Activo',
        'Herramienta',
        'Entrega',
        'Devuelto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function getEntregaAttribute($value)
    {
        if($value==null){
            return null;
        }
        $fecha=date('d-m-Y', strtotime($value));
        $fecha_array=explode('-', $fecha);
        $fecha=$fecha_array[0].'-'.$fecha_array[1].'-'.$fecha_array[2];
        return $fecha;
    }
    public function getDevueltoAttribute($value)
    {   
        if($value==null){
            return null;
        }
        $fecha = date('d-m-Y', strtotime($value));
        $fecha_array = explode('-', $fecha);
        $fecha = $fecha_array[0] . '/' . $fecha_array[1] . '/' . $fecha_array[2];
        return $fecha;
    }
}
