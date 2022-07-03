<?php

declare(strict_types=1);

namespace MCPE_PLUGINS\BetterAuth\form;

use MCPE_PLUGINS\BetterAuth\form\api\CustomForm;
use MCPE_PLUGINS\BetterAuth\Provider;
use pocketmine\player\Player;

final class AuthForm extends CustomForm
{
    public function __construct(private string $auth_type)
    {
        parent::__construct();
    }

    protected function title(): string
    {
        return "§l§4[§8{$this->auth_type}§4]";
    }

    protected function content(): void
    {
        $this->addLabel(match ($this->auth_type) {
            Provider::TYPE_REGISTER => '+ To play in our server please register first.',
            Provider::TYPE_LOGIN => '+ To play in our server please login first.',
            default => ''
        });
        $this->addInput('§b+ §7Type your password here :', 'Type your password here...');
    }

    protected function onSubmit(Player $player, array $data): void
    {
        switch ($this->auth_type) {
            case Provider::TYPE_REGISTER:
                // Check the password & register
                break;

            case Provider::TYPE_LOGIN:
                // Check the password & login
                break;
        }
    }
}