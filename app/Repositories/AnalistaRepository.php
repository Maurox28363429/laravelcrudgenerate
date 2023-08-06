<?php

namespace App\Repositories;

use App\Models\Analista;
use App\Repositories\BaseRepository;

/**
 * Class AnalistaRepository
 * @package App\Repositories
 * @version August 6, 2023, 3:40 am +07
*/

class AnalistaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'cedula',
        'Departamento',
        'Area de trabajo',
        'Cargo'
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
        return Analista::class;
    }
}
