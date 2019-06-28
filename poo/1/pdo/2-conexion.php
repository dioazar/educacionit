<?php


	$hostname 	=	'localhost';
	$username 	= 	'root';
	$password	= 	'';
	$dbname 	= 	'comercioit';
	
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
	
	$x = $dbh->prepare("select * from paises");
	$x->execute();
	
	$result = $x->fetch(PDO::FETCH_ASSOC);

    echo $result[pais] ."<br>";	
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>


					<?php
					try {
						$conn= new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
						//$conn = con_pdo();
					}
					catch(PDOException $e){
						echo $error_mysql = $sql . '<br />' . $e->getMessage();
					}

					$stmt = $conn->prepare("SELECT * FROM paises ORDER by pais");
					$stmt->execute();
					
                    ?>
                    
                    <select name="pais"  class="formInscripcion" id="pais" onchange="javascript: cmbpais();" style="width:108px; float:left;">
                        <option value="0">Seleccione un Pa&iacute;s</option>
                    <?php
                    while ($v = $stmt->fetch()){
                        ?> <option value="<?= $v[id]; ?>" <? if($v[id]=="13") echo "selected='selected'"; ?>><?= $v[pais] ?></option> <?php
                    } ?>
                    </select>
      