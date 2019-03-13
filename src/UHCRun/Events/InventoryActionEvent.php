<?php

namespace UHCRun\Events;

use pocketmine\event\inventory\InventoryPickupArrowEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\Listener;
use UHCRun\UHCRun;


class InventoryActionEvent implements Listener{

    private $plugin;

    public function __construct(UHCRun $plugin){
        $this->plugin = $plugin;

    }

    public function BlockBreakEvent(InventoryPickupArrowEvent $event): void{

    }

    public function BlockPlaceEvent(InventoryPickupItemEvent $event): void{

    }


}
