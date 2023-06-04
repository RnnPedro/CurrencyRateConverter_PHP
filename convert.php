<?php

$amount = floatval($_POST['amount']);
$currency_from = $_POST['select_from'];
$currency_to = $_POST['select_to'];

$curl = curl_init();
            
curl_setopt($curl, CURLOPT_URL, 'https://v6.exchangerate-api.com/v6/7709a56432f812b2ec85bb9f/latest/' . $currency_from);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$server_response = curl_exec($curl);

curl_close($curl);

$server_response = json_decode($server_response, true);
$conversion_rates = $server_response["conversion_rates"];

if (isset($conversion_rates[$currency_to])){
    $to_rate = $conversion_rates[$currency_to];
    $response = "The Conversion is: " . floatval($to_rate) * $amount ." " . $currency_to;
} else {
    $response = "Currency not found";
}

echo $response;
?>