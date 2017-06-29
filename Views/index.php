<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compu Negocios</title>
</head>
<body>
     <h3>Login</h3>

     <a href="add_producto.php">Agregar Productos</a>
     <?php
     require "../Models/add_producto.class.php";
     $producto = new Producto();
     ?>
</body>
</html>