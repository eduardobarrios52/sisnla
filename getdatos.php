<?php
include 'conexion.php';
$tipo = $_GET['tipo'];
$id = $_GET['id'];
$resp = array();
if($tipo == 'empresa'){
    $consulta = "SELECT * FROM empresa where idempresa = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['nombre'] =$res['nombre'];
            $resp['rfc'] = $res['rfc'];
            $resp['nocertificado'] = $res['nocertificado'];
            $resp['certificado'] = $res['certificado'];
            $resp['regimenfiscal'] = $res['regimenfiscal'];
            $resp['usuariopac'] = $res['usuariopac'];
            $resp['contrapac'] = $res['contrapac'];
            $resp['nombrepac'] = $res['nombrepac'];
        }
    }
}else if($tipo == 'sucursal'){
    $consulta = "SELECT * FROM sucursal where idsucursal = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['nombre'] =$res['nombre'];
            $resp['rfc'] = $res['empresa'];
            $resp['serie'] = $res['serie'];
            $resp['folio'] = $res['folio'];
            $resp['cp'] = $res['cp'];
        }
    }
}else if($tipo == 'operadores'){
    $consulta = "SELECT * FROM operadores where idoperadores = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['NombreOperador'] =$res['NombreOperador'];
            $resp['RFCOperador'] = $res['RFCOperador'];
            $resp['NumLicencia'] = $res['NumLicencia'];
            $resp['Calle'] = $res['Calle'];
            $resp['NumeroExterior'] = $res['NumeroExterior'];
            $resp['NumeroInterior'] = $res['NumeroInterior'];
            $resp['Colonia'] = $res['Colonia'];
            $resp['Localidad'] = $res['Localidad'];
            $resp['Referencia'] = $res['Referencia'];
            $resp['Municipio'] = $res['Municipio'];
            $resp['Estado'] = $res['Estado'];
            $resp['Pais'] = $res['Pais'];
            $resp['CodigoPostal'] = $res['CodigoPostal'];
        }
    }
}else if($tipo == 'notificado'){
    $consulta = "SELECT * FROM notificado where idnotificado = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['NombreNotificado'] =$res['NombreNotificado'];
            $resp['NumRegIdTribNotificado'] = $res['NumRegIdTribNotificado'];
            $resp['ResidenciaFiscalNotificado'] = $res['ResidenciaFiscalNotificado'];
            $resp['Calle'] = $res['Calle'];
            $resp['NumeroExterior'] = $res['NumeroExterior'];
            $resp['NumeroInterior'] = $res['NumeroInterior'];
            $resp['Colonia'] = $res['Colonia'];
            $resp['Localidad'] = $res['Localidad'];
            $resp['Referencia'] = $res['Referencia'];
            $resp['Municipio'] = $res['Municipio'];
            $resp['Estado'] = $res['Estado'];
            $resp['Pais'] = $res['Pais'];
            $resp['CodigoPostal'] = $res['CodigoPostal'];
        }
    }
}else if($tipo = 'arrendatario'){
    $consulta = "SELECT * FROM arrendatario where idarrendatario = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['NombreArrendatario'] =$res['NombreArrendatario'];
            $resp['NumRegIdTribArrendatario'] = $res['NumRegIdTribArrendatario'];
            $resp['ResidenciaFiscalArrendatario'] = $res['ResidenciaFiscalArrendatario'];
            $resp['Calle'] = $res['Calle'];
            $resp['NumeroExterior'] = $res['NumeroExterior'];
            $resp['NumeroInterior'] = $res['NumeroInterior'];
            $resp['Colonia'] = $res['Colonia'];
            $resp['Localidad'] = $res['Localidad'];
            $resp['Referencia'] = $res['Referencia'];
            $resp['Municipio'] = $res['Municipio'];
            $resp['Estado'] = $res['Estado'];
            $resp['Pais'] = $res['Pais'];
            $resp['CodigoPostal'] = $res['CodigoPostal'];
        }
    }
}else if($tipo = 'propietario'){
    $consulta = "SELECT * FROM propietario where idpropietario = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['NombrePropietario'] =$res['NombrePropietario'];
            $resp['NumRegIdTribPropietario'] = $res['NumRegIdTribPropietario'];
            $resp['ResidenciaFiscalPropietario'] = $res['ResidenciaFiscalPropietario'];
            $resp['Calle'] = $res['Calle'];
            $resp['NumeroExterior'] = $res['NumeroExterior'];
            $resp['NumeroInterior'] = $res['NumeroInterior'];
            $resp['Colonia'] = $res['Colonia'];
            $resp['Localidad'] = $res['Localidad'];
            $resp['Referencia'] = $res['Referencia'];
            $resp['Municipio'] = $res['Municipio'];
            $resp['Estado'] = $res['Estado'];
            $resp['Pais'] = $res['Pais'];
            $resp['CodigoPostal'] = $res['CodigoPostal'];
        }
    }
}else if($tipo = 'carro'){
    $consulta = "SELECT * FROM carros where idcarros = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['Economico'] =$res['Economico'];
            $resp['PermSCT'] = $res['PermSCT'];
            $resp['NumPermisoSCT'] = $res['NumPermisoSCT'];
            $resp['NombreAseg'] = $res['NombreAseg'];
            $resp['NumPolizaSeguro'] = $res['NumPolizaSeguro'];
            $resp['configVehicular'] = $res['configVehicular'];
            $resp['PlacaVM'] = $res['PlacaVM'];
            $resp['AnioModeloVM'] = $res['AnioModeloVM'];
            $resp['modelo'] = $res['modelo'];
            $resp['tipo'] = $res['tipo'];
            $resp['propietario'] = $res['propietario'];
            $resp['arrendatario'] = $res['arrendatario'];
            $resp['Notificado'] = $res['Notificado'];
            $resp['fecreg'] = $res['fecreg'];
        }
    }
}else if($tipo = 'remolque'){
    $consulta = "SELECT * FROM remolques where idremolques = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['economico'] =$res['economico'];
            $resp['SubTipoRem'] = $res['SubTipoRem'];
            $resp['Placa'] = $res['Placa'];
            $resp['marca'] = $res['marca'];
            $resp['modelo'] = $res['modelo'];
            $resp['fecbaja'] = $res['fecbaja'];
        }
    }
}
?>