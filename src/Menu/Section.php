<?php namespace Atxy2k\Layout\Menu;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:41
 */
class Section
{
    const DROPDOWN = 1;
    const MEGAMENU = 2;

    public $title = null;
    public $icon  = null;
    public $new = false;
    public $type = self::DROPDOWN;

    public $items = [];

    /**
     * Section constructor.
     * @param string $title
     * @param string $icon
     * @param bool $new
     * @param int $type
     */
    public function __construct(string $title, string $icon, bool $new = false, int $type = 1)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->new = $new;
        $this->type = $type;
    }

    public static function create( string $title, string $icon = null, bool $new = false, int $type = 1) : Section
    {
        return new Section($title, $icon, $new, $type);
    }

    public function addMenu( Menu $menu) : Section
    {
        $this->items[] = $menu;
        return $this;
    }

    public function addItemMenu( ItemMenu $itemMenu ) : Section
    {
        $this->items[] = $itemMenu;
        return $this;
    }

    public function has_elements() : bool
    {
        return count($this->items) > 0;
    }

    public function is_empty() : bool
    {
        return count($this->items) == 0;
    }

    public function getElements() : array
    {
        return $this->items;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setTitle(?string $title): Section
    {
        $this->title = $title;
        return $this;
    }

    public function setIcon(string $icon): Section
    {
        $this->icon = $icon;
        return $this;
    }

    public function setType(int $type): Section
    {
        $this->type = $type;
        return $this;
    }

}
