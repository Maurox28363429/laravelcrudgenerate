<?php

namespace App\Repositories;

use App\Models\herramientas;
use App\Repositories\BaseRepository;

/**
 * Class herramientasRepository
 * @package App\Repositories
 * @version August 5, 2023, 8:11 am +07
*/

class herramientasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre',
        'stock',
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
        return herramientas::class;
    }
}
