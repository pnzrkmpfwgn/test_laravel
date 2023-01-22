<?php
namespace App\Http\Controllers;
   
use PDO;
use PDOException;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages;
use Illuminate\Http\Request;
use BotManTranslateController;
use BotMan\BotMan\BotManFactory;
use App\Http\Controllers\BotmanAsk;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Attachments\Attachment;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Conversations\Conversation;



class BotManController extends Controller
{
    // yeni bir class açarken web.php ye route ekle

    
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        // Set the API endpoint URL
        $apiUrl = "https://api.mymemory.translated.net/get";

        $botman->fallback(function($bot){
            $message = $bot->getMessage();
            $bot->reply('Sorry, I did not understand "' .$message->getText().'"');
            $bot->reply('Here is a list of commands I understand: (my name is [name]) , (say my name) ,(video) , (audio)  ,(show me buttons) , (colour) , (skip) ,(conversation), (stop), translate {text} from {source} to {target}, translate {text} to {language} , Register|register');
        });

        // $botman->hears('Hi|hi|hey|hello|howdy|HI|Hİ|yo|Yo|YO (.*)', function($botman)


        $botman->hears('Hi|hi (.*)', function($botman) {
   
            $this->askName($botman);

            // if ($message == 'Hi' OR $message == 'hi' OR $message == 'hey' OR $message == 'hello' OR $message == 'howdy'  OR $message == 'HI' OR $message == 'Hİ' OR $message == 'yo' OR $message == 'Yo' OR $message == 'YO') {
            //     $this->askName($botman);
            // }         

            // elseif ($message == 'show me buttons'){
            //     $this->showButtons($botman);
            //   }
            

            // else{
            //       $botman->reply("Sorry, I did not understand these commands. Here is a list of commands I understand: ......... ");
            //  }
   
        });

        $botman->hears('skip', function ($botyman){
             $botyman->reply('conversation skipped');
        })->skipsConversation();

        $botman->hears('stop', function ($botyman){
            $botyman->reply('conversation stopped');
        })->stopsConversation();

        $botman->hears('colour' , function ($boty){
                $boty->ask('what is your fav colour ?', function ($answer4,$conversation){
                    $value2 = $answer4->getText();
                    $conversation->say('nice choice , i like '.$value2.' too');
                });
        })->skipsConversation();

        $botman->hears('conversation' , function ($boty){
            $boty->startConversation(new NewBotmanConversation);
    });

        $botman->hears('my name is {name}',function($botman,$name){
                      $botman->userStorage()->save(['name' => $name]);
                      $botman->reply('Hi '.$name);
        });

        $botman->hears('say my name',function($botman){
            $name = $botman->userStorage()->get('name');
            $botman->reply('your name is '.$name.' and i am god damn right');
        });



        $botman->hears('show me buttons (.*)', function($botman, $message2){
                $botman->startConversation(new BotmanAsk);
        });


    //     $botman->hears('Find house with {bedrooms} bedrooms', function($botman,$property){
    //         $botman->reply('house with this '.$property->bedrooms.'is found');
    //         $botman->reply('name of the property is '.$property->address.' and it has also has '.$property->price. 'price on it.');
    // });


        // üstekinin aynısı ama farklı hali

        // $botman->hears('{message}', function($botman, $message2){
        //     if ($message2 == 'show me buttons bro'){
        //         $botman->startConversation(new BotmanAsk);
        //     }
            
        // });


        //BOTMAN TRANSLATE

        $botman->hears('translate {text} to {language}', function (BotMan $bot, $text, $language) {
        
        //API URL i ayarladın
        $apiUrl = "https://api.mymemory.translated.net/get";

        // API request parametresi
        $params = [
            "q" => $text,
            "langpair" => "en|$language",
            "key" => "22aafffa720165c77db2"
        ];

        // Build the query string
        $query = http_build_query($params);

        // Send the request and get the response
        $response = file_get_contents("$apiUrl?$query");

        // Decode the response as JSON
        $responseJson = json_decode($response, true);

        // Send the translated text back to the user
        $bot->reply($responseJson['responseData']['translatedText']);
        });
        

        $botman->hears('translate {text} from {source} to {target}', function (BotMan $bot, $text, $source, $target){
        // Set the API endpoint URL
        $apiUrl = "https://api.mymemory.translated.net/get";

        // Initialize the translated text variable
        $translatedText = "";

        // Break the text up into chunks of 10,000 characters or less
        $chunks = str_split($text, 10000);

        // Loop through the chunks
        foreach ($chunks as $chunk) {
            // Set the parameters for the API request
            $params = [
                "q" => $chunk,
                "langpair" => "$source|$target",
                "key" => "22aafffa720165c77db2"
            ];

            // Build the query string
            $query = http_build_query($params);

            // Send the request and get the response
            $response = file_get_contents("$apiUrl?$query");

            // Decode the response as JSON
            $responseJson = json_decode($response, true);
            // Add the translated text to the overall translated text
            $translatedText .= $responseJson['responseData']['translatedText'];
            }

            // Send the translated text back to the user
            $bot->reply($translatedText);
            });

