<?php
require_once('./Sample.php');
class SampleTest extends PHPUnit_Framework_TestCase
{
    public function test�n���[���[���h()
    {
        $Sample = new Sample();
        $this->assertEquals($Sample->helloWorld(), 'hello world!');
    }

    /**
     * @test
     */
    public function aaa()
    {
        $Sample = new Sample();
        $this->assertEquals($Sample->helloWorld(), 'aaaaa');
    }
}