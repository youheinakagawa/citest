<?php
require_once 'vendor/autoload.php';
require_once('./Sample.php');

use Facebook\WebDriver;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\Remote;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;


class SampleTest extends PHPUnit_Framework_TestCase
{
    public function testハローワールド()
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
        $this->assertEquals($Sample->helloWorld(), 'hello world!');
    }


    public function testWebUI()
    {

        //準備 --------------------------------------------------------

        //（java -jar java -jar selenium-server-standalone-2.48.2.jar済である必要あり）
        $host = 'http://localhost:4444/wd/hub';
        //chromedriverを指定（chromedriverをダウンロードして/user/local/bin等に入れておく。
        $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

        // //テストするサイトに移動
        $driver->get('http://localhost/sample-page.php');

        //最後の要素が読み込まれるまで待つ(sec,millisec)
        //とにかく待つならsleep(3)とかでも可？（未確認）
        $driver->wait(10,500)->until(
            //WebDriverExpectedCondition::titleIs('top')
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('#btn'))
        );

        //Form制御 -----------------------------------------------------

        //text:name選択
        $driver->findElement(WebDriverBy::cssSelector('#name'))->click();
        //入力
        $driver->getKeyboard()->sendKeys("hoge");

        //text:email選択
        $driver->findElement(WebDriverBy::cssSelector('#email'))->click();
        //入力
        $driver->getKeyboard()->sendKeys("hoge@hoge.com");

        //radio（clickだけでよい）
        $driver->findElement(WebDriverBy::cssSelector('#gender2'))->click();

        //checkbox（clickだけでよい）
        $driver->findElement(WebDriverBy::cssSelector('#media1'))->click();

        //select
        $driver->findElement(WebDriverBy::cssSelector('#area'))->click();
        //選択（sendKeyでよい）
        $driver->getKeyboard()->sendKeys("関西");

        //textarea
        $driver->findElement(WebDriverBy::cssSelector('#note'))->click();
        //入力
        $driver->getKeyboard()->sendKeys("何もありません。");

        //submit click
        $driver->findElement(WebDriverBy::cssSelector('#btn'))->click();

        //confirm ok
        $driver->switchTo()->alert()->accept();

        //confirm cancel
        // $driver->switchTo()->alert()->dismiss();

        //ページ移動 ======

        //移動先で要素取得
        $email = $driver->findElement(WebDriverBy::cssSelector('#email2'))->getText();

        //assert ------------------------------------------------------

        //評価
        $this->assertEquals("hoge@hoge.com",$email);
        $this->assertRegExp('/^h.+@.+com$/',$email);

        //ブラウザを閉じる
        $driver->close();
    }
}
