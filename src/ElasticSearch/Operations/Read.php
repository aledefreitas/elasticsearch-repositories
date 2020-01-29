<?php
/**
 * @author      Alexandre de Freitas Caetano <alexandrefc2@hotmail.com>
 */

namespace Aledefreitas\EloquentRepositories\ElasticSearch\Operations;

use \Closure;
use Illuminate\Pagination\Paginator;

trait Read
{
    /**
     * Gets all records
     *
     * @return null|array
     */
    public function all(array $columns = ['*'])
    {
        return $this->model->search('*')->toArray();
    }

    /**
     * Paginates with the results from a given query function
     *
     * @param   int             $results_per_page
     * @param   null|Closure    $query              The query to retrieve data
     *
     * @return null|array
     */
    public function paginate(int $results_per_page = 10, Closure $query = null) : ?array
    {
        if (!is_null($query)) {
            $results = call_user_func($query, $this);
        } else {
            $results = $this->model;
        }

        return $results->paginate($results_per_page)->toArray();
    }

    /**
     * Gets a specific record, by its _id
     *
     * @param   mixed         $id
     * @param   bool        $fail       Whether to fail if not found or not
     *
     * @return  null|array
     */
    public function findById($id, $fail = true) : ?array
    {
        if ($fail) {
            return $this->model::findOrFail($id)->toArray();
        }

        return $this->model::find($id)->toArray();
    }
}
