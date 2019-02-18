<?php namespace Atxy2k\Layout\Breadcrumb;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:50
 */
class BreadcrumbElement
{
    protected $url = null;
    protected $text = null;
    protected $active = false;

    /**
     * BreadcrumbElement constructor.
     * @param string $url
     * @param string $text
     * @param bool $active
     */
    public function __construct(string $url, string $text, bool $active = false)
    {
        $this->url = url($url);
        $this->text = $text;
        $this->active = $active;
    }

    public static function create( string $url, string $text, bool $active = false) : BreadcrumbElement
    {
        return new BreadcrumbElement($url, $text, $active);
    }

    /**
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $url
     * @return BreadcrumbElement
     */
    public function setUrl($url): BreadcrumbElement
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     * @return BreadcrumbElement
     */
    public function setText(?string $text): BreadcrumbElement
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return BreadcrumbElement
     */
    public function setActive(bool $active): BreadcrumbElement
    {
        $this->active = $active;
        return $this;
    }

}
