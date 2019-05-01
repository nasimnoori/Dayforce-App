<?php
$conn = pg_connect(getenv("DATABASE_URL"));

var_dump($conn);

    echo "<h1>welcome to my first heroku App</h1>";
?>