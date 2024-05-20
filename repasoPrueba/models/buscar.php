<?php
include_once 'conexion.php';

class CrudBuscar {
    public static function buscarProducto($id_producto) {
        $conexion = new conexion();
        $con = $conexion->conectar();

        $sql = "
            SELECT 
                p.nombre, 
                p.precio, 
                b.id_bodega,
                b.ubicacion 
            FROM 
                producto p 
            JOIN 
                bodega b 
            ON 
                p.id_bodega_per = b.id_bodega 
            WHERE 
                p.id_producto = :id_producto
        ";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_STR);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            echo json_encode($producto);
        } else {
            echo json_encode(["error" => "No se encontró el producto con ID: " . htmlspecialchars($id_producto)]);
        }
    }
}
?>
