<?php

declare(strict_types = 1);

namespace UHCRun\Blocks;

use pocketmine\block\BlockToolType;
use pocketmine\block\Fallable;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;


class Gravel extends Fallable{

    public function __construct(){
        parent::__construct(13, 0, 'Gravel');

    }

    public function getHardness(): float{
        return 0.6;

    }

    public function getToolType(): int{
        return BlockToolType::TYPE_SHOVEL;

    }

    public function getDrops(Item $item): array{
        return [
            ItemFactory::get(Item::ARROW, 0, 3)

        ];

    }

}
