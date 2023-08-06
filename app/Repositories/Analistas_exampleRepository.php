<?php

namespace App\Repositories;

use App\Models\Analistas_example;
use App\Repositories\BaseRepository;

/**
 * Class Analistas_exampleRepository
 * @package App\Repositories
 * @version August 6, 2023, 1:54 am +07
*/

class Analistas_exampleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'img',
        'herramienta_id'
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
        return Analistas_example::class;
    }
}
