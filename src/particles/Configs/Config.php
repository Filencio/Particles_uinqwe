<?php

namespace particles\Configs;

use pocketmine\level\particle\Particle;

class Config
{
    const PARTICLES = [
        'Flame' => [
            'Cost' => 1000,
            'TYPE' => Particle::TYPE_FLAME
        ],
        'Heart' => [
            'Cost' => 1000,
            'TYPE' => Particle::TYPE_HEART
        ],
        'Smoke' => [
            'Cost' => 1000,
            'TYPE' => Particle::TYPE_SMOKE
        ]
    ];
}