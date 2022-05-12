<?php
include 'conexion.php';
header('Content-Type: application/json');
$tipo = $_GET['tipo'];
$id = $_GET['id'];
$resp = array();
if($tipo == 'empresa'){
    $consulta = "SELECT * FROM empresa where idempresa = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['nombre'] =$rs['nombre'];
            $resp['rfc'] = $rs['rfc'];
            $resp['nocertificado'] = $rs['nocertificado'];
            $resp['certificado'] = $rs['certificado'];
            $resp['regimenfiscal'] = $rs['regimenfiscal'];
            $resp['usuariopac'] = $rs['usuariopac'];
            $resp['contrapac'] = $rs['contrapac'];
            $resp['nombrepac'] = $rs['nombrepac'];
            $resp['keyp'] = $rs['keyp'];
            $resp['pfx'] = $rs['pfx'];
            $resp['passpfx'] = $rs['passpfx'];
        }
    }
}else if($tipo == 'sucursal'){
    $consulta = "SELECT * FROM sucursal where idsucursal = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['nombre'] =$rs['nombre'];
            $resp['idempresa'] = $rs['idempresa'];
            $resp['serie'] = $rs['serie'];
            $resp['folio'] = $rs['folio'];
            $resp['cp'] = $rs['cp'];
        }
    }
}else if($tipo == 'operadores'){
    $consulta = "SELECT * FROM operadores where idoperadores = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['NombreOperador'] =$rs['NombreOperador'];
            $resp['RFCOperador'] = $rs['RFCOperador'];
            $resp['NumLicencia'] = $rs['NumLicencia'];
            $resp['Calle'] = $rs['Calle'];
            $resp['NumeroExterior'] = $rs['NumeroExterior'];
            $resp['NumeroInterior'] = $rs['NumeroInterior'];
            $resp['Colonia'] = $rs['Colonia'];
            $resp['Localidad'] = $rs['Localidad'];
            $resp['Referencia'] = $rs['Referencia'];
            $resp['Municipio'] = $rs['Municipio'];
            $resp['Estado'] = $rs['Estado'];
            $resp['Pais'] = $rs['Pais'];
            $resp['CodigoPostal'] = $rs['CodigoPostal'];
        }
    }
}else if($tipo == 'notificado'){
    $consulta = "SELECT * FROM notificado where idnotificado = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['NombreNotificado'] =$rs['NombreNotificado'];
            $resp['NumRegIdTribNotificado'] = $rs['NumRegIdTribNotificado'];
            $resp['ResidenciaFiscalNotificado'] = $rs['ResidenciaFiscalNotificado'];
            $resp['Calle'] = $rs['Calle'];
            $resp['NumeroExterior'] = $rs['NumeroExterior'];
            $resp['NumeroInterior'] = $rs['NumeroInterior'];
            $resp['Colonia'] = $rs['Colonia'];
            $resp['Localidad'] = $rs['Localidad'];
            $resp['Referencia'] = $rs['Referencia'];
            $resp['Municipio'] = $rs['Municipio'];
            $resp['Estado'] = $rs['Estado'];
            $resp['Pais'] = $rs['Pais'];
            $resp['CodigoPostal'] = $rs['CodigoPostal'];
        }
    }
}else if($tipo == 'arrendatario'){
    $consulta = "SELECT * FROM arrendatario where idarrendatario = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['NombreArrendatario'] =$rs['NombreArrendatario'];
            $resp['NumRegIdTribArrendatario'] = $rs['NumRegIdTribArrendatario'];
            $resp['ResidenciaFiscalArrendatario'] = $rs['ResidenciaFiscalArrendatario'];
            $resp['Calle'] = $rs['Calle'];
            $resp['NumeroExterior'] = $rs['NumeroExterior'];
            $resp['NumeroInterior'] = $rs['NumeroInterior'];
            $resp['Colonia'] = $rs['Colonia'];
            $resp['Localidad'] = $rs['Localidad'];
            $resp['Referencia'] = $rs['Referencia'];
            $resp['Municipio'] = $rs['Municipio'];
            $resp['Estado'] = $rs['Estado'];
            $resp['Pais'] = $rs['Pais'];
            $resp['CodigoPostal'] = $rs['CodigoPostal'];
        }
    }
}else if($tipo == 'propietario'){
    $consulta = "SELECT * FROM propietario where idpropietario = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['NombrePropietario'] =$rs['NombrePropietario'];
            $resp['NumRegIdTribPropietario'] = $rs['NumRegIdTribPropietario'];
            $resp['ResidenciaFiscalPropietario'] = $rs['ResidenciaFiscalPropietario'];
            $resp['Calle'] = $rs['Calle'];
            $resp['NumeroExterior'] = $rs['NumeroExterior'];
            $resp['NumeroInterior'] = $rs['NumeroInterior'];
            $resp['Colonia'] = $rs['Colonia'];
            $resp['Localidad'] = $rs['Localidad'];
            $resp['Referencia'] = $rs['Referencia'];
            $resp['Municipio'] = $rs['Municipio'];
            $resp['Estado'] = $rs['Estado'];
            $resp['Pais'] = $rs['Pais'];
            $resp['CodigoPostal'] = $rs['CodigoPostal'];
        }
    }
}else if($tipo == 'carros'){
    $consulta = "SELECT * FROM carros where idcarros = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['Economico'] =$rs['Economico'];
            $resp['PermSCT'] = $rs['PermSCT'];
            $resp['NumPermisoSCT'] = $rs['NumPermisoSCT'];
            $resp['NombreAseg'] = $rs['NombreAseg'];
            $resp['NumPolizaSeguro'] = $rs['NumPolizaSeguro'];
            $resp['configVehicular'] = $rs['ConfigVehicular'];
            $resp['PlacaVM'] = $rs['PlacaVM'];
            $resp['AnioModeloVM'] = $rs['AnioModeloVM'];
            $resp['marca'] = $rs['marca'];
            $resp['tipo'] = $rs['tipo'];
            $resp['propietario'] = $rs['propietario'];
            $resp['arrendatario'] = $rs['arrendatario'];
            $resp['Notificado'] = $rs['notificado'];
            $resp['fecreg'] = $rs['fecreg'];
            $resp['operador'] = $rs['idoperador'];
        }
    }
}else if($tipo == 'remolque'){
    $consulta = "SELECT * FROM remolques where idremolques = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['economico'] =$rs['economico'];
            $resp['SubTipoRem'] = $rs['SubTipoRem'];
            $resp['Placa'] = $rs['Placa'];
            $resp['marca'] = $rs['marca'];
            $resp['modelo'] = $rs['modelo'];
            $resp['fecbaja'] = $rs['fecbaja'];
        }
    }
}else if($tipo == 'producto'){
    $consulta = "SELECT p.*, u.nombre unidadn, s.Descripcion servicio FROM productos p inner join unidad u on u.clave = p.unidad inner join claveprodserv s on s.c_ClaveProdServ = p.claveprodserv where idproducto = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['idproducto'] =$rs['idproducto'];
            $resp['nombre'] = $rs['nombre'];
            $resp['claveprodserv'] = $rs['claveprodserv'];
            $resp['unidad'] = $rs['unidad'];
            $resp['servicio'] = $rs['servicio'];
            $resp['unidadn'] = $rs['unidadn'];
        }
    }

}else if($tipo == 'punto'){
    $consulta = "SELECT * FROM puntos where idpuntos = ".$id;
    $res = $mysqli->query($consulta);
    $num = $res->num_rows;
    if ($num >= 1) {
        while ($rs = $res->fetch_assoc()) {
            $resp['nombre'] =$rs['nombre'];
            $resp['rfc'] =$rs['rfc'];
            $resp['residenciaf'] = $rs['residenciaf'];
            $resp['numregidtrib'] = $rs['numregidtrib'];
            $resp['calle'] = $rs['calle'];
            $resp['estado'] = $rs['estado'];
            $resp['pais'] = $rs['pais'];
            $resp['cp'] = $rs['cp'];
            $resp['Colonia'] = $rs['c_Colonia'];
            $resp['Localidad'] = $rs['c_Localidad'];
            $resp['NumeroExterior'] = $rs['NumeroExterior'];
            $resp['NumeroInterior'] = $rs['NumeroInterior'];
            $resp['Municipio'] = $rs['Municipio'];
        }
    }
}

echo json_encode($resp);
?>