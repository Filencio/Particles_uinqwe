<?php

namespace particles\Commands;

use particles\Configs\Config;
use particles\Functions\geting;
use particles\Functions\seting;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class ownParticles extends Command
{
    public function __construct()
    {
        parent::__construct('ownp', 'Установить партикл');
    }

    public function execute(CommandSender $player, $commandLabel, array $args)
    {
        if(!isset($args[0])) return $player->sendMessage("§l§e» §r§fИспользовать§7: §l§e/ownp <название партикла/list>");

        if($args[0] == 'list')
        {
            foreach (Config::PARTICLES as $name => $data) {
                $particles[] = "§l§e{$name}";
            }

            $par = implode("§r§7, §l§e", $particles);
            $player->sendMessage("§l§e» §r§fПартиклы§7: §l§e{$par}");
        }


        if(in_array($args[0], array_keys(Config::PARTICLES)))
        {
            if(geting::isParticles($player, $args[0]))
            {
                seting::setParticles($player, $args[0]);
                $player->sendMessage("§l§e» §r§fВы успешно установили партикл!");
            }
            else
            {
                $player->sendMessage("§l§e» §r§fУ вас нету этого партикла!");
            }
        }
        else
        {
            $player->sendMessage("§l§e» §r§fИспользовать§7: §l§e/ownp <название партикла/list>");
        }
    }
}