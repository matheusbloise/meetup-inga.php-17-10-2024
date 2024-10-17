<?php

declare(strict_types=1);

namespace App;

class Taximeter
{
    /**
     * Domingo: 0
     * Segunda-feira: 1
     * Terça-feira: 2
     * Quarta-feira: 3
     * Quinta-feira: 4
     * Sexta-feira: 5
     * Sábado: 6
     */
    public function calcTrip($day, $hour, $dist)
    {
        if ($hour != null) {
            if ($hour > 22 || $hour < 6) {
                //return $dist * 3;
                return $dist * 3.9;
            } else {
                if ($day === 0) {
                    //return $dist * 2.2;
                    return $dist * 3;
                } else {
                    return $dist * 2.1;
                }
            }
        } else {
            return -1;
        }
    }
}
