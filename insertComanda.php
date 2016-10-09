<?php
    $user = "postgres";
    $pass = "1234";
    
    $numero = $_GET['numero'];
    $mesa = $_GET['mesa'];
    $preco = $_GET['preco'];

    try {
        $dbh = new PDO('pgsql:host=localhost;dbname=postgres', $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbh->prepare('INSERT INTO comandas (numero, mesa, preco) VALUES (:numero, :mesa, :preco)');
        $sth->bindParam(":numero", $numero);
        $sth->bindParam(":mesa", $mesa);
        $sth->bindParam(":preco", $preco);
        if($sth->execute() && ($sth->rowCount()>0))
            exit("success");

        $dbh=null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
?>