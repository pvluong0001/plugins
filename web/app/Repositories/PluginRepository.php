<?php

namespace App\Repositories;

use App\Models\Plugin;
use App\Repositories\BaseRepository;

/**
 * Class PluginRepository
 * @package App\Repositories
 * @version September 29, 2020, 10:19 am UTC
*/

class PluginRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'author',
        'enabled'
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
        return Plugin::class;
    }
}
