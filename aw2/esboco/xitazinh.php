<?php
$fim=0;
$menino=array(
    array("nome"=>"joao","idade"=>12),
    array("nome"=>"marcos","idade"=>13),
    array("nome"=>"leite","idade"=>14)
);
for($i=0;$i<count($menino);$i++){
    for($j=1;$j<count($menino);$j++){
        if($menino[$i]["idade"]<$menino[$i]["idade"]){
        
        echo $menino[$i]["nome"]; }
    }
}

?>