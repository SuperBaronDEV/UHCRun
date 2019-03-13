<?php

namespace UHCRun\Events\Tasks;

use pocketmine\block\Air;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\math\Vector3;
use pocketmine\scheduler\Task;
use UHCRun\UHCRun;


class TreeBreakTask extends Task{

    private $plugin;

    private $block;
    private $break;
    private $force;

    private $ids = [17, 162, 161, 18, 106, 127];
    private $vectors;

    public function __construct(UHCRun $plugin, Block $block, bool $break, bool $force = false){
        $this->plugin = $plugin;

        $this->block = $block;
        $this->break = $break;
        $this->force = $force;

        $this->vectors =
            [
                new Vector3($block->x + 1, $block->y, $block->z),
                new Vector3($block->x, $block->y + 1, $block->z),
                new Vector3($block->x, $block->y, $block->z + 1),
                new Vector3($block->x - 1, $block->y, $block->z),
                new Vector3($block->x, $block->y - 1, $block->z),
                new Vector3($block->x, $block->y, $block->z - 1)

            ];

    }

    public function onRun(int $tick): void{
        $level = $this->block->getLevel();

        if(in_array($level->getBlock($this->block->asVector3())->getId(), $this->ids) or $this->force){

            if($this->break){
                $items = $this->block->getDrops(Item::get(0));

                $level->setBlock($this->block->asVector3(), new Air(), true, false);
                $level->addParticle(new DestroyBlockParticle($this->block->asVector3(), $this->block));

                foreach($items as $item){
                    $level->dropItem($this->block->asVector3(), $item);

                }

            }

            foreach($this->vectors as $key => $vector3){
                $block = $this->block->getLevel()->getBlock($vector3);

                if(in_array($block->getId(), $this->ids)){
                    $this->plugin->getScheduler()->scheduleDelayedTask(new TreeBreakTask($this->plugin, $block, true), 6 + $key);

                }

            }

        }

    }


}