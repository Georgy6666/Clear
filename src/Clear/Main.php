<?php


namespace Clear;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getLogger()->info("Clear Made by GeorgeDev");

    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()){

            case "clear":
                $pl = $this->getServer()->getPlayer($sender->getName());




                if ($sender->hasPermission("clear.cmd")) {
                    if (isset($args[0])){
                        if ($pl->hasPermission("clear.other.cmd")) {
                            $p = $this->getServer()->getPlayer("$args[0]");
                            $p->getInventory()->clearAll();
                            $p->getArmorInventory()->clearAll();
                        }$pl->sendMessage("Youre not allowed to clear other players");

                    }else{
                        $pl->getInventory()->clearAll();
                        $pl->getArmorInventory()->clearAll();

                    }

                }else{
                    $pl->sendMessage("Youre not allowed to clear your Inventory");
                }

                break;

        }return true;
    }

}