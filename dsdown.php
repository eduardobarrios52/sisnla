<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
if (isset($_GET["idarc"]) ) {
    $ret = array();
    
     //single file
        $tipo = 'A';
        $status = 'A';
        
        $idses = $_GET["idarc"];
        //$idses = strstr($file_name, '_', true);
        
     
   
     
     require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

$rutadelzip2='contenidoaduanal/'.$idses.'/';
//$rutadelzip=$ruta1;
 
 



// rcopy($rutadelzip2, $rutadelzip2);
 
$ficheros1  = scandir($rutadelzip2);
//print_r($ficheros1);
               



$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("MXCLI")
        ->setLastModifiedBy("MXCLI")
        ->setTitle('MXCLI')
        ->setSubject('Aduanas')
        ->setDescription("Aduanas")
        ->setKeywords("Excel")
        ->setCategory('Aduanas');


$hojas=0;
//print_r($ficheros1);




 $objPHPExcel->setActiveSheetIndexByName('Worksheet');
$sheetIndex = $objPHPExcel->getActiveSheetIndex();
$objPHPExcel->removeSheetByIndex($sheetIndex);


if(count($ficheros1)>0){
foreach ($ficheros1 as $archivo){
   if(strlen($archivo)>4){
       if (!is_dir ( $rutadelzip2.$archivo )) {
           
           
           
            $objPHPExcel->createSheet();
       $tabla = obtenerarray($rutadelzip2.$archivo);
$objPHPExcel->setActiveSheetIndex($hojas);
$reng = 1; // 1-based index
    $col = 0;
    //$idses = strstr($file_name, '_', true);
    
    
foreach ($tabla as $rows => $row)
                    {
   for($i=0;$i<count($row);$i++){
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($i, $reng, $row[$i]);
    }
        $reng++;
}
$idsfol="";
$titulo="";
//$idsfol = strstr($archivo, '_', false);
$idsfol = pathinfo(strstr_after($archivo, '_'), PATHINFO_FILENAME);
$titulo=obtenertitulo($idsfol);
if($titulo==""){
   $titulo= $idsfol;
}else{
    $titulo= $idsfol.' '.$titulo;
}

$objPHPExcel->getActiveSheet()->setTitle(substr($titulo, 0, 30));

       
       
       
       
     $hojas++;  
       }
   }
   
}
$objPHPExcel->setActiveSheetIndex(0);
        }
 




// Redirect output to a clientâ€™s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$idses.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
            
           
            
            
            
            
            
       
        

    //$ret[] = $fileName;
}else{
    echo "no existe variable";
    
}

function strstr_after($haystack, $needle, $case_insensitive = false) {
    $strpos = ($case_insensitive) ? 'stripos' : 'strpos';
    $pos = $strpos($haystack, $needle);
    if (is_int($pos)) {
        return substr($haystack, $pos + strlen($needle));
    }
    // Most likely false or null
    return $pos;
}

