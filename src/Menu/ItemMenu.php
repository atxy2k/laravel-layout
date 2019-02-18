<?php namespace Atxy2k\Layout\Menu;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:41
 */
class ItemMenu
{
    public $title   = null;
    public $icon    = null;
    public $extras  = [];
    public $url     = [];

    /**
     * MenuItem constructor.
     * @param string $title Title
     * @param string $icon Icon
     * @param string $url Url
     * @param bool $local If url is in the local system
     * @param array $extras Extra params
     */
    public function __construct(string $title, string $icon, string $url, bool  $local = true, array $extras = [])
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->extras = $extras;
        $this->url = $local ? url($url) : $url;
    }

    /**
     * @param string $title Title
     * @param string $icon Icon
     * @param string $url Url
     * @param bool $local If url is in the local system
     * @param array $extras Extra params
     * @return ItemMenu Current MenuItem instance
     */
    public static function create( string $title, string $icon, string $url, bool  $local = true, array $extras = [] ) : ItemMenu
    {
        return new ItemMenu($title, $icon, $url, $local, $extras);
    }

    public function setTitle( string $title ) : ItemMenu
    {
        $this->title = $title;
        return $this;
    }

    public function setIcon( string $icon) : ItemMenu
    {
        $this->icon = $icon;
        return $this;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setExtras(array  $extras = []) : ItemMenu
    {
        $this->extras = $extras;
        return $this;
    }

    public function getIcon() : ?string
    {
        return $this->icon;
    }

    public function getUrl() : ?string
    {
        return $this->url;
    }

    public function getExtras() : array
    {
        return $this->extras;
    }

}
