<?php

namespace App\Repositories;

use App\Models\departamentos;
use App\Repositories\BaseRepository;

/**
 * Class departamentosRepository
 * @package App\Repositories
 * @version August 5, 2023, 8:21 am +07
*/

class departamentosRepository extends BaseRepository
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
        return departamentos::class;
    }
}
