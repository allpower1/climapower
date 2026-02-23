<?php
/**
 * Script de prueba Flow (sandbox)
 * Ejecutar: php flow_test.php
 */

$apiKey = "1F125EBD-9837-4B47-B2F5-4D7BL2C09A44";     // reemplaza con el tuyo
$secretKey = "1c46a514edbbacec6fe69ad1b6c69e1fdab19b42";      // reemplaza con el tuyo
$urlApi = "https://flow.cl/api/payment/create";

// ----------------------
// 1. Parámetros de pago
// ----------------------
$params = [
    "apiKey"           => $apiKey,
    "commerceOrder"    => "ORD" . rand(1000, 9999),
    "subject"          => "Pago de prueba",
    "amount"           => 1000,
    "currency"         => "CLP",
    "email"            => "moysscuevas@gmail.com",
    "urlConfirmation"  => "https://tuladovip.cl/flow/return",
    "urlReturn"        => "https://tuladovip.cl/flow/return",
    "paymentMethod"    => 9,
    "optional"         => "test",
    "timeout"          => 0,
    // "merchantId"     => "Merchant123456", // solo si eres integrador
    "payment_currency" => "CLP"
];

echo "=== PARAMS ORIGINALES ===<br>";
print_r($params);

// 1) Ordenar
ksort($params, SORT_STRING);
echo "<br>=== PARAMS ORDENADOS ===<br>";
print_r($params);

// 2) Concatenar clave+valor
$strToSign = '';
foreach ($params as $k => $v) {
    $strToSign .= $k . strval($v);
}
echo "<br>=== STRING A FIRMAR ===<br>";
echo $strToSign . "<br>";

// 3) Firmar con secretKey
$signature = hash_hmac('sha256', $strToSign, $secretKey, false);
echo "<br>=== SIGNATURE (s) ===<br>";
echo $signature . "<br>";

// 4) Agregar la firma al body final
$params['s'] = $signature;
echo "<br>=== BODY FINAL (con s) ===<br>";
print_r($params);

// 5) Enviar request
$ch = curl_init('https://sandbox.flow.cl/api/payment/create');
curl_setopt_array($ch, [
  CURLOPT_POST           => true,
  CURLOPT_HTTPHEADER     => ['Content-Type: application/x-www-form-urlencoded'],
  CURLOPT_POSTFIELDS     => http_build_query($params, '', '&'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT        => 30,
]);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error    = curl_error($ch);
curl_close($ch);

echo "<br><br>=== RESPUESTA DE FLOW ===<br>";
if ($error) {
    echo "cURL error: $error<br>";
} else {
    echo "HTTP $httpCode<br>$response<br>";
}


/*
// ----------------------
// 2. Generar firma (s)
// ----------------------
ksort($params); // ordenar alfabéticamente
$baseString = http_build_query($params, '', '&');
$params["s"] = hash_hmac("sha256", $baseString, $secret);

// ----------------------
// 3. Enviar request
// ----------------------
$options = [
    CURLOPT_URL => $urlApi,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($params),
];

$ch = curl_init();
curl_setopt_array($ch, $options);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// ----------------------
// 4. Resultado
// ----------------------
echo "HTTP Code: $httpCode\n";
echo "Respuesta:\n$response\n";
*/
