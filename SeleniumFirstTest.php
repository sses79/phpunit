<?php

class SeleniumFirstTest extends PHPUnit_Extensions_Selenium2TestCase
{
	/**
	* Setup
	*/
	public function setUp()
	{
		$this->setBrowser('chrome');
		$this->setHost('127.0.0.1');
		$this->setPort(4444);
		// $this->setBrowserUrl('https://phpunit.de');
		$this->setBrowserUrl('https://www.google.co.uk/');
	}
	
	public function testByLinkText()
	{
		$this->timeouts()->implicitWait(10000);
		$this->url("/?gws_rd=ssl");
		$this->byId("lst-ib")->value("phpunit");
		$this->byName("btnG")->click();
		$this->byLinkText("Getting Started with PHPUnit")->click();
		$this->byLinkText("PHP Archive (PHAR)")->click();
		$result = $this->byCssSelector("ul.chunklist.chunklist_book > li > a")->text();
		$this->assertEquals("Introduction", $result);
	}

	// public function testOpen()
 //    {
 //        $this->url('/documentation.html');
 //        $this->assertStringEndsWith('documentation.html', $this->url());
 //    }

	// public function testVersionCanBeReadFromTheTestCaseClass()
 //    {
 //        $this->assertEquals(1, version_compare(PHPUnit_Extensions_Selenium2TestCase::VERSION, "1.2.0"));
 //    }

 //    public function testByLinkText()
 //    {
 //        $this->url('/getting-started.html');
 //        $link = $this->byLinkText('PHP Archive (PHAR)');
 //        $link->click();
 //        $this->assertEquals('PHP: Phar - Manual', $this->title());
 //    }
}

