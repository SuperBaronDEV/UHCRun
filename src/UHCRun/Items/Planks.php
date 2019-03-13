<?php

declare(strict_types = 1);

namespace UHCRun\Items;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\item\Item;


class Planks extends Item{

    public function __construct(){
        parent::__construct(5, 0, 'Oak Wood Plank');

    }

    public function getMaxStackSize(): int{
        return 96;

    }

    public function getBlock(): Block{
        return BlockFactory::get(Block::PLANKS);

    }

}
