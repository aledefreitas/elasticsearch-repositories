<?php
/**
 * VIVAPETS
 *
 * @author      Alexandre de Freitas Caetano <alexandrefc2@hotmail.com>
 * @link        https://vivapets.com/
 * @copyright   Copyright (c): Vivapets
 */

namespace Aledefreitas\EloquentRepositories\ElasticSearch\Operations;

use Illuminate\Database\QueryException;

trait Delete
{
    /**
     * Deletes a record
     *
     * @param   int     $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $entity = $this->model->newInstance($id);

        if ($entity->unsearchable()) {
            return '';
        }

        throw new QueryException('Could not delete the record.');
    }
}
