<?php

namespace App\Repositories;

use App\Models\piezas;
use App\Repositories\BaseRepository;

/**
 * Class piezasRepository
 * @package App\Repositories
 * @version August 26, 2023, 10:14 pm +07
*/

class piezasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'cantidad',
        "serial",
        "marca"
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
        return piezas::class;
    }
}
