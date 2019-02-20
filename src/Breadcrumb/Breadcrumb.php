<?php namespace Atxy2k\Layout\Breadcrumb;
use Atxy2k\Layout\Menu\Section;
use Illuminate\Support\Collection;

/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 15/2/2019
 * Time: 21:51
 */
class Breadcrumb
{
    /** @var string|null  */
    protected $title    = null;
    /** @var string|null  */
    protected $subtitle = null;
    /** @var string|null  */
    protected $icon = null;
    /** @var QuickActions */
    protected $quickActions = null;
    /** @var Breadcrumbs  */
    protected $breadcrumbs = null;
    /** @var string|null */
    protected $cover = null;
    /**
     * Menu sections
     * @var Collection
     */
    protected $sections = null;

    /**
     * Is the breadcrumb enabled?
     * @var bool
     */
    protected $enabled  = true;
    /**
     * Can do you use a back button?
     * @var bool
     */
    protected $backEnabled = true;

    /**
     * Back url
     * @var string
     */
    protected $back     = '/';
    /**
     * Do you need a string url to identify current action in the menu is active?
     * @var string
     */
    protected $activeUrl = 'dashboard';


    public function __construct()
    {
        $this->back = url('/');
        $this->quickActions = new QuickActions();
        $this->breadcrumbs = new Breadcrumbs();
        $this->sections = new Collection();
    }

    /**
     * @param $activeUrl
     * @return Breadcrumb
     */
    public function setActiveUrl($activeUrl ) : Breadcrumb
    {
        $this->activeUrl = $activeUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getActiveUrl() : ?string
    {
        return $this->activeUrl;
    }

    /**
     * Set back url for the next page
     * @param $url
     * @return Breadcrumb
     */
    public function setBack($url) : Breadcrumb
    {
        $this->back = url($url);
        return $this;
    }

    /**
     * Get the back url
     * @return string
     */
    public function getBack() : ?string
    {
        return $this->back;
    }

    /**
     * @return Breadcrumb
     */
    public function disableBack() : Breadcrumb
    {
        $this->backEnabled = false;
        return $this;
    }

    /**
     * @return Breadcrumb
     */
    public function disabled() : Breadcrumb
    {
        $this->enabled = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isBackEnabled() : bool
    {
        return $this->backEnabled;
    }

    /**
     * @return bool
     */
    public function isEnabled() : bool
    {
        return $this->enabled;
    }

    /**
     * @param $string
     * @return Breadcrumb
     */
    public function setTitle($string) : Breadcrumb
    {
        $this->title = $string;
        return $this;
    }
    /**
     * @param $string
     * @return Breadcrumb
     */
    public function setSubtitle($string) : Breadcrumb
    {
        $this->subtitle = $string;
        return $this;
    }

    /**
     * Get the page's title
     * @return string
     */
    public function getTitle() : ?string
    {
        return $this->title;
    }

    /**
     * Get the page's subtitle
     * @return string
     */
    public function getSubtitle() : ?string
    {
        return $this->subtitle;
    }

    /**
     * Get if the breadcrumb has elements send it.
     * @return bool
     */
    public function hasElements() : bool
    {
        return $this->breadcrumbs->hasElements();
    }

    /**
     * Return if actions or category action is empty
     * @param string|null $category
     * @return bool
     */
    public function hasActions(string $category = null) : bool
    {
        return $this->quickActions->isNotEmpty($category);
    }

    /**
     * Return breadcrumbs elements.
     * @return Breadcrumbs
     */
    public function getElements() : Breadcrumbs
    {
        return $this->breadcrumbs;
    }

    /**
     * Return QuickActions Object
     * @return QuickActions
     */
    public function getQuickActions() : QuickActions
    {
        return $this->quickActions;
    }

    /**
     * Add a breadcrumb element from all params or BreadcrumbElement object
     * Local url
     * @param string|BreadcrumbElement
     * Item text
     * @param string
     * Is active
     * @param bool
     * return Breadcrumb instance
     * @return Breadcrumb
     */
    public function addBreadcrumbElement( $localUrlOrBreadcrumbElement, string $text = null, $active = false) : Breadcrumb
    {
        if($localUrlOrBreadcrumbElement instanceof BreadcrumbElement)
            $this->breadcrumbs->push($localUrlOrBreadcrumbElement);
        else
            $this->breadcrumbs->push(BreadcrumbElement::create($localUrlOrBreadcrumbElement, $text, $active));
        return $this;
    }

    /**
     * Add a list of breadcrumb elements objects
     * @param array $elements
     * @return Breadcrumb
     */
    public function addBreadcrumbElements( array $elements ) : Breadcrumb
    {
        foreach ( $elements as $element )
        {
            if( $element instanceof BreadcrumbElement)
            {
                $this->breadcrumbs->add($element);
            }
        }
        return $this;
    }

    /**
     * Add a QuickAction object or yuu can send all params to create it
     * Local url or QuickAction object
     * @param string|QuickAction
     * Text
     * @param string $text
     * Icon
     * @param string $icon
     * Extra params
     * @param array $extras
     * Default category for the action
     * @param string $category
     * Is url local
     * @param bool $local
     * This breadcrumb instance
     * @return Breadcrumb
     */
    public function addAction($localUrlOrQuickAction, string $text = null, string $icon = null, array $extras = [], string $category = null, bool $local = true) : Breadcrumb
    {
        if($localUrlOrQuickAction instanceof QuickAction)
            $this->quickActions->add($localUrlOrQuickAction);
        else
            $this->quickActions->push(QuickAction::create(
                $localUrlOrQuickAction, $text, $icon, $extras, $category, $local
            ));
        return $this;
    }

    /**
     * Return all actions or categorized actions
     * @param string|null $category
     * @return Collection
     */
    public function getActions(string $category = null) : Collection
    {
        return $this->quickActions->getElements($category);
    }

    /**
     * Return if current menu has sections to print
     * @return bool
     */
    public function hasSections() : bool
    {
        return $this->sections->isNotEmpty();
    }

    /**
     * Return current menu's sections
     * @return Collection
     */
    public function getSections() : Collection
    {
        return $this->sections;
    }

    /**
     * @return bool
     */
    public function isSectionsEmpty() : bool
    {
        return $this->sections->isEmpty();
    }

    /**
     * Add section to menu
     * @param Section $section
     * @return Breadcrumb
     */
    public function addSection( Section $section ) : Breadcrumb
    {
        $this->sections->push($section);
        return $this;
    }

    /**
     * Add section to menu
     * @param Section $section
     * @return Breadcrumb
     */
    public function pushSection(Section $section) : Breadcrumb
    {
        return $this->addSection($section);
    }

    /**
     * Return current global action
     * @return string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * Set global icon
     * @param string $icon
     * @return Breadcrumb
     */
    public function setIcon(string $icon): Breadcrumb
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Return if the object has set a global icon
     * @return bool
     */
    public function hasIcon()
    {
        return !empty($this->icon);
    }

    /**
     * @return string|null
     */
    public function getCover(): ?string
    {
        return $this->cover;
    }

    /**
     * @param string|null $cover
     */
    public function setCover(string $cover): void
    {
        $this->cover = asset($cover);
    }

    /**
     * @return bool
     */
    public function hasCover() : bool
    {
        return !is_null($this->cover);
    }

}
