<?php

declare(strict_types = 1);

namespace UHCRun;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;

use UHCRun\Blocks\Blocks;
use UHCRun\Entities\Entities;
use UHCRun\Items\Items;
use UHCRun\Recipes\Recipes;


class UHCRun extends PluginBase implements Listener{

    private $test;

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        /*
         * TEST
         */

        new Blocks();
        new Entities();
        new Items();

        $this->test = new Recipes($this);

    }

    public function TestCraft(PlayerJoinEvent $event){
        //$event->getPlayer()->sendDataPacket($this->test->getCraftingDataPacket());
        if($this->test instanceof Recipes)
            $event->getPlayer()->dataPacket($this->test->getCraftingDataPacket()); //remove Api: 4.0.0
            //$event->getPlayer()->getNetworkSession()->queueCompressed($this->test->getCraftingDataPacket()); Api: 4.0.0

        //https://timings.pmmp.io/?id=1978

    }

}
