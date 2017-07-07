<?php

$dsn = 'mysql:host=localhost;dbname=varchar_madness';
$user = 'varchar_madness';
$pass = 'varchar_madness';

echo "Connecting to the database...\n";

$dbh = new \PDO($dsn, $user, $pass);

echo "Reseting table...\n";

$dbh->exec('DROP TABLE IF EXISTS varchar_madness');
$dbh->exec('CREATE TABLE varchar_madness (col_1 VARCHAR(255))');

echo "Creating columns...\n";

for ($i = 2;; $i += 1) {
    $row_count = $dbh->exec("ALTER TABLE varchar_madness ADD COLUMN col_$i VARCHAR(255)");

    if ($row_count === FALSE) {
        echo "Failed to create column #$i with the following error:\n";
        echo $dbh->errorInfo()[2] . "\n";
        break;
    }
}
