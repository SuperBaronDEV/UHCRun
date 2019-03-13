<?php

declare(strict_types = 1);

namespace UHCRun\Recipes;

use pocketmine\inventory\ShapedRecipe;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\network\mcpe\protocol\BatchPacket;
use pocketmine\network\mcpe\protocol\CraftingDataPacket;
use UHCRun\UHCRun;


class Recipes{

    private $plugin;

    private $craftingDataCache;

    public function __construct(UHCRun $plugin){
        $this->plugin = $plugin;

        $this->init();

    }

    public function init(): void{
        $recipes = $this->getRecipes();

        $pk = new CraftingDataPacket();
        $pk->cleanRecipes = true;

        foreach($recipes as $recipe){
            $ingredients = array_map(function(array $data): Item{ return Item::jsonDeserialize($data); }, $recipe['input']);
            $result = Item::get($recipe['result']['id'], $recipe['result']['meta'], $recipe['result']['count']);

            foreach($recipe['result']['enchantments'] as $key => $level){
                $enchantment = Enchantment::getEnchantmentByName($key);
                $result->addEnchantment(new EnchantmentInstance($enchantment, $level));

            }

            $pk->addShapedRecipe(new ShapedRecipe($recipe['shape'], $ingredients, [$result]));
            $this->plugin->getServer()->getCraftingManager()->registerShapedRecipe(new ShapedRecipe($recipe['shape'], $ingredients, [$result]));

        }

        foreach($this->plugin->getServer()->getCraftingManager()->getShapedRecipes() as $list){
            foreach($list as $recipe){

                if($recipe instanceof ShapedRecipe){
                    foreach($recipe->getResults() as $result){

                        foreach($recipes as $recipe_){

                            if($result->getId() == $recipe_['replace']['id']){
                                break 3;

                            }

                        }

                    }

                }

                $pk->addShapedRecipe($recipe);

            }

        }

        $batch = new BatchPacket();
        $batch->addPacket($pk);
        $batch->setCompressionLevel($this->plugin->getServer()->getInstance()->networkCompressionLevel);
        $batch->encode();

        $this->craftingDataCache = $batch;

    }

    public function getRecipes(): array{
        return json_decode(file_get_contents($this->plugin->getServer()->getDataPath().'/plugins/UHCRun/src/UHCRun/Recipes/Recipes.json'), true);

    }

    public function getCraftingDataPacket(): BatchPacket{
        return $this->craftingDataCache;

    }


}