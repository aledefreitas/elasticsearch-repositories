<?php
/**
 * VIVAPETS
 *
 * @author      Alexandre de Freitas Caetano <alexandrefc2@hotmail.com>
 * @link        https://vivapets.com/
 * @copyright   Copyright (c): Vivapets
 */

namespace Aledefreitas\EloquentRepositories\ElasticSearch\Operations;

trait Update
{
    /**
     * Updates a record
     *
     * @param   mixed         $id
     * @param   array       $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $data = [])
    {
        $primaryKey = $this->model->primaryKey;

        $this->model->where($primaryKey, $id)->update($data);

        return $this->model->where($primaryKey, $id)->get()->first();
    }
}
