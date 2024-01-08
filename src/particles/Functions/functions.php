<?php

namespace particles\Functions;

class functions
{
    public static function randomFloat($min = - 0.9, $max = 0.9)
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }
}