<?php
/**
 * Test helper
 */
require_once dirname(__FILE__) . '/bootstrap.php';


class xBoilerplateTest extends PHPUnit_Framework_TestCase
{
    public function setUp() {
    }

    public function tearDown() {
        PrivateTestXBoilerplate::resetInstance();
    }

    public function testConstruct() {
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/test');
        $this->assertInstanceOf('xBoilerplate', $xBoilerplate);
    }

    public function testGetConfig() {
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/');
        $this->assertTrue($xBoilerplate->getConfig()->dev);
        $this->assertFalse($xBoilerplate->getConfig()->raw);
    }

    public function testRaw() {
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/ajax/test');
        $this->assertEquals('Ajax Test', $xBoilerplate->render());
        $this->assertTrue($xBoilerplate->getConfig()->raw);
    }

    /**
     * @depends testRaw
     */
    public function testRawUniqueCall() {
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/ajax/count');
        $xBoilerplate->counter = 0;
        $this->assertEquals($xBoilerplate->counter+1, $xBoilerplate->render());
    }

    /**
     * @depends testRaw
     */
    public function testGetActivePage(){
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/ajax/test');
        $this->assertEquals('active',$xBoilerplate->getActive('/'.$xBoilerplate->_page) );
    }

    public function testGetPath_NoVersion(){
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/');
        $xBoilerplate->getConfig()->version = '0';
        $this->assertEquals('/img/',$xBoilerplate->img());
        $this->assertEquals('/css/',$xBoilerplate->css());
        $this->assertEquals('/js/',$xBoilerplate->js());
    }

    /**
     * @depends testGetPath_NoVersion
     */
    public function testGetPathWithVersion(){
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/');
        $xBoilerplate->getConfig()->version = '1';
        $this->assertEquals('/img/1/',$xBoilerplate->img());
        $this->assertEquals('/css/1/',$xBoilerplate->css());
        $this->assertEquals('/js/1/',$xBoilerplate->js());
    }


    public function testLoadComponent(){
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/');
        $this->assertContains("This is a component",$xBoilerplate->loadComponent("test"));
    }

    public function testLoadLayout() {
        $layout = 'Gargle Blaster Test';
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/');
        $this->assertEquals($layout, $xBoilerplate->loadLayout('test.php'));
    }

    public function testLoadCss() {
        $expectedCss = '#test {background-color: red;}';
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/');
        $this->assertEquals($expectedCss, $xBoilerplate->loadCss('test.css'));
    }

    public function testLoadPageCss()
    {
        $expectedCss = '<link type="text/css" rel="stylesheet" href="/css/page/about/xodoa.css">';
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/about/xodoa');
        $xBoilerplate->getConfig()->version = '0';
        $this->assertEquals($expectedCss, $xBoilerplate->loadPageCss());
    }

    public function testLoadPageJs()
    {
        $expectedCss = '<script src="/js/page/about/xodoa.js"></script>';
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/about/xodoa');
        $xBoilerplate->getConfig()->version = '0';
        $this->assertEquals($expectedCss, $xBoilerplate->loadPageJs());
    }

    public function testLoadPageCssWithVersion()
    {
        $expectedCss = '<link type="text/css" rel="stylesheet" href="/css/1/page/about/xodoa.css">';
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/about/xodoa');
        $xBoilerplate->getConfig()->version = '1';
        $this->assertEquals($expectedCss, $xBoilerplate->loadPageCss());
    }

    public function testLoadPageJsWithVersion()
    {
        $expectedCss = '<script src="/js/1/page/about/xodoa.js"></script>';
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/about/xodoa');
        $xBoilerplate->getConfig()->version = '1';
        $this->assertEquals($expectedCss, $xBoilerplate->loadPageJs());
    }

    public function testLoadJs() {
        $js = 'alert(\'Zaphod Beeblebrox in js!\');';
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/');
        $this->assertEquals($js, $xBoilerplate->loadJs('test.js'));
    }

    public function testLoadMenu() {
        $menu = 'Gargle Blaster';
        $xBoilerplate = xBoilerplate::getInstance()->pagestart('/');
        $this->assertEquals($menu, $xBoilerplate->loadMenu('test'));
    }



}

/**
 * Simple class that provides a method to reset the singleton to it's an un-instantiated state.
 *
 *
 * @author Oliver Tupman <oliver.tupman@centralway.com>
 * Date: 31/05/2012
 * Time: 11:57
 */
class PrivateTestXBoilerplate extends xBoilerplate
{
    public static function resetInstance() {
        self::$_instance = null;
    }
}