            // //-------------------------------------------------
            // //Auto translate ama garip

            // // Set up a conversation with the user
            // $botman->hears('translate {text} from {source} to {target}', function (BotMan $bot, $text, $source, $target) {
            //     // Set the API endpoint URL
            //     $apiUrl = "https://api.mymemory.translated.net/get";

            //     // Initialize the translated text variable
            //     $translatedText = "";

            //     // Break the text up into chunks of 10,000 characters or less
            //     $chunks = str_split($text, 10000);

            //     // Loop through the chunks
            //     foreach ($chunks as $chunk) {
            //         // Set the parameters for the API request
            //         $params = [
            //             "q" => $chunk,
            //             "langpair" => "$source|$target",
            //             "key" => "22aafffa720165c77db2"
            //         ];

            //         // Build the query string
            //         $query = http_build_query($params);

            //         // Send the request and get the response
            //         $response = file_get_contents("$apiUrl?$query");

            //         // Decode the response as JSON
            //         $responseJson = json_decode($response, true);

            //         // Add the translated text to the overall translated text
            //         $translatedText .= $responseJson['responseData']['translatedText'];
            //     }

            //     // Send the translated text back to the user
            //     $bot->reply($translatedText);
            // });
             
            // // Set up a fallback conversation for all other messages
            //  $botman->fallback(function (BotMan $bot) {
            //     // Set the default source and target languages
            //     $source = "en";
            //     $target = "tr";

            //     // Set the API endpoint URL
            //     $apiUrl = "https://api.mymemory.translated.net/get";

            //     // Initialize the translated text variable
            //     $translatedText = "";

            //     // Break the text up into chunks of 10,000 characters or less
            //     $chunks = str_split($bot->getMessage()->getText(), 10000);

            //     // Loop through the chunks
            //     foreach ($chunks as $chunk) {
            //         // Set the parameters for the API request
            //         $params = [
            //             "q" => $chunk,
            //             "langpair" => "$source|$target",
            //             "key" => "22aafffa720165c77db2"
            //         ];

            //         // Build the query string
            //         $query = http_build_query($params);

            //         // Send the request and get the response
            //         $response = file_get_contents("$apiUrl?$query");

            //         // Decode the response as JSON
            //         $responseJson = json_decode($response, true);

            //         // Add the translated text to the overall translated text
            //         $translatedText .= $responseJson['responseData']['translatedText'];
            //     }

            //     // Send the translated text back to the user
            //     $bot->reply($translatedText);
            //     });

        //-----------------------------------------------Çalışmayan Register

        //    $botman->hears('register', function (BotMan $bot) {
            
        //     // Prompt the user for their name
        //     $bot->ask('What is your name?', function (BotMan $bot, $name) {
        //         // Store the name in a session variable
        //         $bot->userStorage()->save(['name' => $name]);
                
        //         // Prompt the user for their email address
        //         $bot->ask('What is your email address?', function (BotMan $bot, $email) {
        //             // Validate the email address
        //             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //                 $bot->say('Invalid email address',$email);
        //                 return;
        //             }
        //             // Store the email address in a session variable
        //             $bot->userStorage()->save(['email' => $email]);
                    
        //             // Prompt the user for their password
        //             $bot->ask('What is your password?', function (BotMan $bot, $password) {
        //                 // Validate the password
        //                 if (strlen($password) < 8) {
        //                     $bot->say('Password must be at least 8 characters long', $password);
        //                     return;
        //                 }
        //                 // Hash the password
        //                 $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        
        //                 // Connect to the database
        //                 try {
        //                     $pdo = new PDO('mysql:host=localhost;dbname=real2', 'root', '');
        //                 } catch (PDOException $e) {
        //                     $bot->say('Error connecting to the database: ' . $e->getMessage() , $bot->getUser()->getId());
        //                     return;
        //                 }
        //                 // Set the PDO error mode to exception
        //                 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
        //                 // Get the name and email address from the session
        //                 $name = $bot->userStorage()->get('name');
        //                 $email = $bot->userStorage()->get('email');
                        
        //                 // Insert the user into the database
        //                 $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        //                 try {
        //                     $stmt = $pdo->prepare($query);
        //                     $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword]);
        //                 } catch (PDOException $e) {
        //                     $bot->say('Error inserting into the database: ' . $e->getMessage(), $bot->getUser()->getId());
        //                     return;
        //                 }
                        
        //                 // Send a confirmation message to the user
        //                 $bot->say('You have been successfully registered!', $bot->getUser()->getId());
        //             });
        //         });
        //     });
        // });
        
           //-----------------------------------------------E

           $botman->hears('register|Register',function($botman){
            $botman->reply('Register Link <a href="http://127.0.0.1:8000/register">Here</a>.');
        });

           //-----------------------------------------------S
        
            // // Set up a conversation to listen for the user's message
            // $botman->hears('{text}', function($botman, $text) use ($apiUrl) {
            //     // Initialize the translated text variable
            //     $translatedText = "";
        
