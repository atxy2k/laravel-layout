<?php /**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 18/2/2019
 * Time: 09:30
 */
use Atxy2k\Layout\Menu\Menu;
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Collection;
use Atxy2k\Layout\Menu\ItemMenu;

class MenuTest extends TestCase
{
    public function testDefaultConstructor()
    {
        $title = 'Reports';
        $icon = 'fa fa-graphs';
        $menu = new Menu($title, $icon);
        $this->assertInstanceOf(Menu::class, $menu);
        $this->assertEquals($title,$menu->getTitle());
        $this->assertEquals($icon, $menu->getIcon());
        $this->assertInstanceOf(Collection::class, $menu->items());
        $this->assertInstanceOf(Collection::class, $menu->getElements());
        $this->assertFalse($menu->hasElements());
        $this->assertTrue($menu->isEmpty());
        $this->assertFalse($menu->isNotEmpty());
    }

    public function testStaticConstructor()
    {
        $title = 'Reports';
        $icon = 'fa fa-graphs';
        $menu = Menu::create($title, $icon);
        $this->assertInstanceOf(Menu::class, $menu);
        $this->assertEquals($title,$menu->getTitle());
        $this->assertEquals($icon, $menu->getIcon());
        $this->assertInstanceOf(Collection::class, $menu->items());
        $this->assertInstanceOf(Collection::class, $menu->getElements());
        $this->assertFalse($menu->hasElements());
        $this->assertTrue($menu->isEmpty());
        $this->assertFalse($menu->isNotEmpty());
    }

    public function testAddItemMethod()
    {
        $title = 'Reports';
        $icon = 'fa fa-graphs';
        $menu = Menu::create($title, $icon);
        $itemMenu =  ItemMenu::create('horas extras', 'fa fa-clock', 'reports/horas-extra' );
        $this->assertInstanceOf(Menu::class, $menu->addItem($itemMenu));
        $this->assertInstanceOf(Menu::class, $menu);
        $this->assertEquals($title,$menu->getTitle());
        $this->assertEquals($icon, $menu->getIcon());
        $this->assertInstanceOf(Collection::class, $menu->items());
        $this->assertInstanceOf(Collection::class, $menu->getElements());
        $this->assertTrue($menu->hasElements());
        $this->assertFalse($menu->isEmpty());
        $this->assertTrue($menu->isNotEmpty());
    }

    public function testAddMethod()
    {
        $title = 'Reports';
        $icon = 'fa fa-graphs';
        $menu = Menu::create($title, $icon);
        $itemMenu =  ItemMenu::create('horas extras', 'fa fa-clock', 'reports/horas-extra' );
        $this->assertInstanceOf(Menu::class, $menu->add($itemMenu));
        $this->assertInstanceOf(Menu::class, $menu);
        $this->assertEquals($title,$menu->getTitle());
        $this->assertEquals($icon, $menu->getIcon());
        $this->assertInstanceOf(Collection::class, $menu->items());
        $this->assertInstanceOf(Collection::class, $menu->getElements());
        $this->assertTrue($menu->hasElements());
        $this->assertFalse($menu->isEmpty());
        $this->assertTrue($menu->isNotEmpty());
    }

    public function testPushMethod()
    {
        $title = 'Reports';
        $icon = 'fa fa-graphs';
        $menu = Menu::create($title, $icon);
        $itemMenu =  ItemMenu::create('horas extras', 'fa fa-clock', 'reports/horas-extra' );
        $this->assertInstanceOf(Menu::class, $menu->push($itemMenu));
        $this->assertInstanceOf(Menu::class, $menu);
        $this->assertEquals($title,$menu->getTitle());
        $this->assertEquals($icon, $menu->getIcon());
        $this->assertInstanceOf(Collection::class, $menu->items());
        $this->assertInstanceOf(Collection::class, $menu->getElements());
        $this->assertTrue($menu->hasElements());
        $this->assertFalse($menu->isEmpty());
        $this->assertTrue($menu->isNotEmpty());
    }

    public function testPushItemMethod()
    {
        $title = 'Reports';
        $icon = 'fa fa-graphs';
        $menu = Menu::create($title, $icon);
        $itemMenu =  ItemMenu::create('horas extras', 'fa fa-clock', 'reports/horas-extra' );
        $this->assertInstanceOf(Menu::class, $menu->pushItem($itemMenu));
        $this->assertInstanceOf(Menu::class, $menu);
        $this->assertEquals($title,$menu->getTitle());
        $this->assertEquals($icon, $menu->getIcon());
        $this->assertInstanceOf(Collection::class, $menu->items());
        $this->assertInstanceOf(Collection::class, $menu->getElements());
        $this->assertTrue($menu->hasElements());
        $this->assertFalse($menu->isEmpty());
        $this->assertTrue($menu->isNotEmpty());
    }

}
