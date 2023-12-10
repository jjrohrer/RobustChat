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
// From https://github.com/orhanerday/open-ai#stream-example
header('Content-type: text/stream');
header('Cache-Control: no-cache');
print <<<html
    Prompt: $prompt
    <br>
    Answer:
html;

$open_ai->chat($opts, function ($curl_info, $data) use (&$deltaText) {
    echo $data . "<br><br>";
    echo PHP_EOL;
    ob_flush();
    flush();
    return strlen($data);
});




