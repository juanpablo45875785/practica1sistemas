<?php
echo ("<h1>indexado</h1><br>");

$indexado = array("juan<br>", "maria<br>", "david<br>");
echo $indexado[0];
echo $indexado[1];
echo $indexado[2];

echo ("<h1>asociativo</h1><br>");
$asociativos = array("nombre" => "juan", "apellido" => "cruz", "edad" => 22);
echo $asociativos["nombre"]. "<br>";
echo $asociativos["apellido"]. "<br>";
echo $asociativos["edad"]. "<br>";

echo ("<h2>cuenta los elementos que hay en un array </h2>");

$fruta = array("manzana", "pera", "sandia", "uva");
echo count($fruta);

echo ("<h2>añade un elemento al final</h2>");

$fruta = array("manzana", "pera", "sandia", "uva");
array_push($fruta, "platano");
print_r($fruta);

echo ("<h1>elimina el ultima valor</h1><br>");
$nombre= array("juan", "ana", "mario","pablo");
echo array_pop($nombre); 
print_r($nombre);

echo ("<h1>mustra las clave de un array asociativo</h1><br>");
$keys = array_keys($asociativos);
print_r($keys);


echo ("<h1>mostrar</h1><br>");

$indexad = array("juan<br>", "maria<br>", "david<br>");
//foreach($indexad as $uno){
    for($i=0; $i < count($indexad); $i++){
    echo $indexad[$i]."<br>";
}



?>