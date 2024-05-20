<?php
include_once '../models/buscar.php';

header('Content-Type: application/json');

$opc = $_SERVER['REQUEST_METHOD'];

switch ($opc) {
    case 'GET':
        if (isset($_GET['id_producto'])) {
            $id_producto = $_GET['id_producto'];
            $resultado = CrudBuscar::buscarProducto($id_producto);
            if ($resultado) {
                echo json_encode($resultado);
            } else {
                echo json_encode(["error" => "Producto no encontrado."]);
            }
        } else {
            echo json_encode(["error" => "Por favor, proporcione un ID de producto."]);
        }
        break;
    default:
        echo json_encode(["error" => "Método no soportado."]);
        break;
}
?>
