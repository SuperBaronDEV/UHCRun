<?php

declare(strict_types = 1);

namespace UHCRun\Items;

use pocketmine\item\ItemFactory;


class Items{

    public function __construct(){
        $this->init();

    }

    public function init(): void{
        ItemFactory::registerItem(new Cobblestone(), true);
        ItemFactory::registerItem(new Planks(), true);

    }

}