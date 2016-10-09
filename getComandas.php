<?php

$user = "postgres";
$pass = "1234";
    try {
        $dbh = new PDO('pgsql:host=localhost;dbname=postgres', $user, $pass);
        $sth = $dbh->prepare('SELECT * from comandas');
        $sth->execute();
        $result = $sth->fetchAll();
        print_r(json_encode($result));
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>