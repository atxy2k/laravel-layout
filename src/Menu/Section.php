<?php namespace Atxy2k\Layout\Menu;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:41
 */
use Illuminate\Support\Collection;

class Section
{
    const DROPDOWN = 1;
    const MEGAMENU = 2;

    public $title = null;
    public $icon  = null;
    public $new = false;
    public $type = self::DROPDOWN;

    /** @var Collection */
    public $items = null;

    /**
     * Section constructor.
     * @param string $title
     * @param string $icon
     * @param bool $new
     * @param int $type
     */
    public function __construct(string $title, string $icon, bool $new = false, int $type = self::DROPDOWN)
    {
        $this->items = new Collection;
        $this->title = $title;
        $this->icon = $icon;
        $this->new = $new;
        $this->type = $type;
    }

    /**
     * @param string $title
     * @param string|null $icon
     * @param bool $new
     * @param int $type
     * @return Section
     */
    public static function create( string $title, string $icon = null, bool $new = false, int $type = 1) : Section
    {
        return new Section($title, $icon, $new, $type);
    }

    /**
     * @param ItemMenu|Menu $object
     * @return Section
     */
    public function add($object) : Section
    {
        if($object instanceof Menu || $object instanceof  ItemMenu)
            $this->items->push($object);
        return $this;
    }

    /**
     * @param Menu $menu
     * @return Section
     */
    public function addMenu( Menu $menu) : Section
    {
        $this->items->push($menu);
        return $this;
    }

    /**
     * @param ItemMenu $itemMenu
     * @return Section
     */
    public function addItemMenu( ItemMenu $itemMenu ) : Section
    {
        $this->items->push($itemMenu);
        return $this;
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

    /**
     * @param string|null $title
     * @return Section
     */
    public function setTitle(?string $title): Section
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $icon
     * @return Section
     */
    public function setIcon(string $icon): Section
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param int $type
     * @return Section
     */
    public function setType(int $type): Section
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getType() : int
    {
        return $this->type;
    }
    /**
     * @return bool
     */
    public function getNew() : bool
    {
        return $this->new;
    }
}
