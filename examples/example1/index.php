<?php
declare(strict_types=1);
require_once ('../../vendor/autoload.php');

 $prompt = 'What is life';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();


/** See https://github.com/orhanerday/open-ai
 * Note: This client is different than https://github.com/openai-php/client
 */

$open_ai = new Orhanerday\OpenAi\OpenAi($_ENV['OPEN_AI_KEY']); // <-- INPUT
$open_ai->setORG($_ENV['OPEN_AI_KEY_FOR_ORGANIZATION']); // <-- INPUT
$messages = [
    ...[], //<-- Following the pattern below, you would put previous messages here
    [
        'role' => 'user', // Ai_AbstractBase::SNUM_ROLE_user
        'content' => $prompt // <-- INPUT. This is the question we are asking open AI
    ]];

$opts = [
    'messages' => $messages,
    'temperature' => 0.9,
    "max_tokens" => 150,
    "frequency_penalty" => 0,
    "presence_penalty" => 0.6,
    "stream" => false,
    'model' => 'gpt-3.5-turbo',// This is the openAi model we want it to use
];
$response_asJson = $open_ai->chat($opts);
$response = json_decode($response_asJson);


$answer = $response->choices[0]->message->content;
print <<<html
Prompt: $prompt
<br>
Answer: $answer
html;
