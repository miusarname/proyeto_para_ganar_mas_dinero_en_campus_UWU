<?php 
require "../vendor/autoload.php";
// Create Router instance
$router = new \Bramus\Router\Router();

$router->get('/get', function() {
    $conect =  new \Apps\connect();
$res = $conect->con->prepare("SELECT * FROM tb_camper");
try{
    $row = $res->execute();
}catch(\PDOException $e){
    print_r($e->getMessage());
}
// $res->execute();
$res=$res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($res);
});

// Run it!
$router->run();
