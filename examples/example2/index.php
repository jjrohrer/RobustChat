<?php
declare(strict_types=1);
require_once ('../../vendor/autoload.php');

$prompt = 'What is life';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../'); // For pulling our OPEN_AI_KEY out of `.env`
$dotenv->load();

$open_ai = new Orhanerday\OpenAi\OpenAi($_ENV['OPEN_AI_KEY']); // <-- INPUT
$open_ai->setORG($_ENV['OPEN_AI_KEY_FOR_ORGANIZATION']); // <-- INPUT
$messages = [
    ...[],
    [
        'role' => 'user',
        'content' => $prompt // <-- INPUT. This is the question we are asking open AI
    ]];

$opts = [
    'messages' => $messages,
    'temperature' => 0.9,
    "max_tokens" => 150,
    "frequency_penalty" => 0,
    "presence_penalty" => 0.6,
    "stream" => true, // <--- DELTA
    'model' => 'gpt-3.5-turbo',
];

// --- DELTA
header('Content-type: text/event-stream');
header('Cache-Control: no-cache');
print "Prompt: $prompt
<br>
Answer: ";

// $response_asJson = $open_ai->chat($opts); // Old blocking method
$open_ai->chat($opts, function ($curl_info, $data) use (&$deltaText) {
    echo $data . "<br><br>";
    echo PHP_EOL;
    ob_flush();
    flush();
    return strlen($data);
});

// $response = json_decode($response_asJson);


//$answer = $response->choices[0]->message->content;
?>
<div id="divID">Streaming Answer Will Be Seen Here</div>
<script>
    var eventSource = new EventSource("/");
    var div = document.getElementById('divID');


    eventSource.onmessage = function (e) {
        if(e.data == "[DONE]")
        {
            div.innerHTML += "<br><br> (Done)";
        }
        div.innerHTML += JSON.parse(e.data).choices[0].text;
    };
    eventSource.onerror = function (e) {
        console.log(e);
    };
</script>


