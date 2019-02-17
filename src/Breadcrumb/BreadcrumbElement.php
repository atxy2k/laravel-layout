<?php namespace Atxy2k\Layout\Breadcrumb;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:50
 */
class BreadcrumbElement
{
    public $url = null;
    public $text = null;
    public $active = false;

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

}
