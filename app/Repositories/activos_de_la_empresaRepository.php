<?php

namespace App\Repositories;

use App\Models\activos_de_la_empresa;
use App\Repositories\BaseRepository;

/**
 * Class activos_de_la_empresaRepository
 * @package App\Repositories
 * @version August 6, 2023, 12:45 am +07
*/

class activos_de_la_empresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'modelo',
        'marca',
        'diagnostico',
        'ODS'
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
        return activos_de_la_empresa::class;
    }
}
