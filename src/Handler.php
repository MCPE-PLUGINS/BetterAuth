<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterAuth;

use pocketmine\player\Player;

final class Handler
{
    public static function setNeedsToAuthenticate(Player $player, bool $value): void
    {
        $player->setImmobile(true);
        Loader::$AuthenticateList[] = $player->getName();
    }

    public static function needsToAuthenticate(Player $player): bool
    {
        return isset(Loader::$AuthenticateList[$player->getName()]);
    }

    public static function getAuthenticateType(Player $player): string
    {
        // Check ip & stuff
        return '';
    }
}