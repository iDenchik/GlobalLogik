<?php

namespace Dto;

use Exception;

/**
 * Class SumPercentDTO
 */
class PercentCalculateDTO
{
    /**
     * @var int
     */
    protected $sum;
    
    /**
     * @var int
     */
    protected $rate;
    
    /**
     * @var int
     */
    protected $year;
    
    /**
     * @param $rate
     *
     * @return PercentCalculateDTO
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
        
        return $this;
    }
    
    /**
     * @return int
     * @throws Exception
     */
    public function getRate()
    {
        if (empty($this->rate) || $this->rate <= 0) {
            Throw new Exception('Format for rate not valid');
        }
        
        return $this->rate;
    }
    
    /**
     * @param $sum
     *
     * @return PercentCalculateDTO
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    
        return $this;
    }
    
    /**
     * @return int
     * @throws Exception
     */
    public function getSum()
    {
        if (empty($this->sum) || $this->sum <= 0) {
            Throw new Exception('Format for sum not valid');
        }
        
        return $this->sum;
    }
    
    /**
     * @param $year
     *
     * @return PercentCalculateDTO
     */
    public function setYear($year)
    {
        $this->year = $year;
    
        return $this;
    }
    
    /**
     * @return int
     * @throws Exception
     */
    public function getYear()
    {
        if (empty($this->year) || $this->year <= 0) {
            Throw new Exception('Format for year not valid');
        }
        
        return $this->year;
    }
}