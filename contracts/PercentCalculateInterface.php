<?php
namespace Contracts;

use Dto\PercentCalculateDTO;

interface PercentCalculateInterface
{
    public function getPercent(PercentCalculateDTO $percentDto);
}