<?php

namespace particles\Functions;

use particles\Particles;
use pocketmine\Player;


class geting
{
    public static function isParticles(Player $player, $particles)
    {
        $name = $player->getName();
        $sql = Particles::getInstance()->user->query("SELECT * FROM `particles` WHERE `name` = '$name'")->fetchArray(SQLITE3_ASSOC);
        return $sql[$particles];
    }

    public static function getParticles(Player $player)
    {
        $name = $player->getName();
        $sql = Particles::getInstance()->user->query("SELECT particle FROM `user` WHERE name = '$name'")->fetchArray(SQLITE3_ASSOC);
        return $sql['particle'];
    }

    public static function getMoney(Player $player)
    {
        return (int) Particles::getInstance()->money->myMoney($player);
    }
}