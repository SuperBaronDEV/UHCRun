<?php

declare(strict_types = 1);

namespace UHCRun\Blocks;

use pocketmine\block\BlockFactory;


class Blocks{

    public function __construct(){
        $this->init();

    }

    public function init(): void{
        BlockFactory::registerBlock(new BrownMushroom(), true);
        BlockFactory::registerBlock(new RedMushroom(), true);
        BlockFactory::registerBlock(new Cactus(), true);
        BlockFactory::registerBlock(new DoubleTallGrass(), true);
        BlockFactory::registerBlock(new DeadBush(), true);
        BlockFactory::registerBlock(new Sugarcane(), true);
        BlockFactory::registerBlock(new TallGrass(), true);

        BlockFactory::registerBlock(new CoalOre(), true);
        BlockFactory::registerBlock(new IronOre(), true);
        BlockFactory::registerBlock(new GoldOre(), true);
        BlockFactory::registerBlock(new DiamondOre(), true);
        BlockFactory::registerBlock(new EmeraldOre(), true);

        BlockFactory::registerBlock(new Gravel(), true);
        BlockFactory::registerBlock(new Sand(), true);


        BlockFactory::registerBlock(new Leaves(), true);
        BlockFactory::registerBlock(new Leaves2(), true);
        BlockFactory::registerBlock(new Wood(), true);
        BlockFactory::registerBlock(new Wood2(), true);

        BlockFactory::registerBlock(new MonsterSpawner(), true);
        BlockFactory::registerBlock(new Obsidian(), true);
        BlockFactory::registerBlock(new Pumpkin(), true);

        BlockFactory::registerBlock(new Stone(), true);

    }

}