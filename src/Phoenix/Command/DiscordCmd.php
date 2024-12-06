<?php

namespace Phoenix\Command;

use Phoenix\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
class DiscordCmd extends Command
{
    public function __construct()
    {
        parent::__construct("discord", Main::getInstance()->config()->get("command-description"), "/discord", ["ds"]);
        $this->setPermission("discord.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
       if ($sender->hasPermission("discord.cmd")) {
           $sender->sendMessage(Main::getInstance()->config()->get("discord-msg"));
       }else{
           $sender->sendMessage(Main::getInstance()->config()->get("not-permission"));
       }
    }
}