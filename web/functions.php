<?php
public function insertData($punches) {
        $sql = 'INSERT INTO postgresql-shallow-46916(XRefCode,firstName, lastName, punchType, dateTime, locLong, locLat, locAcc) ';
        $sql += 'VALUES(:code,:first,:last,:type,:date,:long,:lat,:acc)';
        $stmt = $this->pdo->prepare($sql);
 
        $idList = [];
        foreach ($punches as $punch) {
            $stmt->bindValue(':code', $punch['Employee_XRefCode']);
            $stmt->bindValue(':first', $punch['Employee_FirstName']);
            $stmt->bindValue(':last', $punch['Employee_LastName']);
            $stmt->bindValue(':type', $punch['PunchType_ShortName']);
            $stmt->bindValue(':date', $punch['EmployeeRawPunch_RawPunchTime']);
            $stmt->bindValue(':long', $punch['EmployeeRawPunchGeoLocation_Longitude']);
            $stmt->bindValue(':lat', $punch['EmployeeRawPunchGeoLocation_Latitude']);
            $stmt->bindValue(':acc', $punch['EmployeeRawPunchGeoLocation_Accuracy']);
            $stmt->execute();
            $idList[] = $this->pdo->lastInsertId('Employee_XRefCode');
        }
        return $idList;
}





public function getData() {
    $headers = array('Accept' => 'application/json');
    $url = 'https://test.dayforcehcm.com/api/sdi/v1/Reports/EMPRAWPUNCHNEW';
    $result = connect($url, $query = '', $headers);
    $res = json_decode($result, true);
    
    return $res;
    // it returns an array of objects to get the punch data => $res['body']['Data']['Rows']
}





public function connect($url, $query, $headers) {
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

?>