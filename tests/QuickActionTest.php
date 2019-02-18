<?php
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 18/2/2019
 * Time: 10:35
 */
use Atxy2k\Layout\Breadcrumb\QuickAction;
use Orchestra\Testbench\TestCase;

class QuickActionTest extends TestCase
{

    public function testDefaultConstructor()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $quickAction = new QuickAction($url, $title, $icon);
        $this->assertNotNull($quickAction);
        $this->assertEquals(url($url), $quickAction->getUrl());
        $this->assertEquals($title, $quickAction->getTitle());
        $this->assertTrue($quickAction->local);
        $this->assertNull($quickAction->category);
        $this->assertTrue(is_array($quickAction->extras));
    }

    public function testStaticConstructor()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $quickAction = QuickAction::create($url, $title, $icon);
        $this->assertNotNull($quickAction);
        $this->assertEquals(url($url), $quickAction->getUrl());
        $this->assertEquals($title, $quickAction->getTitle());
        $this->assertTrue($quickAction->local);
        $this->assertNull($quickAction->category);
        $this->assertNull($quickAction->getCategory());
        $this->assertTrue(is_array($quickAction->extras));
        $this->assertTrue($quickAction->hasIcon());
        $this->assertTrue($quickAction->isLocal());
    }

    public function testExtrasConstructor()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $extras = ['id' => 'btnAdd'];
        $quickAction = QuickAction::create($url, $title, $icon, $extras);
        $this->assertIsArray($quickAction->getExtras());
        $this->assertEquals($extras, $quickAction->getExtras());
    }

    public function testCategoryConstructor()
    {
        $url = 'admin/dashboard';
        $title = 'add';
        $icon = 'fa fa-plus';
        $extras = ['id' => 'btnAdd'];
        $category = 'sidebar';
        $quickAction = QuickAction::create($url, $title, $icon, $extras, $category);
        $this->assertIsArray($quickAction->getExtras());
        $this->assertEquals($extras, $quickAction->getExtras());
        $this->assertNotNull($quickAction->getCategory());
        $this->assertEquals($category, $quickAction->getCategory());
    }

}
