<?php

namespace Phoenix;

use Phoenix\Command\DiscordCmd;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase
{
    use SingletonTrait;
    public function onLoad(): void
    {
        self::setInstance($this);
        $this->getLogger()->info(self::config()->get("load-msg"));
    }

    public function onEnable(): void
    {

        $this->getServer()->getCommandMap()->register("", new DiscordCmd);
        $this->getLogger()->info(self::config()->get("enable-msg"));
    }

    public function onDisable(): void
    {
        $this->getLogger()->info(self::config()->get("disable-msg"));
    }

    public function config(): Config
    {
        return new Config($this->getDataFolder() . "config.yml", Config::YAML);
    }
}