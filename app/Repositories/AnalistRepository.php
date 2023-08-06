<?php

namespace App\Repositories;

use App\Models\Analist;
use App\Repositories\BaseRepository;

/**
 * Class AnalistRepository
 * @package App\Repositories
 * @version August 6, 2023, 5:16 am +07
*/

class AnalistRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nombre',
        'Apellido',
        'Cedula',
        'Departamento',
        'Cargo',
        'Area'
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
        return Analist::class;
    }
}
