<?php

namespace particles\Listner;

use particles\Configs\Config;
use pocketmine\event\Listener;
use pocketmine\level\particle\GenericParticle;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\scheduler\PluginTask;

use particles\Particles;
use particles\Functions\functions;
use particles\Functions\geting;

class addParticles extends PluginTask implements Listener
{
    public function __construct(Particles $owner)
    {
        $this->api = $owner;
        parent::__construct($owner);
    }

    public function onRun($currentTick)
    {
        foreach ($this->api->getServer()->getOnlinePlayers() as $player)
        {
            if($player->isSpectator() || geting::getParticles($player) == "none") continue;

            $player->getLevel()->addParticle(new GenericParticle(new Vector3($player->getX() + functions::randomFloat(), $player->getY() + functions::randomFloat(0.5, 1.1), $player->getZ() + functions::randomFloat()), Config::PARTICLES[geting::getParticles($player)]['TYPE']));
        }
    }
}