<?php namespace Atxy2k\Layout\Breadcrumb;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:49
 */

use Atxy2k\Layout\Exceptions\UnsupportedFormatException;
use Illuminate\Support\Collection;
use Throwable;

class QuickActions
{
    /** @var Collection */
    protected $actions = null;

    /**
     * QuickActions constructor.
     */
    public function __construct()
    {
        $this->actions = new Collection();
    }

    /**
     * Add an action to actions list
     * @param QuickAction $action
     * @return QuickActions
     */
    public function push( QuickAction $action ) : QuickActions
    {
        $this->actions->push($action);
        return $this;
    }

    /**
     * Add an action to actions list
     * @param QuickAction $action
     * @return QuickActions
     */
    public function add(QuickAction $action) : QuickActions
    {
        return $this->push($action);
    }

    /**
     * Add an action to actions list
     * @param QuickAction $action
     * @return QuickActions
     */
    public function append(QuickAction $action) : QuickActions
    {
        return $this->add($action);
    }

    /**
     * Add a list of actions to the current actions list
     * @param $actions
     * @return QuickActions
     * @throws Throwable
     */
    public function addActions($actions) : QuickActions
    {
        throw_if(!is_array($actions) || !$actions instanceof Collection, UnsupportedFormatException::class);
        foreach ( $actions as $action )
        {
            if( $action instanceof QuickAction )
            {
                $this->add($action);
            }
        }
        return $this;
    }

    /**
     * Add a item to list from default action's params.
     * @param string $localUrl
     * @param string $text
     * @param string $icon
     * @param array $extras
     * @param string|null $category
     * @param bool $local
     * @return QuickActions
     */
    public function pushFrom( string $localUrl, string $text, string $icon, array $extras = [], string $category = null, bool $local = true ) : QuickActions
    {
        $action = QuickAction::create($localUrl, $text, $icon, $extras, $category,$local);
        $this->actions->push($action);
        return $this;
    }

    /**
     * Add a item to list from default action's params.
     * @param string $localUrl
     * @param string $text
     * @param string $icon
     * @param array $extras
     * @param string|null $category
     * @param bool $local
     * @return QuickActions
     */
    public function addFrom( string $localUrl, string $text, string $icon, array $extras = [], string $category = null, bool $local = true ) : QuickActions
    {
        return $this->pushFrom($localUrl, $text, $icon, $extras, $category, $local);
    }

    /**
     * Return if category actions or all actions are empty
     * @param string|null $category
     * @return bool
     */
    public function isEmpty(string $category = null) : bool
    {
        return is_null($category) ? $this->actions->isNotEmpty() : $this->actions->where('category', $category)->isEmpty();
    }

    /**
     * Return if category actions or all actions are not empty
     * @param string|null $category
     * @return bool
     */
    public function isNotEmpty(string $category = null) : bool
    {
        return is_null($category) ? $this->actions->isNotEmpty() : $this->actions->where('category', $category)->isNotEmpty();
    }


    public function getElements(string $category = null) : Collection
    {
        return is_null($category) ? $this->actions : $this->actions->where('category', $category);
    }
}
