<?php namespace Atxy2k\Layout\Menu;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:44
 */
class Menu
{
    public $title = null;
    public $icon = null;

    public $items = [];
    /**
     * Menu constructor.
     * @param null $title
     * @param null $icon
     */
    public function __construct($title, $icon)
    {
        $this->title = $title;
        $this->icon = $icon;
    }

    public static function create(string $title, string $icon) : Menu
    {
        return new Menu($title, $icon);
    }

    public function addItem(ItemMenu $item ) : Menu
    {
        $this->items[] = $item;
        return $this;
    }

    public function add(ItemMenu $item ) : Menu
    {
        return $this->addItem($item);
    }

    public function push(ItemMenu $item ) : Menu
    {
        return $this->addItem($item);
    }

    public function pushItem(ItemMenu $item ) : Menu
    {
        return $this->addItem($item);
    }

    public function items() : array
    {
        return $this->items;
    }

    public function has_elements() : bool
    {
        return count($this->items) > 0;
    }

    public function is_empty() : bool
    {
        return count($this->items) === 0;
    }

    public function getElements() : array
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
