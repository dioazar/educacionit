<?php

    require "class/Conexion.class.php";
    require "class/Productos.class.php";    
    require "class/Producto.class.php";
    require "class/ProductoTable.class.php";

    $cantProductos  =   0;
    
    if(isset($_GET['producto'])){

        try{

            $conexion   =   new Conexion(
                                        Array(
                                            'driver'=>  'mysql',
                                            'schema'=>  'comercioit',
                                            'host'  =>  'localhost',
                                            'port'  =>  '3306',
                                            'user'  =>  'root',//NO USAR ROOT
                                            'pass'  =>  ''
                                        )
            );
            
            $productoTable  =   new ProductoTable($conexion);
            $productos      =   $productoTable->buscarPorNombre($_GET['producto']);
            $cantProductos  =   count($productos);

        } catch (Exception $e){

            echo "<h1>Hubo un error!</h1>";
            echo "<h2>Mensaje: {$e->getMessage()}</h2>";
            echo "<h2>Codigo:{$e->getCode()}</h2>";

        }

    }
?>
<html>
    
    <head>
        <title>Consulta de productos</title>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/producto.js"></script>
    </head>
    
    <body>

        <form method="GET" action="">
            <input type="text" name="producto" placeholder="Ingrese el nombre o parte del nombre de un producto... " />
            <input type="submit" value="Consultar" />
        </form>

        <br />
        
        <?php if($cantProductos): ?>
            <h1>Se encontraron <?php echo $cantProductos;?> Resultados</h1>
            <form id="basket" method="POST" action="pedido.php">
                <div class="items"></div>
                <div class="elements"><p class="legend">Seleccione productos de la lista</p></div>
                <div class="total"><div class="text">Total: $</div><div class="num">0</div></div>
                <input type="submit" class="generar" value="Generar pedido" />
            </form>

            <div id="products">

                <div class="product header">
                    <div class="icon"></div>
                    <div class="name">Nombre</div>
                    <div class="brand">Marca</div>
                    <div class="stock">Stock</div>
                    <div class="price">Precio</div>
                </div>

                <?php foreach($productos as $producto):?>
<pre><?php var_dump($producto) ?></pre>
                <div class="draggable">

                    <div class="product" data-product="<?php echo $producto->getId();?>" id="product_<?php echo $producto->getId();?>">
                        <div class="icon">
                            <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                        </div>
                        <div class="name"><?php echo $producto->getNombre();?></div>
                        <div class="brand"><?php echo $producto->getMarca();?></div>
                        <div class="stock"><?php echo $producto->getStock();?></div>
                        <div class="price"><?php echo $producto->getPrecio();?></div>
                    </div>
                </div>

                <?php endforeach;?>
            </div>
        <?php endif;?>
        <hr />

    </body>

</html>