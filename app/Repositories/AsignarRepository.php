<?php

namespace App\Repositories;

use App\Models\Asignar;
use App\Repositories\BaseRepository;

/**
 * Class AsignarRepository
 * @package App\Repositories
 * @version August 6, 2023, 5:24 am +07
*/

class AsignarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Analista',
        'Activo',
        'Herramienta',
        'Entrega',
        'Devuelto'
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
        return Asignar::class;
    }
}
