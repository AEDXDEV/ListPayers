<?php

/*
by AEDXDV

Youtube: @AEDXDEV
Discord: AEDXDEV#1622

*/
namespace ListPlayers;

use JaxkDev\DiscordBot\Bot;
use JaxkDev\DiscordBot\Communication;
use JaxkDev\DiscordBot\Plugin\Events\MessageSent;
use JaxkDev\DiscordBot\Plugin\Api;
use JaxkDev\DiscordBot\Plugin\Main;

use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class ListPlayers extends PluginBase implements Listener{
  
    public function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function MessageSent(MessageSent $event){
        $discordbot = $this->getServer()->getPluginManager()->getPlugin("DiscordBot");
        $api = $discordbot->getApi();
        $channel_id = $message->getChannelId();
        $message = $event->getMessage();
        $content = $message->getContent();
        $args = explode(" ", $content);
        // command
        if($args[0] == "!list"){
          $api->sendMessage(new \JaxkDev\DiscordBot\Models\Messages\Message($channel_id, null, "```" .  implode("\n", array_map(fn(Player $player) => $player->getName(), $this->getServer()->getOnlinePlayers()))  . "```"));
        }
    }
}
