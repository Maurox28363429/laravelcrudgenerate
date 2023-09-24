<?php

namespace App\Repositories;

use App\Models\Equipo1;
use App\Repositories\BaseRepository;

/**
 * Class Equipo1Repository
 * @package App\Repositories
 * @version August 26, 2023, 10:07 pm +07
*/

class Equipo1Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'piezas'
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
        return Equipo1::class;
    }
}
