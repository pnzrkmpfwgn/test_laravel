<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Attachments;
use BotMan\BotMan\Messages;



class BotmanAsk extends Conversation
{
    public function run()
    {
        $this->selectHelpQuery();
    }

    public function selectHelpQuery()
    {
        $question =  Question::create('how is it ?')
        ->fallback('cant show the buttons')
        ->callbackId('buttons_showed')
        ->addButtons([
        Button::create('yes button')->value('yes'),
        Button::create('no button')->value('no')
        ]);

        $this->ask($question, function (Answer $answer3){
            if($answer3->isInteractiveMessageReply()){
            $this->say('you selected '.$answer3->getValue());
            }
            else {
                $this->repeat();
            }
        });
        
        

        // $this->ask($question, function (Answer $answer3){
        //      if($answer3->isInteractiveMessageReply()){
        //      $selectedValue = $answer3->getValue(); // yes or no
        //      $selectedText = $answer3->getText();  // yes button or no button
        //      }
        //  });

        // $this->ask($question, function (Answer $answer3){
        //     if($answer3->isInteractiveMessageReply()){
        //         switch ($answer3->getValue()) {
        //             case 'yes':
        //                 $this->bot->startConversation(new NewBotmanConversation());

        //             case 'no':
        //                  $this->bot->startConversation(new NewBotmanConversation2());
        //             break;
        //         }
        //     }
        // });
    }
}