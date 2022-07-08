<?php
    $token = '5499026129:AAEoN2szEXnXn3YYLXtpvRKNxO_PmotTgF0';
    $website = 'https://api.telegram.org/bot'.$token;

    $input = file_get_contents('php://input');
    $update = json_decode($input,TRUE);

    $chatID = $update['message']['chat']['id'];
    $messaje = $update['message']['text'];

    switch($messaje){
        case '/start':
            $response= "hizo el comando start!!";
            sendMessage($chatID,$response);
            break;
        case '/info':
            $response= "hizo el comando info!!";
            sendMessage($chatID,$response);
            break;
        default:
            $response= "no se reconoce el comando!!";
            sendMessage($chatID,$response);
            break;
    }

function sendMessage($chatID,$response){
    $url = $GLOBALS['website'].'/sendMessage?chat_id='.$chatID.'&parse_mode=HTML&text='.urlencode($response);
    file_get_contents($url);
}
    