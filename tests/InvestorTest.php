<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Investor.php");

class InvestorTest extends TestCase
{
  public function setUp() {
    $this->warren = new Investor(1000);
  }

  public function testCash()
  {
    $cash = $this->warren->getCash();
    $this->assertSame(1000, $cash);
  }

  public function testGetInvestment() {
    $investment = $this->warren->getInvestment();
    $this->assertSame(null, $investment);
  }

  public function testInvest()
  {
    $fakeTranche = $this->getMockBuilder(Tranche::class)
                        ->disableOriginalConstructor()
                        ->setMethods(['addFunds'])
                        ->getMock();
    $fakeTranche->expects($this->once())
                ->method('addFunds')
                ->with($this->equalTo(500));
    $this->assertSame("ok", $this->warren->invest(500, $fakeTranche));
    $this->assertSame(500, $this->warren->getCash());
  }
}
