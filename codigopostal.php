<?php
header('Content-Type: application/json');
include 'conexion.php';
$codigo = $_GET['CodigoPostal'];

$consultanot = 'select * from codpos where c_CodigoPostal =\''.$codigo.'\'';

$res = array();

    $resreg = $mysqli->query($consultanot);
    $numrem = $resreg->num_rows;
    if ($numrem >= 1) {
        while ($rs = $resreg->fetch_assoc()) {

            $consultae = 'select * from Estados where c_Estado =\''.$rs['c_Estado'].'\'';
            $rese = $mysqli->query($consultae);
                $nume = $rese->num_rows;
                if ($nume >= 1) {
                    while ($rse = $rese->fetch_assoc()) {
                        $res['edo'][$rs['c_Estado']] = $rse['nombre'];
                    }
                }else{
                    $res['edo'] = '';
                }
            
            $res['loc'] = '';
            $consultal = 'select * from Localidad where c_Localidad =\''.$rs['c_Localidad'].'\'';
            if($resl = $mysqli->query($consultal)){
                $numl = $resl->num_rows;
                if ($numl>= 1) {
                    while ($rsl = $resl->fetch_assoc()) {
                        $res['loc'][$rsc['c_Localidad']] = $rsl['nombre'];
                    }
                }
            }
            
            $res['mun'] = '';
            $consultam = 'select * from municipios where c_Municipio =\''.$rs['c_Municipio'].'\' and c_Estado = \''.$rs['c_Estado'].'\'';
            if($resm = $mysqli->query($consultam)){
                $numm = $resm->num_rows;
                if ($numm>= 1) {
                    while ($rsm = $resm->fetch_assoc()) {
                        $res['mun'][$rsm['c_Municipio']] = $rsm['descripcion'];
                    }
                }
            }

            
            $consultacol = 'SELECT * FROM colonias c where c_CodigoPostal = \''.$codigo.'\'';
            $resc = $mysqli->query($consultacol);
                $numc = $resc->num_rows;
                if ($numc>= 1) {
                    while ($rsc = $resc->fetch_assoc()) {
                        $res['cod'][$rsc['c_Colonia']] = ['nombre'];
                    }
                }else{
                    $res['cod'][0] = '';
                }

        }
    }

    echo json_encode($res);

?>