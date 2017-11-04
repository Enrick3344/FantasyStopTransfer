<?php

namespace FantasyStopTransfer;

use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->notice("FantasyStopTransfer by Enrick3344 Enabled!");
    }
    
    public function onDisable(){
        $ipadress = $this->getConfig()->get("IP-Adress");
        $port = $this->getConfig()->get("Port");
        if($this->getConfig()->get("Transfer") == true){
            foreach($this->getServer()->getOnlinePlayers() as $players){
                $players->transfer($ipadress, $port);
            }
        }
    }
}
