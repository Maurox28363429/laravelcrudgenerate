<?php

namespace App\Repositories;

use App\Models\asistencia;
use App\Repositories\BaseRepository;

/**
 * Class asistenciaRepository
 * @package App\Repositories
 * @version September 25, 2023, 3:10 am +07
*/

class asistenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'cedula'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return asistencia::class;
    }
}
