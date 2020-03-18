<?php

namespace Tests\Unit;

use Codeception\Test\Unit;
use Dto\PercentCalculateDTO;
use PHPUnit\Framework\MockObject\MockObject;
use Services\PercentCalculator;

/**
 * Class PercentCalculateTest
 *
 * @package Tests\Unit
 */
class PercentCalculateTest extends Unit
{
    /**
     * @return void
     * @throws \Exception
     */
    public function testSuccess()
    {
        /** @var PercentCalculateDTO|MockObject $publisher */
        $percent = $this->getMockBuilder(PercentCalculateDTO::class)
            ->disableOriginalConstructor()
            ->setMethods(['getRate', 'getSum', 'getYear'])
            ->getMock();
    
        $percent->method('getRate')
            ->willReturn(10);
        $percent->method('getSum')
            ->willReturn(4000);
        $percent->method('getYear')
            ->willReturn(4);
        
        $exportService = new PercentCalculator();
        
        $this->assertEquals($exportService->getPercent($percent), 1100);
    }
    
    /**
     * @return void
     * @throws \Exception
     */
    public function testWithNotValidSum()
    {
        /** @var PercentCalculateDTO $percentCalculateDTO */
        $percentCalculateDTO = new PercentCalculateDTO();
        $percentCalculateDTO->setSum(0);
        
        $this->expectExceptionMessage('Format for sum not valid');
        $this->assertEquals($percentCalculateDTO->getSum(), 'Format for sum not valid');
    }
    
    /**
     * @return void
     * @throws \Exception
     */
    public function testWithNotValidYear()
    {
        /** @var PercentCalculateDTO $percentCalculateDTO */
        $percentCalculateDTO = new PercentCalculateDTO();
        $percentCalculateDTO->setRate(0);
    
        $this->expectExceptionMessage('Format for rate not valid');
        $this->assertEquals($percentCalculateDTO->getRate(), 'Format for rate not valid');
    }
    
    /**
     * @return void
     * @throws \Exception
     */
    public function testWithNotValidRate()
    {
        /** @var PercentCalculateDTO $percentCalculateDTO */
        $percentCalculateDTO = new PercentCalculateDTO();
        $percentCalculateDTO->setYear(0);
    
        $this->expectExceptionMessage('Format for year not valid');
        $this->assertEquals($percentCalculateDTO->getYear(), 'Format for year not valid');
    }
}

