<?php

namespace particles\Listner;

use particles\Particles;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerPreLoginEvent;



class onJoin implements Listener
{

    public function __construct(Particles $general)
    {
        $this->general = $general;
    }

    public function addDB(PlayerPreLoginEvent $event)
    {
        $name = $event->getPlayer()->getName();
        if(!$this->general->user->query("SELECT * FROM `user` WHERE name = '$name'")->fetchArray(SQLITE3_ASSOC))
        {
            $this->general->user->query("INSERT INTO user(name, particle, cape) VALUES ('$name', 'none');");
            $this->general->user->query("INSERT INTO particles(name, Flame, Smoke, Heart) VALUES ('$name', 0, 0, 0);");
        }
    }
}