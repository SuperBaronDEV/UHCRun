<?php

namespace UHCRun\Events;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\Listener;
use UHCRun\UHCRun;


class BlockActionEvent implements Listener{

    private $plugin;

    public function __construct(UHCRun $plugin){
        $this->plugin = $plugin;

    }

    public function BlockBreakEvent(BlockBreakEvent $event): void{

    }

    public function BlockPlaceEvent(BlockPlaceEvent $event): void{

    }


}
