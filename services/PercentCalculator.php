<?php
namespace Services;

use Contracts\PercentCalculateInterface;
use Dto\PercentCalculateDTO;

/**
 * Class PercentCalculator
 */
class PercentCalculator implements  PercentCalculateInterface
{
    
    /**
     * @var int
     */
    private $sum;
    
    /**
     * @var int
     */
    private $rate;
    
    /**
     * @var int
     */
    private $year;
    
    /**
     * @var int
     */
    private $sumPercent;
    
    /**
     * @param PercentCalculateDTO $percentDto
     *
     * @return int
     * @throws \Exception
     */
    public function getPercent(PercentCalculateDTO $percentDto)
    {
        $this->sum = $percentDto->getSum();
        $this->year = $percentDto->getYear();
        $this->rate = $percentDto->getRate();
        $this->calculate();
        
        return $this->sumPercent;
    }
    
    /**
     * @return void
     */
    private function calculate()
    {
        for ($i = $this->year; $i != 0; $i--) {
            $this->updateSumPercent();
            $this->updateSum($i);
        }
    }
    
    /**
     * @return void
     */
    private function updateSumPercent()
    {
        $this->sumPercent += ($this->rate / 100 * $this->sum) * (1 + $this->rate / 100);
    }
    
    /**
     * @param $year
     *
     * @return void
     */
    private function updateSum($year)
    {
        $this->sum -= ($this->sum / $year);
    }
}
