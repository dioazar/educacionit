<?php

    require "class/Conexion.class.php";
    require "class/Productos.class.php";    
    require "class/Producto.class.php";
    require "class/ProductoTable.class.php";
    
    if(!isset($_POST['products'])||!sizeof($_POST['products'])){
        
        header('Location: listado.php');

    }

    try{

        $conexion   =   new Conexion(
                                    Array(
                                            'driver'=>  'mysql',
                                            'schema'=>  'test',
                                            'host'  =>  'localhost',
                                            'port'  =>  '3306',
                                            'user'  =>  'root',//NO USAR ROOT
                                            'pass'  =>  '123456'
                                    )
        );

        $productoTable  =   new ProductoTable($conexion);
        $productos      =   $productoTable->buscarPorId($_POST['products']);
        $cantProductos  =   count($productos);

    } catch (Exception $e){

        echo "<h1>Hubo un error!</h1>";
        echo "<h2>Mensaje: {$e->getMessage()}</h2>";
        echo "<h2>Codigo:{$e->getCode()}</h2>";

    }

?>
<html>
    
    <head>
        <title>Generar Pedido</title>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    </head>
    
    <body>

        <form class="container" method="POST">

            <div class="header">
                <h1>Cargar pedido</h1>
            </div>

            <div class="body">

                <div id="cliente">

                    <div class="title">
                        <h1>Datos del cliente</h1>
                    </div>

                    <div class="body">

                        <div class="field">
                            <label>Nombre</label>
                            <input type="text" name="cliente[nombre]" />
                        </div>

                        <div class="field">
                            <label>Apellido</label>
                            <input type="text" name="cliente[apellido]" />
                        </div>

                        <div class="field">
                            <label>Sexo</label>
                            <input type="text" name="cliente[sexo]" />
                        </div>

                        <div class="field">
                            <label>Tipo de documento</label>
                            <input type="text" name="cliente[tipodoc]" />
                        </div>

                        <div class="field">

                            <label>Documento</label>
                            <input type="text" name="cliente[documento]" />

                        </div>

                    </div>

                </div>

                <div id="products">

                    <h1>Listado de productos</h1>
                    <div class="list">
                        <?php foreach($productos as $producto):?>

                        <div class="product" data-product="<?php echo $producto->getId();?>">
                            <div class="name"><?php echo $producto->getNombre();?></div>
                            <div class="brand"><?php echo $producto->getMarca();?></div>
                            <div class="stock"><?php echo $producto->getStock();?></div>
                            <div class="price"><?php echo $producto->getPrecio();?></div>
                        </div>

                        <?php endforeach;?>
                    </div>
                </div>

            </div>

            <div class="footer">
                <button type="submit">Cargar pedido</button>
            </div>

        </form>
        
    </body>

</html>