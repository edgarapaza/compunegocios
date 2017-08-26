SELECT IDproducto,producto,IDproveedor,numFactura,fecEmision,numserie,IDFamilia,IDSubFam,IDmarca,modelo,tipoUnidad,tipArticulo,descripcion,preUnitario,marGanancia,precioVenta,cantidad,pro_peso,pro_tamaño,pro_alto,pro_largo,pro_ancho,pro_color,pro_incluye,pro_fecRegistro,IDPersonal,alertAmbar,alertRojo,estadoActivo,obs,imagen,IDAlmacen FROM compu.productos;


SELECT nombreProveedor,razonSocial,numRUC,direccion,telfFijo,celular,email,website,obs FROM proveedor WHERE idproveedor = 1;

SELECT familia FROM familia WHERE IDfamilia = 1;

SELECT Subfamilia FROM subfamilias WHERE idsubfamilias =1 AND IDfamilia = 1;

SELECT marca FROM marca WHERE idmarca = 1;

SELECT CONCAT(nombres,' ',paterno,' ',materno) AS personal FROM Personal WHERE IDPersonal = 1000;

SELECT tienda FROM tienda WHERE idtienda = 1;