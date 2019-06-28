<?php
foreach(PDO::getAvailableDrivers() as $driver)
    {
    echo $driver.'<br />';
    }
	
//var_dump(PDO::getAvailableDrivers());
?>