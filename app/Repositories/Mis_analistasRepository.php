<?php

namespace App\Repositories;

use App\Models\Mis_analistas;
use App\Repositories\BaseRepository;

/**
 * Class Mis_analistasRepository
 * @package App\Repositories
 * @version August 6, 2023, 4:05 am +07
*/

class Mis_analistasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre',
        'Indicador',
        'Cedula',
        'Departamento',
        'Area_de_trabajo',
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
        return Mis_analistas::class;
    }
}
