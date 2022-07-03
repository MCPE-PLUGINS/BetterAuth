<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterAuth;

use MCPE_PLUGINS\BetterAuth\form\AuthForm;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerMoveEvent;

final class EventsHandler implements Listener
{
    public function onPlayerLogin(PlayerLoginEvent $event)
    {
        $player = $event->getPlayer();
        if (!$player->isAuthenticated()) {
            Handler::setNeedsToAuthenticate($player, true);
        }
    }

    public function onPlayerJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $auth_type = Handler::getAuthenticateType($player);

        if (!empty($auth_type)) {
            $player->sendForm(new AuthForm($auth_type));
        }
    }

    public function onPlayerMove(PlayerMoveEvent $event)
    {
        $player = $event->getPlayer();
        if (Handler::needsToAuthenticate($player)) {
            $event->cancel();
        }
    }

    public function onPlayerChat(PlayerChatEvent $event)
    {
        $player = $event->getPlayer();
        if (Handler::needsToAuthenticate($player)) {
            $event->cancel();
        }
    }

    public function onPlayerDrop(PlayerDropItemEvent $event)
    {
        $player = $event->getPlayer();
        if (Handler::needsToAuthenticate($player)) {
            $event->cancel();
        }
    }

    public function onPlayerCmdProcess(PlayerCommandPreprocessEvent $event)
    {
        $player = $event->getPlayer();
        if (Handler::needsToAuthenticate($player)) {
            $event->cancel();
        }
    }

    public function onPlayerInteract(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        if (Handler::needsToAuthenticate($player)) {
            $event->cancel();
        }
    }
}
