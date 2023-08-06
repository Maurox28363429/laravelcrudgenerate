<?php

namespace App\Repositories;

use App\Models\Areas_De_Trabajo;
use App\Repositories\BaseRepository;

/**
 * Class Areas_De_TrabajoRepository
 * @package App\Repositories
 * @version August 5, 2023, 8:28 am +07
*/

class Areas_De_TrabajoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'direccion'
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
        return Areas_De_Trabajo::class;
    }
}
