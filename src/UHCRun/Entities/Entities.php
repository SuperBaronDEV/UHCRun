<?php

declare(strict_types = 1);

namespace UHCRun\Entities;

use pocketmine\entity\Entity;


class Entities{

    public function __construct(){
        $this->init();

    }

    public function init(): void{
        Entity::registerEntity(FallingBlock::class, true, ['FallingSand', 'minecraft:falling_block']);

    }

}