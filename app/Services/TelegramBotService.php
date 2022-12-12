<?php

namespace App\Services;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\Message;

class TelegramBotService
{
    public static function send($message, $chatId = null) : Message
    {
        $result = Telegram::sendMessage([
            'chat_id' => $chatId ?? env('TELEGRAM_CHANEL_FOR_MESSAGE'),
            'text' => $message,
            'parse_mode' => 'HTML',
        ]);
        
        return$result;
    }
    
    public static function getExceptionMessage(string $message = null, string $exception = null, string $codePlace = null) : string
    {
        $text = "<b>New app exseption</b>\n\n";
        $text .= "<b>App: </b>" . env('APP_URL') . "\n";
        $user = 'Guest';
        
        if(auth()->check()) {
            $user = auth()->user()->full_name;
        }
        
        $text.= "<b>User:</b> " . $user . "\n";
        $text .= "<b>IP: </b>" . request()->ip() . "\n";
        
        if($message) {
            $text.= "<b>Message: </b>" . htmlspecialchars($message) . "\n";
        }
    
        if($exception) {
            $text.= "<b>Exception: </b>" . htmlspecialchars($exception) . "\n";
        }
    
        if($codePlace) {
            $text.= "<b>In code: </b>" . htmlspecialchars($codePlace) . "\n";
        }
        return $text;
    }
}