function obtenertitulo($id){
    
    $tiulo="";
   if($id==501){ $tiulo='DATOS GENERALES';}
if($id==502){ $tiulo=' TRANSPORTE DE LAS MERCANCÍAS';}
if($id==503){ $tiulo=' GUIAS';}
if($id==504){ $tiulo=' CONTENEDORES';}
if($id==505){ $tiulo=' FACTURAS';}
if($id==506){ $tiulo=' FECHAS DEL PEDIMENTO';}
if($id==507){ $tiulo=' CASOS DEL PEDIMENTO';}
if($id==508){ $tiulo=' CUENTAS ADUANERAS DE GARANTÍA DEL PEDIMENTO';}
if($id==509){ $tiulo=' TASAS DEL PEDIMENTO';}
if($id==510){ $tiulo=' CONTRIBUCIONES DEL PEDIMENTO';}
if($id==511){ $tiulo=' OBSERVACIONES DEL PEDIMENTO';}
if($id==512){ $tiulo=' DESCARGO DE MERCANCÍAS';}
if($id==514){ $tiulo=' MOVIMIENTOS EN CUENTA ADUANERA';}
if($id==520){ $tiulo=' DESTINATARIOS DE LA MERCANCÍA';}
if($id==551){ $tiulo=' PARTIDAS';}
if($id==552){ $tiulo=' MERCANCÍAS';}
if($id==553){ $tiulo=' PERMISOS DE LA PARTIDA';}
if($id==554){ $tiulo=' CASOS DE LA PARTIDA';}
if($id==555){ $tiulo=' CUENTAS ADUANERAS DE GARANTÍA';}
if($id==556){ $tiulo=' TASAS DE LAS CONTRIBUCIONES DE LA PARTIDA';}
if($id==557){ $tiulo=' CONTRIBUCIONES DE LA PARTIDA';}
if($id==558){ $tiulo=' OBSERVACIONES DE LA PARTIDA';}
if($id==701){ $tiulo=' RECTIFICACIONES';}
if($id==702){ $tiulo=' DIFERENCIAS DE CONTRIBUCIONES DEL PEDIMENTO';}
    return $tiulo;
    
    /*
501 DATOS GENERALES
502 TRANSPORTE DE LAS MERCANCÍAS
503 GUIAS
504 CONTENEDORES
505 FACTURAS
506 FECHAS DEL PEDIMENTO
507 CASOS DEL PEDIMENTO
508 CUENTAS ADUANERAS DE GARANTÍA DEL PEDIMENTO
509 TASAS DEL PEDIMENTO
510 CONTRIBUCIONES DEL PEDIMENTO
511 OBSERVACIONES DEL PEDIMENTO
512 DESCARGO DE MERCANCÍAS
514 MOVIMIENTOS EN CUENTA ADUANERA
520 DESTINATARIOS DE LA MERCANCÍA
551 PARTIDAS
552 MERCANCÍAS
553 PERMISOS DE LA PARTIDA
554 CASOS DE LA PARTIDA
555 CUENTAS ADUANERAS DE GARANTÍA
556 TASAS DE LAS CONTRIBUCIONES DE LA PARTIDA
557 CONTRIBUCIONES DE LA PARTIDA
558 OBSERVACIONES DE LA PARTIDA
701 RECTIFICACIONES
702 DIFERENCIAS DE CONTRIBUCIONES DEL PEDIMENTO
SELECCIÓN AUTOMATIZADA
INCIDENCIAS DEL RECONOCIMIENTO ADUANERO
     */
    
    
    
}


function obtenerarray($archivo) {


    $archivo = fopen($archivo, 'r');

    while ($linea = fgets($archivo)) {
        //$linea = str_replace("| \n", '', $linea);
        $data = explode("|", $linea);
        $contador = count($data);
        $tabla[] = $data;
    }
//print_r($tabla);
    fclose($archivo);
    return $tabla;
}

function verificaext($nombre) {
    $path_parts = pathinfo($nombre);
    $extension = $path_parts['extension'];
    return $extension;
}



   // Function to remove folders and files 
    function rrmdir($dir) {
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file)
                if ($file != "." && $file != "..") rrmdir("$dir/$file");
            rmdir($dir);
        }
        else if (file_exists($dir)){ 
            //unlink($dir);
            
        }
    }

    // Function to Copy folders and files       
    function rcopy($src, $dst) {/*
        if (file_exists ( $dst )){
        rrmdir ( $dst );
        
        }
        if (is_dir ( $src )) {
            $save = umask(0);
             @chmod($src, 0777);
            umask($save);
            echo $src.'<br>';
           // mkdir ( $dst );
            $files = scandir ( $src );
            foreach ( $files as $file ){
                echo $file.'<br>';
                if ($file != "." && $file != ".."){
            rcopy ( "$src/$file", "$dst/$file" );
                }
            }
        } else if (file_exists ( $src )){
        copy ( $src, $dst );}
     
     */
        $ficheros1  = scandir($src);
        //print_r($ficheros1);
        foreach ($ficheros1 as $archivo){
            
            if ($archivo == "." || $archivo == ".."){
                
            }else{
            //rcopy ( "$src/$file", "$dst/$file" );
             if (is_dir ( "$src/$archivo" )) {
                 rcopy("$src/$archivo/", $dst);
                 // echo "$src/$archivo" .' es directorio<br>';
             }
             else if (file_exists ( "$src/$archivo" )){
        rename ( "$src/$archivo", "$dst/$archivo" );
         //echo $archivo .'es archivo<br>';
       // echo 'copiar '.$archivo .' a '.$dst.'<br>';
             }
            
                }
        }
    }
    
    
     function recurse_copy($src,$dst) { 
        $dir = opendir($src); 
        @mkdir($dst); 
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                } 
                else { 
                    //copy($src . '/' . $file,$dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
    } 
exit;
