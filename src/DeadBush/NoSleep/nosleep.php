<?php

namespace DeadBush\NoSleep;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerBedEnterEvent;
use pocketmine\utils\Config;

class nosleep extends PluginBase implements Listener {
    public function onEnable(): void{
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onSprint(PlayerBedEnterEvent $event){
        $event->cancel();
        if($this->getConfig()->get("send_message") == true){
            $event->getPlayer()->sendMessage($this->getConfig()->get("message"));
        }
    }
}