            //     // Set the default source and target languages
            //     $source = "en";
            //     $target = "tr";
        
            //     // Check if the user's message is in a different language
            //     if (preg_match('/[^\x00-\x7F]/', $text)) {
            //         // The message is in a different language, so set the source language accordingly
            //         $source = mb_detect_encoding($text, "UTF-8, ISO-8859-1");
            //     }
        
            //     // Break the text up into chunks of 10,000 characters or less
            //     $chunks = str_split($text, 10000);
        
            //     // Loop through the chunks
            //     foreach ($chunks as $chunk) {
            //         // Set the parameters for the API request
            //         $params = [
            //             "q" => $chunk,
            //             "langpair" => "$source|$target",
            //             "key" => "22aafffa720165c77db2"
            //         ];
        
            //         // Build the query string
            //         $query = http_build_query($params);
        
            //         // Send the request and get the response
            //         $response = file_get_contents("$apiUrl?$query");
        
            //         // Decode the response as JSON
            //         $responseJson = json_decode($response, true);
        
            //         // Add the translated text to the overall translated text
            //         $translatedText .= $responseJson['responseData']['translatedText'];
            //     }
        
            //     // Set up a conversation to ask for the user's name
            //     $botman->ask($translatedText, function(Answer $answer,$botman) use ($apiUrl) {
            //         // Initialize the translated text variable
            //         $translatedText = "";
        
            //         // Set the default source and target languages
            //         $source = "en";
            //         $target = "tr";
        
            //         // Check if the user's response is in a different language
            //         if (preg_match('/[^\x00-\x7F]/', $answer->getText())) {
            //             // The response is in a different language, so set the source language accordingly
            //             $source = mb_detect_encoding($answer->getText(), "UTF-8, ISO-8859-1");
            //         }
        
            //         // Break the text up into chunks of 10,000 characters or less
            //         $chunks = str_split($answer->getText(), 10000);
        
            //         // Loop through the chunks
            //         foreach ($chunks as $chunk) {
            //             // Set the parameters for the API request
            //             $params = [
            //                 "q" => $chunk,
            //                 "langpair" => "$source|$target",
            //                 "key" => "22aafffa720165c77"
            //             ];
                
            //             // Build the query string
            //             $query = http_build_query($params);
                
            //             // Send the request and get the response
            //             $response = file_get_contents("$apiUrl?$query");
                
            //             // Decode the response as JSON
            //             $responseJson = json_decode($response, true);
                
            //             // Add the translated text to the overall translated text
            //             $translatedText .= $responseJson['responseData']['translatedText'];
            //             }
                
            //             // Send the translated text back to the user
            //             $botman->reply($translatedText);
                
            //             });
            //             });


           //-----------------------------------------------E


           //-----------------------------------------------S
           
           //-----------------------------------------------E
         



        $botman->hears('video', function($botman){
              $message=OutgoingMessage::create('This is the video i like')->withAttachment(
                
                new Video('https://www.w3schools.com/html/mov_bbb.mp4'));

            $botman->reply($message);
        });

        $botman->hears('audio', function($botman){
            $message=OutgoingMessage::create('This is the audio i like')->withAttachment(
              
              new Audio('https://www.w3schools.com/html/mov_bbb.mp4'));

          $botman->reply($message);
      });


      $botman->receivesImages(function($botman,$images){
                $image = $images[0];
                $botman->reply(OutgoingMessage::create('I received your image')->withAttachment($image));
      });

        $botman->listen();
       
    }
   
    /**
     * Place your BotMan logic here.
     */


     



    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
            
            $name = $answer->getText();
   
            $this->say('Nice to meet you '.$name);
        });
    }

    

    //  public function showButtons($botman){
    //      $botman->ask('you want me to show buttons ?' , function(Answer $answer2){
            
    //          if ($answer2 == 'yes'){
    //             $this->say('sure let me show you');
    //             //   $this->ShowingTheButtons();
    //             //   $this->askImage();
    //          }
            
    //          if ($answer2 == 'no'){
    //             $this->say('okey not showing');
    //         } 
    //      });
    //  }

    //  public function ShowingTheButtons(){

    //     $question =  Question::create('want me to show some buttons ?')
    //     ->fallback('cant show the buttons')
    //     ->callbackId('buttons_showed')
    //     ->addButtons([
    //     Button::create('yes button')->value('yes'),
    //     Button::create('no button')->value('no')
    //     ]);

    //     $this->ask($question, function (Answer $answer3){
    //         if($answer3->isInteractiveMessageReply()){
    //         $selectedValue = $answer3->getValue(); // yes or no
    //         $selectedText = $answer3->getText();  // yes button or no button
    //         }
    //     });
    //  }

    //  public function askImage(){
    //     $this->askForImages('Please upload a image', function($images){

    //     },function (Answer $answer){

    //     });
    //  }

    //  public function showPhoto($botman){
    //     $show = Message::create('here you go')
    //     ->image('https://www.istockphoto.com/photos/secret-love');

    //     $botman->reply($show);
    //  }







}