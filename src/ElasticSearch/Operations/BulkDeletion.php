<?php
/**
 * VIVAPETS
 *
 * @author      Alexandre de Freitas Caetano <alexandrefc2@hotmail.com>
 * @link        https://vivapets.com/
 * @copyright   Copyright (c): Vivapets
 */

namespace Aledefreitas\EloquentRepositories\ElasticSearch\Operations;

trait BulkDeletion
{
    /**
     * Deletes records by ids
     *
     * @param   array       $ids        IDs to delete
     *
     * @return int
     */
    public function deleteAll(array $ids = [])
    {
        // It is much faster to execute small individual queries in ElasticSearch
        // Due to partitioning
        foreach ($ids as $id) {
            return $this->model
                ->search('*')
                ->where($this->model->getScoutKeyName(), $id)
                ->delete([
                    'conflicts' => 'proceed',
                ]);
        }
    }

    /**
     * Deletes all records where column's value matches value sent
     *
     * @param   string      $column
     * @param   mixed       $value
     *
     * @return mixed
     */
    public function deleteAllWhere(string $column, $value)
    {
        $items = $this->model
            ->search('*')
            ->where($column, $value)
            ->delete([
                'conflicts' => 'proceed',
            ]);
    }

    /**
     * Deletes all records where column's value matches values sent
     *
     * @param   string      $column
     * @param   mixed       $values
     *
     * @return mixed
     */
    public function deleteAllWhereIn(string $column, $values)
    {
        return $this->model
            ->search('*')
            ->whereIn($column, $values)
            ->delete([
                'conflicts' => 'proceed',
            ]);
    }
}
