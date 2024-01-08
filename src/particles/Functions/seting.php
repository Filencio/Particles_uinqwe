<?php

namespace particles\Functions;

use cosmetic\Cosmetics;
use particles\Particles;
use pocketmine\Player;

class seting
{
    // А теперь партеклы

    public static function setIsParticles(Player $player, $particles)
    {
        $name = $player->getName();
        Particles::getInstance()->user->query("UPDATE `particles` SET `$particles` = 1 WHERE `name` = '$name'");
    }

    public static function setParticles(Player $player, $particles)
    {
        $name = $player->getName();
        Particles::getInstance()->user->query("UPDATE `user` SET `particle` = '$particles' WHERE `name` = '$name'");
    }

    // и API запихну сюда

    public static function remMoney(Player $player, $amount)
    {
        Particles::getInstance()->money->reduceMoney($player, $amount);
    }
}