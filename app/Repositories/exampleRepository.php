<?php

namespace App\Repositories;

use App\Models\example;
use App\Repositories\BaseRepository;

/**
 * Class exampleRepository
 * @package App\Repositories
 * @version August 6, 2023, 1:16 am +07
*/

class exampleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'foto',
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
        return example::class;
    }
}
