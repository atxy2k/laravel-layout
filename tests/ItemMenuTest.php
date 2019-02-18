<?php /**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 17/2/2019
 * Time: 22:58
 */
use Orchestra\Testbench\TestCase;
use Atxy2k\Layout\Menu\ItemMenu;

class ItemMenuTest extends TestCase
{
    public function testItemMenuInstanceAndBasicResponses()
    {
        $itemMenu = new ItemMenu('home', 'fa-icon', 'admin/dashboard' );
        $this->assertEquals('home', $itemMenu->getTitle());
        $this->assertEquals('fa-icon', $itemMenu->getIcon());
        $this->assertEquals(url('admin/dashboard'), $itemMenu->getUrl());
        $this->assertIsArray($itemMenu->getExtras());
        $this->assertTrue(empty($itemMenu->getExtras()));
        $this->assertInstanceOf(ItemMenu::class, $itemMenu->setTitle('home2'));
        $this->assertEquals($itemMenu->getTitle(), 'home2');
        $this->assertInstanceOf(ItemMenu::class, $itemMenu->setIcon('fa-icon2'));
        $this->assertEquals($itemMenu->getIcon(), 'fa-icon2');
        $this->assertInstanceOf(ItemMenu::class, $itemMenu->setExtras(['id' => 'btnAdd']));
        $this->assertEquals($itemMenu->getExtras(), ['id' => 'btnAdd']);
    }

    public function testItemMenuStaticConstructor()
    {
        $itemMenu = ItemMenu::create('home', 'fa-icon', 'admin/dashboard');
        $this->assertEquals('home', $itemMenu->getTitle());
        $this->assertEquals('fa-icon', $itemMenu->getIcon());
        $this->assertEquals(url('admin/dashboard'), $itemMenu->getUrl());
        $this->assertIsArray($itemMenu->getExtras());
        $this->assertTrue(empty($itemMenu->getExtras()));
    }

    public function testItemMenuLocalUrlInConstructor()
    {
        $itemMenu = ItemMenu::create('home', 'fa-icon', 'admin/dashboard', false);
        $this->assertEquals('admin/dashboard', $itemMenu->getUrl());
        $this->assertIsArray($itemMenu->getExtras());
        $this->assertTrue(empty($itemMenu->getExtras()));
    }

}
