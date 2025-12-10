<?php

// Test the chatbot API directly
$url = 'http://127.0.0.1:8000/api/v1/chatbot/chat';

$data = [
    'message' => 'Is MBA good?'
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: $httpCode\n";
echo "Response:\n";
echo $response . "\n\n";

$result = json_decode($response, true);
if ($result) {
    echo "Message: " . substr($result['response'], 0, 200) . "...\n";
    echo "Programs shown: " . count($result['programs']) . "\n";
    echo "Suggestions: " . implode(', ', array_slice($result['suggestions'], 0, 3)) . "\n";
}
