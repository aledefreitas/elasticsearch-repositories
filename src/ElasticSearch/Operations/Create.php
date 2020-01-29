<?php
/**
 * @author      Alexandre de Freitas Caetano <alexandrefc2@hotmail.com>
 */

namespace Aledefreitas\EloquentRepositories\ElasticSearch\Operations;

trait Create
{
    /**
     * Creates a new record and returns it
     *
     * @return \Illuminate\Database\ElasticSearch\Model
     */
    public function create(array $data = [])
    {
        $modelInstance = $this->model->newInstance($data);

        if (method_exists($this, 'triggerEloquentEvent')) {
            $this->triggerEloquentEvent(
                'created',
                $modelInstance
            );
        }

        $modelInstance->searchable();

        return $modelInstance;
    }
}
