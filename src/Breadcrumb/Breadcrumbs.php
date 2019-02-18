<?php namespace Atxy2k\Layout\Breadcrumb;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:50
 */
use Illuminate\Support\Collection;

class Breadcrumbs
{
    /** @var Collection|null */
    protected $elements = null;

    public function __construct()
    {
        $this->elements = new Collection();
    }

    public function push( BreadcrumbElement $element ) : Breadcrumbs
    {
        $this->elements->push($element);
        return $this;
    }

    public function add( BreadcrumbElement $element ) : Breadcrumbs
    {
        return $this->push($element);
    }

    public function addElements(array $elements) : Breadcrumbs {
        foreach ($elements as $element )
        {
            if( $element instanceof BreadcrumbElement )
            {
                $this->add($element);
            }
        }
        return $this;
    }

    public function pushFrom(string $url, string $text, bool $active = false) : Breadcrumbs
    {
        $this->push(BreadcrumbElement::create($url, $text, $active));
        return $this;
    }

    public function addFrom(string $url, string $text, bool $active = false) : Breadcrumbs
    {
        return $this->pushFrom($url, $text, $active);
    }

    public function isEmpty() : bool
    {
        return $this->elements->isEmpty();
    }

    public function isNotEmpty() : bool
    {
        return $this->elements->isNotEmpty();
    }


    /**
     * @return bool
     */
    public function hasElements() : bool {
        return $this->elements->isNotEmpty();
    }

    /**
     * @return Collection
     */
    public function getElements() : Collection
    {
        return $this->elements;
    }
}
