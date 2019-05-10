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

//To Print raw json object
//var_dump($result['body']);
$res = json_decode($result, true);
$rows = $res['body']['Data']['Rows'];

foreach ($rows as $row) {
    echo $row['Employee_XRefCode'];
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>