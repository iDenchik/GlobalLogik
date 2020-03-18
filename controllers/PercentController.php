<?php
namespace Controllers;

use Contracts\PercentCalculateInterface;
use Dto\PercentCalculateDTO;

/**
 * Class PercentCalculator
 */
class PercentController
{
    /**
     * @var PercentCalculateInterface
     */
    private $percentCalculate;
    
    /**
     * AccountService constructor.
     *
     * @param PercentCalculateInterface $percentCalculate
     */
    public function __construct(PercentCalculateInterface $percentCalculate)
    {
        $this->percentCalculate = $percentCalculate;
    }
    
    /**
     * @param $request
     *
     * @return int
     */
    public function getPercent($request)
    {
        $percentDto = new PercentCalculateDTO();
        $percentDto->setRate($request['rate']);
        $percentDto->setSum($request['sum']);
        $percentDto->setYear($request['year']);
        
        return $this->percentCalculate->getPercent($percentDto);
    }
}
