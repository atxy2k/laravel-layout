<?php namespace Atxy2k\Layout\Breadcrumb;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:46
 */
class QuickAction
{
    public $url = null;
    public $title = null;
    public $icon = null;
    public $extras = [];
    public $local = true;
    public $category = null;
    /**
     * QuickAction constructor.
     * @param string $url
     * @param string $title
     * @param string $icon
     * @param string|null $category
     * @param array $extras
     * @param bool $isLocalUrl
     */
    public function __construct(string $url, string $title, string $icon, array $extras = [], string $category = null, $isLocalUrl = true)
    {
        $this->url = $isLocalUrl ? url($url) : $url;
        $this->title = $title;
        $this->icon = $icon;
        $this->extras = $extras;
        $this->local = $isLocalUrl;
        $this->category = $category;
    }

    /**
     * @param string $url
     * @param string $title
     * @param string $icon
     * @param array $extras
     * @param string|null $category
     * @param bool $local
     * @return QuickAction
     */
    public static function create( string $url, string $title,string $icon, array $extras = [], string $category = null, $local = true ) : QuickAction
    {
        return new QuickAction($url, $title,$icon, $extras, $category, $local);
    }

    /**
     * @return bool
     */
    public function hasIcon() : bool
    {
        return !is_null($this->icon);
    }

    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return array
     */
    public function getExtras(): array
    {
        return $this->extras;
    }

    /**
     * @return bool
     */
    public function isLocal(): bool
    {
        return $this->local;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }



}
