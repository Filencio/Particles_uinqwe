<?php

namespace particles;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use particles\Commands\buyParticles;
use particles\Commands\ownParticles;
use particles\Listner\addParticles;
use particles\Listner\onJoin;

use SQLite3;

class Particles extends PluginBase implements Listener
{
    private static $instance = null;
    public $money, $user;
    public function onEnable()
    {
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new addParticles($this), 3);
        $this->getServer()->getPluginManager()->registerEvents(new onJoin($this), $this);

        $this->getServer()->getCommandMap()->register('buyp', new buyParticles());
        $this->getServer()->getCommandMap()->register('ownp', new ownParticles());

        $this->money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");

        $this->user = new SQLite3($this->getDataFolder() ."db/user.db");
        $this->user->query("CREATE TABLE IF NOT EXISTS `user`(`name` TEXT NOT NULL, `particle` TEXT NOT NULL);");
        $this->user->query("CREATE TABLE IF NOT EXISTS `particles`(`name` TEXT NOT NULL, `Flame` INTEGER NOT NULL, `Smoke` INTEGER NOT NULL, `Heart` INTEGER NOT NULL);");

        self::$instance = $this;
    }

    public static function getInstance()
    {
        return self::$instance;
    }
}