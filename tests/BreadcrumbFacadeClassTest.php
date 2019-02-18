<?php /**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 18/2/2019
 * Time: 12:27
 */
use Orchestra\Testbench\TestCase;
use Atxy2k\Layout\Breadcrumb\Breadcrumb;
use Atxy2k\Layout\Breadcrumb\QuickActions;
use Atxy2k\Layout\Breadcrumb\Breadcrumbs;
use Illuminate\Support\Collection;
use Atxy2k\Layout\Layout;
use Atxy2k\Layout\Breadcrumb\BreadcrumbElement;
use Atxy2k\Layout\Breadcrumb\QuickAction;
use Atxy2k\Layout\Menu\Section;

class BreadcrumbFacadeClassTest extends TestCase
{
    public function testDefaultConstructor()
    {
        $layout = new Breadcrumb();
        $this->assertNotNull($layout);
        $this->assertNull($layout->getTitle());
        $this->assertNull($layout->getSubtitle());
        $this->assertNull($layout->getIcon());
        $this->assertInstanceOf(QuickActions::class, $layout->getQuickActions());
        $this->assertInstanceOf(Breadcrumbs::class, $layout->getElements());
        $this->assertInstanceOf(Collection::class, $layout->getSections());
        $this->assertTrue($layout->isEnabled());
        $this->assertTrue($layout->isBackEnabled());
        $this->assertEquals(url('/'), $layout->getBack());
        $this->assertEquals('dashboard', $layout->getActiveUrl());
    }

    public function testSetDefaultUrlMethod()
    {
        $layout = new Breadcrumb();
        $this->assertInstanceOf(Breadcrumb::class, $layout->setActiveUrl('dashboard.index'));
        $this->assertEquals('dashboard.index', $layout->getActiveUrl());
    }

    public function testSetBackUrl()
    {
        $layout = new Breadcrumb();
        $this->assertInstanceOf(Breadcrumb::class, $layout->setBack('prueba'));
        $this->assertEquals(url('prueba'), $layout->getBack());
    }

    public function testDisableBack()
    {
        $layout = new Breadcrumb();
        $this->assertInstanceOf(Breadcrumb::class, $layout->disableBack());
        $this->assertFalse($layout->isBackEnabled());
    }

    public function testDisable()
    {
        $layout = new Breadcrumb();
        $this->assertInstanceOf(Breadcrumb::class, $layout->disabled());
        $this->assertFalse($layout->isEnabled());
    }

    public function testSetTitleAndSubtitleMethods()
    {
        $title = 'Title 1';
        $subtitle = 'Subtitle 1';
        $icon = 'fa fa-home';
        $layout = new Breadcrumb();
        $this->assertFalse($layout->hasIcon());
        $this->assertInstanceOf(Breadcrumb::class, $layout->setTitle($title));
        $this->assertInstanceOf(Breadcrumb::class, $layout->setSubtitle($subtitle));
        $this->assertInstanceOf(Breadcrumb::class, $layout->setIcon($icon));
        $this->assertEquals($title, $layout->getTitle());
        $this->assertEquals($subtitle, $layout->getSubtitle());
        $this->assertEquals($icon, $layout->getIcon());
        $this->assertTrue($layout->hasIcon());
    }

    public function testAddBreadcrumbElementMethodAndHasElementReturnTrue()
    {
        $layout = new Layout();
        $this->assertInstanceOf(Layout::class, $layout->addBreadcrumbElement(BreadcrumbElement::create('dashboard', 'Home')));
        $this->assertTrue($layout->hasElements());
        $this->equalTo(1, $layout->getElements()->getElements()->count());
        $this->assertFalse($layout->hasActions());
        $this->equalTo(0, $layout->getQuickActions()->getElements()->count());
    }

    public function testAddBreadcrumbElements()
    {
        $layout = new Layout();
        $data = [
            BreadcrumbElement::create('dashboard', 'Home'),
            BreadcrumbElement::create('admin', 'Admin'),
            BreadcrumbElement::create('reports', 'Reports')
        ];
        $this->assertInstanceOf(Layout::class, $layout->addBreadcrumbElements($data));
        $this->assertTrue($layout->hasElements());
        $this->equalTo(3, $layout->getElements()->getElements()->count());
    }

    public function testAddActionMethod()
    {
        $layout = new Layout();
        $action = QuickAction::create('dashboard', 'title', 'fa fa-icon');
        $this->assertInstanceOf(Breadcrumb::class, $layout->addAction($action));
        $this->assertInstanceOf(Breadcrumb::class, $layout->addAction('dashboard', 'title', 'fa fa-icon'));
        $this->assertTrue($layout->hasActions());
        $this->assertEquals(2, $layout->getQuickActions()->getElements()->count());
        $this->assertEquals(2, $layout->getActions()->count());
    }

    public function testSectionsWorks()
    {
        $layout = new Layout();
        $this->assertFalse($layout->hasSections());
        $this->assertEquals(0, $layout->getSections()->count());
        $this->assertTrue($layout->isSectionsEmpty());
        $section = Section::create('test', 'fa fa-icon');
        $_section = Section::create('test-2', 'fa fa-icon');
        $this->assertInstanceOf(Layout::class, $layout->addSection($section));
        $this->assertInstanceOf(Layout::class, $layout->pushSection($_section));
        $this->assertTrue($layout->hasSections());
        $this->assertEquals(2, $layout->getSections()->count());
        $this->assertFalse($layout->isSectionsEmpty());

    }

}
