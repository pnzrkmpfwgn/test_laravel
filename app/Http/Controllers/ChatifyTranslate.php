<?php

use Pusher\Pusher;
use GuzzleHttp\Client;

// $options = array(
//   'cluster' => 'mt1',
//   'encrypted' => true
// );
// $pusher = new Pusher(
//   '4d91dbf513bccbcd815f',
//   '91789678cc3ab0aa74df',
//   '1530884',
//   $options
// );

// $pusher->listen('message', function($event) {
//     $client = new Client();
//     $response = $client->get('https://api.mymemory.translated.net/get', [
//       'query' => [
//         'q' => $event['text'],
//         'langpair' => $event['language'] . '|en' // translate from incoming language to English
//       ],
//       'headers' => [
//         'X-MAT-APIKEY' => '22aafffa720165c77db2'
//       ]
//     ]); 
  
//     $data = json_decode($response->getBody(), true);
//     $translatedText = $data['responseData']['translatedText'];
//     // send translated text to appropriate user or channel using Pusher
// });