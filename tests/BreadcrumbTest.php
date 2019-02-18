<?php
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 18/2/2019
 * Time: 11:43
 */
use Orchestra\Testbench\TestCase;
use Atxy2k\Layout\Breadcrumb\BreadcrumbElement;

class BreadcrumbTest extends TestCase
{
    public function testDefaultConstructor()
    {
        $url = 'admin/dashboard';
        $title = 'Dashboard';
        $active = false;
        $element = new BreadcrumbElement($url, $title);
        $this->assertNotNull($element);
        $this->assertFalse($element->isActive());
        $this->assertEquals($title, $element->getText());
        $this->assertEquals(url($url), $element->getUrl());
    }

    public function testStaticConstructor()
    {
        $url = 'admin/dashboard';
        $title = 'Dashboard';
        $active = false;
        $element = BreadcrumbElement::create($url, $title);
        $this->assertInstanceOf(BreadcrumbElement::class, BreadcrumbElement::create($url, $title));
        $this->assertNotNull($element);
        $this->assertFalse($element->isActive());
        $this->assertEquals($title, $element->getText());
        $this->assertEquals(url($url), $element->getUrl());
    }

    public function testActiveProperty()
    {
        $url = 'admin/dashboard';
        $title = 'Dashboard';
        $active = true;
        $element = BreadcrumbElement::create($url, $title, $active);
        $this->assertInstanceOf(BreadcrumbElement::class, BreadcrumbElement::create($url, $title));
        $this->assertTrue($element->isActive());
    }

}
