<?php

// Get the user input from the request
$input = $_POST['input'];

// Make a request to the GPT-3.5 model using the OpenAI API
$apiKey = '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'; // Replace with your actual API key
$url = 'https://api.openai.com/v1/engines/davinci-codex/completions';
$data = array(
    'prompt' => $input,
    'max_tokens' => 100,
);
$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Parse the response and get the generated text
$responseData = json_decode($response, true);
$generatedText = $responseData['choices'][0]['text'];

// Return the generated text as the response
echo $generatedText;
