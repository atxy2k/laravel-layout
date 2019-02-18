<?php namespace Atxy2k\Layout\Menu;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:44
 */
use Illuminate\Support\Collection;

class Menu
{
    /** @var string|null */
    public $title = null;
    /** @var string|null  */
    public $icon = null;
    /**
     * @var Collection|null
     */
    public $items = null;

    /**
     * Menu constructor.
     * @param null $title
     * @param null $icon
     */
    public function __construct($title, $icon)
    {
        $this->items = new Collection();
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * @param string $title
     * @param string $icon
     * @return Menu
     */
    public static function create(string $title, string $icon) : Menu
    {
        return new Menu($title, $icon);
    }

    /**
     * @param ItemMenu $item
     * @return Menu
     */
    public function addItem(ItemMenu $item ) : Menu
    {
        $this->items->push($item);
        return $this;
    }

    /**
     * @param ItemMenu $item
     * @return Menu
     */
    public function add(ItemMenu $item ) : Menu
    {
        return $this->addItem($item);
    }

    /**
     * @param ItemMenu $item
     * @return Menu
     */
    public function push(ItemMenu $item ) : Menu
    {
        return $this->addItem($item);
    }

    /**
     * @param ItemMenu $item
     * @return Menu
     */
    public function pushItem(ItemMenu $item ) : Menu
    {
        return $this->addItem($item);
    }

    /**
     * @return Collection
     */
    public function items() : Collection
    {
        return $this->items;
    }

    /**
     * @return bool
     */
    public function hasElements() : bool
    {
        return $this->items->isNotEmpty();
    }

    /**
     * @return bool
     */
    public function isEmpty() : bool
    {
        return $this->items->isEmpty();
    }

    /**
     * @return bool
     */
    public function isNotEmpty() : bool
    {
        return $this->items->isNotEmpty();
    }

    /**
     * @return Collection
     */
    public function getElements() : Collection
    {
        return $this->items;
    }

    /**
     * @return string|null
     */
    public function getTitle() : ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getIcon() : ?string
    {
        return $this->icon;
    }

}
