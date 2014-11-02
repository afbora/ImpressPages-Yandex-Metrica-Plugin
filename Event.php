<?php

namespace Plugin\YandexMetrica;

class Event
{
    public static function ipBeforeController()
    {
        $trackingId = ipGetOption('YandexMetrica.trackingId');
        
        if ($trackingId == '') 
        {
            return false;
        }
        
        $script = ipView('view/script.php', compact('trackingId'))->render();

        ipAddJsContent('YandexMetrica', $script);

        return true;        
    }
}
