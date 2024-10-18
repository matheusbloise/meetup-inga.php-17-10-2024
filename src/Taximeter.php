<?php

declare(strict_types=1);

namespace App;

class Taximeter
{
    const OVERNIGHT_START = 22;
    const OVERNIGHT_END = 6;
    const SUNDAY = 0;

    /**
     * Domingo: 0
     * Segunda-feira: 1
     * Terça-feira: 2
     * Quarta-feira: 3
     * Quinta-feira: 4
     * Sexta-feira: 5
     * Sábado: 6
     */
    public function calcTrip(int $day, int $hour, int $distance): float|int
    {
        if ($this->isInvalidInput($hour)) {
            return -1;
        }
        if ($this->isOvernight($hour)) {
            return $distance * 3.9;
        }
        if ($day === self::SUNDAY) {
            return $distance * 3;
        }
        return $distance * 2.1;
    }

    private function isOvernight(int $hour): bool
    {
        return $hour > self::OVERNIGHT_START || $hour < self::OVERNIGHT_END;
    }

    private function isInvalidInput(?int $hour): bool
    {
        return $hour < 0 || $hour > 23;
    }
}
