<?php

namespace App\Repositories;

use App\Models\Cargos;
use App\Repositories\BaseRepository;

/**
 * Class CargosRepository
 * @package App\Repositories
 * @version August 6, 2023, 1:22 am +07
*/

class CargosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'codigo'
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
        return Cargos::class;
    }
}
