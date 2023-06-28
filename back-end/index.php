<?php
require "./vendor/autoload.php";
$router = new \Bramus\Router\Router();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router->get('/getcampers', function () {
    $conect =  new \Apps\connect();
    $res = $conect->con->prepare("SELECT * FROM campers");
    try {
        $row = $res->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});


$router->delete('/deletecampers', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "DELETE FROM campers WHERE  idCamper= :id";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
});

$router->post('/postcampers', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "INSERT INTO campers (nombreCamper, apellidoCamper,fechaNac,idReg) VALUES (:nombreCamper, :apellidoCamper, :fechaNac, :idReg)";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':nombreCamper', $data['nombreCamper']);
        $stmt->bindParam(':apellidoCamper', $data['apellidoCamper']);
        $stmt->bindParam(':fechaNac', $data['fechaNac']);
        $stmt->bindParam(':idReg', $data['idReg']);
        $stmt->execute();
        print_r("Inserted");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});

$router->put('/putcamper', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "UPDATE campers SET  nombreCamper=: nombreCamper,  apellidoCamper=:apellidoCamper, fechaNac=:fechaNac,idReg=:idReg WHERE  idCamper=:id";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':nombreCamper', $data['nombreCamper']);
        $stmt->bindParam(':apellidoCamper', $data['apellidoCamper']);
        $stmt->bindParam(':fechaNac', $data['fechaNac']);
        $stmt->bindParam(':idReg', $data['idReg']);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});

$router->get('/getdepertamentos', function () {
    $conect =  new \Apps\connect();
    $res = $conect->con->prepare("SELECT * FROM departamento");
    try {
        $row = $res->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});


$router->delete('/deletedepartamentos', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "DELETE FROM departamento WHERE   idDep= :id";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
});

$router->post('/postdepartamentos', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "INSERT INTO departamento(nombreDep, idPais) VALUES (:nombreDep, :idPais)";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':nombreDep', $data['nombreDep']);
        $stmt->bindParam(':idPais', $data['idPais']);
        $stmt->execute();
        print_r("Inserted");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});

$router->put('/putdepartamento', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "UPDATE departamento SET  nombreDep=: nombreDep,idPais=:idPais WHERE   idDep=:id";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':nombreDep', $data['nombreDep']);
        $stmt->bindParam(':idPais', $data['idPais']);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});


$router->delete('/deletedepertamentos', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "DELETE FROM departamento WHERE idDep= :id";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
});

$router->post('/postdepertamentos', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "INSERT INTO departamento (nombreCamper, apellidoCamper,fechaNac,idReg) VALUES (:nombreCamper, :apellidoCamper, :fechaNac, :idReg)";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':nombreCamper', $data['nombreCamper']);
        $stmt->bindParam(':apellidoCamper', $data['apellidoCamper']);
        $stmt->bindParam(':fechaNac', $data['fechaNac']);
        $stmt->bindParam(':idReg', $data['idReg']);
        $stmt->execute();
        print_r("Inserted");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});

$router->put('/putdepertamentos', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "UPDATE departamento SET  nombreCamper=: nombreCamper,  apellidoCamper=:apellidoCamper, fechaNac=:fechaNac,idReg=:idReg WHERE  idCamper=:id";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':nombreCamper', $data['nombreCamper']);
        $stmt->bindParam(':apellidoCamper', $data['apellidoCamper']);
        $stmt->bindParam(':fechaNac', $data['fechaNac']);
        $stmt->bindParam(':idReg', $data['idReg']);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});

$router->get('/getpaises', function () {
    $conect =  new \Apps\connect();
    $res = $conect->con->prepare("SELECT * FROM pais");
    try {
        $row = $res->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
    // $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post('/postpaises', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "INSERT INTO pais(nombrePais) VALUES (:nombrePais)";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':nombrePais', $data['nombrePais']);
        $stmt->execute();
        print_r("Inserted");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});


$router->put('/putpaises', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "UPDATE pais SET  nombrePais=:nombrePais WHERE  idPais=:idPais";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':idPais', $data['idPais']);
        $stmt->bindParam(':nombrePais', $data['nombrePais']);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});

$router->delete('/deletepaises', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "DELETE FROM pais WHERE  idPais= :idPais";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':idPais', $data['idPais']);
        $stmt->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
});

$router->get('/getregiones', function () {
    $conect =  new \Apps\connect();
    $res = $conect->con->prepare("SELECT * FROM region");
    try {
        $row = $res->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
    // $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});


$router->get('/getregiones', function () {
    $conect =  new \Apps\connect();
    $res = $conect->con->prepare("SELECT * FROM region");
    try {
        $row = $res->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
    // $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post('/postregiones', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "INSERT INTO region(nombreReg,idDep) VALUES (:nombreReg,:idDep)";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':nombreReg', $data['nombreReg']);
        $stmt->bindParam(':idDep', $data['idDep']);
        $stmt->execute();
        print_r("Inserted");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});


$router->put('/putregiones', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "UPDATE region SET  nombrePais=:nombrePais WHERE idReg=:idReg";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':idReg', $data[' idReg']);        
        $stmt->bindParam(':nombreReg', $data['nombreReg']);
        $stmt->bindParam(':idDep', $data['idDep']);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});

$router->delete('/deleteregiones', function () {
    try {
        $connect = new \Apps\connect();
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "DELETE FROM region WHERE   idReg= : idReg";
        $stmt = $connect->con->prepare($sql);
        $stmt->bindParam(':idReg', $data[' idReg']);
        $stmt->execute();
    } catch (\PDOException $e) {
        print_r($e->getMessage());
    }
});


// Run it!
$router->run();
