<?php

namespace App\Repositories;

use App\Models\pedros;
use App\Repositories\BaseRepository;

/**
 * Class pedrosRepository
 * @package App\Repositories
 * @version August 1, 2023, 1:42 am +07
*/

class pedrosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return pedros::class;
    }
}
