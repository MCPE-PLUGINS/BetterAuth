<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterAuth;

use pocketmine\plugin\PluginBase;

class Loader extends PluginBase
{
    public static array $AuthenticateList = array();

    protected function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventsHandler(), $this);
    }
}
