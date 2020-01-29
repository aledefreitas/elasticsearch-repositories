<?php
/**
 * @author Alexandre de Freitas Caetano <https://github.com/aledefreitas>
 */

namespace Aledefreitas\EloquentRepositories;

use Aledefreitas\EloquentRepositories\AbstractRepository as BaseRepository;

use Aledefreitas\EloquentRepositories\Contracts\Operations\ReadInterface;
use Aledefreitas\EloquentRepositories\ElasticSearch\Operations\Read;
use Aledefreitas\EloquentRepositories\ElasticSearch\Operations\TriggersEvents;

abstract class AbstractElasticSearchRepository extends BaseRepository implements ReadInterface
{
    use Read;
    use TriggersEvents;
}
