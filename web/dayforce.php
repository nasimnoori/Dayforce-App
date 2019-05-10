<?php

/**
 * Start Notes
 */

 // Sunils XRefCode: 991465


 // Get most recent API Version URL
 // ------------------------------

 // Call this url at least ONCE a day if URL is stored : https://www.dayforcehcm.com/api/<clientName>/V1/ClientMetadata
 // This will return the most recent API Version URL :

 // {
 // "ServiceVersion":"52.x.x.x",
 // "ServiceUri":"https://www.dayforcehcm.com/52/api"
 // }


 // IsValidateOnly (boolean)
 // ------------------------------

 // Used to specify that all of the validations need to be performed without committing any
 // changes.
 // Use this parameter to control whether committing information to your instance of Dayforce is
 // your responsibility. See the Important note above.
 // The URL syntax is:
 // https:// www.dayforcehcm.com/DevHRPR/api/DevHRPR34/V1/Employees?isValidateOnly=true




/**
 * End Notes
 */


require_once '../vendor/autoload.php';

function connect($url, $query, $headers) {

    Unirest\Request::curlOpts([
        CURLOPT_FOLLOWLOCATION => true,
        // CURLOPT_AUTOREFERER => true,
        // CURLOPT_COOKIESESSION => true,
        CURLOPT_UNRESTRICTED_AUTH => true,
    ]);
    Unirest\Request::auth('SDI_Web_Services', 'Sdi123');
/*
    $response = Unirest\Request::get($url, $headers, $query);
    $resp['code'] = $response->code;
    $resp['headers'] = $response->headers;
    $resp['body'] = $response->body;

    return json_encode($resp, JSON_PRETTY_PRINT);
*/
    return Unirest\Request::get($url, $headers, $query);

    // $response->code;        // HTTP Status code
    // $response->headers;     // Headers
    // $response->body;        // Parsed body
    // $response->raw_body;    // Unparsed body

    // return json_encode($response, JSON_PRETTY_PRINT);
}
$headers = array('Accept' => 'application/json');
//$query = array('IS_VALIDATE_ONLY' => true, 'EmploymentStatus' => "ACTIVE", 'IncludeSubordinateObjects' => true);
$url = 'https://test.dayforcehcm.com/api/sdi/v1/Reports/EMPRAWPUNCHNEW';
//$url = 'https://test.dayforcehcm.com/api/sdi/v1/EmployeesPunches?filtertransactionTimeEndUtc=2019-01-21&filtertransactionTimeStartUtc=2019-01-01&EmployeeXRefCode=991465';
//$url = 'https://test.dayforcehcm.com/api/sdi/v1/EmployeesPunches?filtertransactionTimeEndUtc=2019-01-21&filtertransactionTimeStartUtc=2019-01-01&EmployeeXRefCode=30896'
//$query = array(EmploymentStatus = "ACTIVE", IncludeSubordinateObjects = false);
// $result = connect('https://www.dayforcehcm.com/api/sdi/v1/Employees/991465', ['IS_VALIDATE_ONLY' => true, 'EmployeeXRefCode' => 991465]);
$result = connect($url, $query = '', $headers);

var_dump($result);
//echo $result['body']['Data'];
//$data = $result->body->Data;
//var_dump($data);
//foreach($data as $key => $value){
//    echo "{$key} => {$value} ";
//}
