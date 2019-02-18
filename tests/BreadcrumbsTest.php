<?php /**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 18/2/2019
 * Time: 11:52
 */
use Orchestra\Testbench\TestCase;
use Atxy2k\Layout\Breadcrumb\Breadcrumbs;
use Atxy2k\Layout\Breadcrumb\BreadcrumbElement;

class BreadcrumbsTest extends TestCase
{
    public function testDefaultConstructor()
    {
        $breadcrumbs = new Breadcrumbs();
        $this->assertNotNull($breadcrumbs);
        $this->assertTrue($breadcrumbs->isEmpty());
        $this->assertFalse($breadcrumbs->isNotEmpty());
        $this->assertEmpty($breadcrumbs->getElements());
    }

    public function testPushMethod()
    {
        $url = 'admin/dashboard';
        $title = 'Dashboard';

        $breadcrumbs = new Breadcrumbs();
        $this->assertInstanceOf(Breadcrumbs::class, $breadcrumbs->push(BreadcrumbElement::create($url, $title)));
        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertFalse($breadcrumbs->isEmpty());
    }

    public function testAddMethod()
    {
        $url = 'admin/dashboard';
        $title = 'Dashboard';

        $breadcrumbs = new Breadcrumbs();
        $this->assertInstanceOf(Breadcrumbs::class, $breadcrumbs->add(BreadcrumbElement::create($url, $title)));
        $this->assertTrue($breadcrumbs->hasElements());
        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertFalse($breadcrumbs->isEmpty());
    }

    public function testAddElementsMethod()
    {
        $url = 'admin/dashboard';
        $title = 'Dashboard';

        $breadcrumbs = new Breadcrumbs();
        $this->assertInstanceOf(Breadcrumbs::class, $breadcrumbs->addElements([
            BreadcrumbElement::create($url, $title),
            BreadcrumbElement::create($url, $title)
        ]));
        $this->assertTrue($breadcrumbs->hasElements());
        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertFalse($breadcrumbs->isEmpty());
    }

    public function testPushFromMethod()
    {
        $url = 'admin/dashboard';
        $title = 'Dashboard';

        $breadcrumbs = new Breadcrumbs();
        $this->assertInstanceOf(Breadcrumbs::class, $breadcrumbs->pushFrom($url, $title));
        $this->assertTrue($breadcrumbs->hasElements());
        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertFalse($breadcrumbs->isEmpty());
    }

    public function testAddFromMethod()
    {
        $url = 'admin/dashboard';
        $title = 'Dashboard';

        $breadcrumbs = new Breadcrumbs();
        $this->assertInstanceOf(Breadcrumbs::class, $breadcrumbs->addFrom($url, $title));
        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertFalse($breadcrumbs->isEmpty());
    }


}
