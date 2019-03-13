<?php

namespace UHCRun\Events;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityShootBowEvent;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\Player;
use UHCRun\UHCRun;


class EntityActionEvent implements Listener{

    private $plugin;

    public function __construct(UHCRun $plugin){
        $this->plugin = $plugin;

    }

    public function EntityDamageEvent(EntityDamageEvent $event): void{

    }

    public function EntityShootBowEvent(EntityShootBowEvent $event): void{

    }

    public function EntityShootBowEventSound(EntityDamageEvent $event): void{
        $entity = $event->getEntity();

        if($event instanceof EntityDamageByEntityEvent && $entity instanceof Player){
            $player = $event->getDamager();

            if($event->getCause() == EntityDamageByEntityEvent::CAUSE_PROJECTILE && $player instanceof Player){
                $player->getLevel()->broadcastLevelSoundEvent(new Vector3($player->x, $player->y + 1, $player->z), LevelSoundEventPacket::SOUND_NOTE, 20);

            }

        }

    }


}
