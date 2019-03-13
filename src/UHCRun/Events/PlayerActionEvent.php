<?php

namespace UHCRun\Events;

use pocketmine\event\Listener;
use pocketmine\event\player\cheat\PlayerIllegalMoveEvent;
use pocketmine\event\player\PlayerAchievementAwardedEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerKickEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use UHCRun\UHCRun;


class PlayerActionEvent implements Listener{

    private $plugin;

    public function __construct(UHCRun $plugin){
        $this->plugin = $plugin;

    }

    public function PlayerLoginEvent(PlayerLoginEvent $event): void{

    }

    public function PlayerJoinEvent(PlayerJoinEvent $event): void{

    }

    public function PlayerQuitEvent(PlayerQuitEvent $event): void{

    }

    public function PlayerKickEvent(PlayerKickEvent $event): void{

    }

    public function PlayerChatEvent(PlayerChatEvent $event): void{

    }

    public function PlayerIllegalMoveEvent(PlayerIllegalMoveEvent $event): void{
        $event->setCancelled();

    }

    public function PlayerAchievementAwardedEvent(PlayerAchievementAwardedEvent $event): void{
        $event->setCancelled();

    }

    public function PlayerDropItemEvent(PlayerDropItemEvent $event): void{

    }


}
