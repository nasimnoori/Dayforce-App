<?php
$conn = pg_connect(getenv("postgres://izzkocpmsxkgwj:c6463f09ad3352a3879cdb6b8b274bcb2a632fd572c30ae7a50785cb92c02044@ec2-50-19-127-115.compute-1.amazonaws.com:5432/d9d3m5j1ppbsr7
"));

    var_dump($conn);

    echo "<h1>welcome to my first heroku App</h1>";
?>