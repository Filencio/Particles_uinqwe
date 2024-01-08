<?php

namespace particles\Commands;

use particles\Configs\Config;
use particles\Functions\geting;
use particles\Functions\seting;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class buyParticles extends Command
{
    public function __construct()
    {
        parent::__construct('buyp', 'Купить партиклы');
    }

    public function execute(CommandSender $player, $commandLabel, array $args)
    {
        if(!isset($args[0])) return $player->sendMessage("§l§e» §r§fИспользовать§7: §l§e/buyp <название партикла/list>");

        if($args[0] == 'list')
        {
            foreach (Config::PARTICLES as $name => $data) {
                $cost = $data['Cost'];
                $particles[] = "§l§e{$name} §r§8- §l§e{$cost} §r§fмонет";
            }
            $par = implode("\n§l§e", $particles);
            $player->sendMessage("§l§e» §r§fПартиклы:");
            $player->sendMessage("§l§e{$par}");
        }

        if(in_array($args[0], array_keys(Config::PARTICLES)))
        {
            if(geting::getMoney($player) >= Config::PARTICLES[$args[0]]['Cost'])
            {
                if(!geting::isParticles($player, $args[0]))
                {
                    seting::remMoney($player, Config::PARTICLES[$args[0]]['Cost']);
                    seting::setIsParticles($player, $args[0]);
                    $player->sendMessage("§l§e» §r§fВы успешно купили партикл!");
                }
                else
                {
                    $player->sendMessage("§l§e» §r§fУ вас уже есть этот партикл!");
                }
            }
            else
            {
                $player->sendMessage("§l§e» §r§fУ вас недостаточно средств!");
            }
        }
        else
        {
            $player->sendMessage("§l§e» §r§fИспользовать§7: §l§e/buyp <название партикла/list>");
        }
    }
}