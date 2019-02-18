<?php /**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 18/2/2019
 * Time: 11:21
 */
use Atxy2k\Layout\Breadcrumb\QuickAction;
use Atxy2k\Layout\Breadcrumb\QuickActions;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Collection;

class QuickActionsTest extends TestCase
{
    public function testConstructor()
    {
        $quickActions = new QuickActions();
        $this->assertNotNull($quickActions);
        $this->assertInstanceOf(QuickActions::class, $quickActions);
        $this->assertInstanceOf(Collection::class, $quickActions->getElements());
        $this->assertTrue($quickActions->isEmpty());
        $this->assertFalse($quickActions->isNotEmpty());
    }

    public function testAddMethod()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $extras = ['id' => 'btnAdd'];
        $category = null;

        $quickActions = new QuickActions();
        $quickAction = QuickAction::create($url, $title, $icon);
        $this->assertInstanceOf(QuickActions::class, $quickActions->push($quickAction));
        $this->assertTrue($quickActions->isNotEmpty());
        $this->assertFalse($quickActions->isEmpty());
        $this->assertEquals(1, $quickActions->getElements()->count());
    }

    public function testAppendMethod()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $extras = ['id' => 'btnAdd'];
        $category = null;

        $quickActions = new QuickActions();
        $quickAction = QuickAction::create($url, $title, $icon);
        $this->assertInstanceOf(QuickActions::class, $quickActions->append($quickAction));
        $this->assertTrue($quickActions->isNotEmpty());
        $this->assertFalse($quickActions->isEmpty());
        $this->assertEquals(1, $quickActions->getElements()->count());
    }

    public function testPushMethod()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $extras = ['id' => 'btnAdd'];
        $category = null;

        $quickActions = new QuickActions();
        $quickAction = QuickAction::create($url, $title, $icon);
        $this->assertInstanceOf(QuickActions::class, $quickActions->push($quickAction));
        $this->assertTrue($quickActions->isNotEmpty());
        $this->assertFalse($quickActions->isEmpty());
        $this->assertEquals(1, $quickActions->getElements()->count());
    }

    public function testPushFromMethod()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $extras = ['id' => 'btnAdd'];
        $category = null;

        $quickActions = new QuickActions();
        $this->assertInstanceOf(QuickActions::class, $quickActions->pushFrom($url, $title, $icon));
        $this->assertTrue($quickActions->isNotEmpty());
        $this->assertFalse($quickActions->isEmpty());
        $this->assertEquals(1, $quickActions->getElements()->count());
    }

    public function testaddFromMethod()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $extras = ['id' => 'btnAdd'];
        $category = null;

        $quickActions = new QuickActions();
        $this->assertInstanceOf(QuickActions::class, $quickActions->addFrom($url, $title, $icon));
        $this->assertTrue($quickActions->isNotEmpty());
        $this->assertFalse($quickActions->isEmpty());
        $this->assertEquals(1, $quickActions->getElements()->count());
    }


    public function testAddActionsMethodSendItArrayAndReturnQuickActionsObject()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $category = 'category';
        $quickActions = new QuickActions();
        $quickAction = QuickAction::create($url, $title, $icon);
        $_quickAction = QuickAction::create($url, $title, $icon);
        $this->assertInstanceOf(QuickActions::class, $quickActions->addActions([$quickAction, $_quickAction]));
    }

    public function testAddActionsMethodSendItCollectionAndReturnQuickActionsObject()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $category = 'category';
        $quickActions = new QuickActions();
        $quickAction = QuickAction::create($url, $title, $icon);
        $_quickAction = QuickAction::create($url, $title, $icon);
        $this->assertInstanceOf(QuickActions::class, $quickActions->addActions(collect([$quickAction, $_quickAction])));
    }

}
