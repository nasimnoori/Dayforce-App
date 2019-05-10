<?php
require_once '../vendor/autoload.php';

function connect($url, $query, $headers) {

    Unirest\Request::curlOpts([
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_UNRESTRICTED_AUTH => true,
    ]);
    Unirest\Request::auth('SDI_Web_Services', 'Sdi123');

    $response = Unirest\Request::get($url, $headers, $query);
    $resp['code'] = $response->code;
    $resp['headers'] = $response->headers;
    $resp['body'] = $response->body;

    return json_encode($resp, JSON_PRETTY_PRINT);
}
$headers = array('Accept' => 'application/json');
$url = 'https://test.dayforcehcm.com/api/sdi/v1/Reports/EMPRAWPUNCHNEW';

$result = connect($url, $query = '', $headers);

var_dump($result);