<?php /**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 18/2/2019
 * Time: 08:57
 */
use Orchestra\Testbench\TestCase;
use Atxy2k\Layout\Menu\Section;
use Atxy2k\Layout\Menu\Menu;
use Atxy2k\Layout\Menu\ItemMenu;

class SectionsTest extends TestCase
{
    public function testSectionConstructor()
    {
        $title = 'Inventario';
        $icon = 'fa fa-home';
        $section = new Section($title, $icon);
        $this->assertInstanceOf(Section::class, $section);
        $this->assertEquals($title, $section->getTitle());
        $this->assertEquals($icon, $section->getIcon());
        $this->assertFalse($section->getNew());
        $this->assertEquals(Section::DROPDOWN, $section->getType());
        $this->assertTrue($section->isEmpty());
    }

    public function testSectionConstructorWithNewTrueReturnTrue()
    {
        $title = 'Inventario';
        $icon = 'fa fa-home';
        $markedAsNew = true;
        $section = new Section($title, $icon, $markedAsNew);
        $this->assertInstanceOf(Section::class, $section);
        $this->assertEquals($title, $section->getTitle());
        $this->assertEquals($icon, $section->getIcon());
        $this->assertTrue($section->getNew());
        $this->assertEquals(Section::DROPDOWN, $section->getType());
        $this->assertTrue($section->isEmpty());
    }

    public function testSectionConstructorMegaMenuReturnTrue()
    {
        $title = 'Inventario';
        $icon = 'fa fa-home';
        $markedAsNew = true;
        $type = Section::MEGAMENU;
        $section = new Section($title, $icon, $markedAsNew, $type);
        $this->assertInstanceOf(Section::class, $section);
        $this->assertEquals($title, $section->getTitle());
        $this->assertEquals($icon, $section->getIcon());
        $this->assertTrue($section->getNew());
        $this->assertEquals(Section::MEGAMENU, $section->getType());
        $this->assertTrue($section->isEmpty());
    }

    public function testSectionStaticConstructor()
    {
        $title = 'Inventario';
        $icon = 'fa fa-home';
        $markedAsNew = true;
        $type = Section::MEGAMENU;
        $section = Section::create($title, $icon, $markedAsNew, $type);
        $this->assertInstanceOf(Section::class, $section);
        $this->assertEquals($title, $section->getTitle());
        $this->assertEquals($icon, $section->getIcon());
        $this->assertTrue($section->getNew());
        $this->assertEquals(Section::MEGAMENU, $section->getType());
        $this->assertTrue($section->isEmpty());
        $this->assertFalse($section->isNotEmpty());
    }

    public function testAddMenuMethodResponseTheSameSection()
    {
        $title = 'Inventario';
        $icon = 'fa fa-home';
        $markedAsNew = true;
        $type = Section::MEGAMENU;
        $section = Section::create($title, $icon, $markedAsNew, $type);
        $menu = Menu::create('inventario', 'fa fa-box');
        $this->assertInstanceOf(Section::class, $section->addMenu($menu));
        $this->assertInstanceOf(Section::class, $section->add($menu));
        $this->assertFalse($section->isEmpty());
        $this->assertTrue($section->isNotEmpty());
    }

    public function testAddItemMenuMethodResponseTheSameSection()
    {
        $title = 'Inventario';
        $icon = 'fa fa-home';
        $markedAsNew = true;
        $type = Section::MEGAMENU;
        $section = Section::create($title, $icon, $markedAsNew, $type);
        $itemMenu = ItemMenu::create('inventario', 'fa fa-box', 'admin/dashboard');
        $this->assertInstanceOf(Section::class, $section->addItemMenu($itemMenu));
        $this->assertInstanceOf(Section::class, $section->add($itemMenu));
        $this->assertFalse($section->isEmpty());
        $this->assertTrue($section->isNotEmpty());
    }

}
