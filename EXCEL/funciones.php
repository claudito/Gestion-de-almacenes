<?php 


function excel_guia_salida($documento)
{

  $link = Conectarse();

	$query     = "SELECT DEITEM,DECODIGO,ISNULL(DESERIE,'')AS DESERIE,DEDESCRI,DEUNIDAD,DECANTID  FROM [004BDCOMUN].DBO.MOVALMCAB AS C  INNER JOIN [004BDCOMUN].DBO.MOVALMDET AS D ON   
C.CANUMDOC=D.DENUMDOC   AND CATD=DETD    WHERE  CANUMDOC='".$documento."'
AND  LEFT(CANUMDOC,3)='022'   AND CATD='GS' AND CACODMOV='SO'
ORDER BY DEITEM";
	$result    = mssql_query($query);
	$numfilas  = mssql_num_rows($result);
	if($numfilas > 0 )
	{
	 					
		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
	

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("LUIS CLAUDIO") //Autor
							 ->setLastModifiedBy("LUIS CLAUDIO") //Ultimo usuario que lo modificó
							 ->setTitle("Guía de Salida")
							 ->setSubject("Guía de Salida")
							 ->setDescription("Guía de Salida")
							 ->setKeywords("Guía de Salida")
							 ->setCategory("Guía de Salida");

		$tituloReporte   = "GUIA DE SALIDA";
		$titulosColumnas = array('CODIGO', 'SERIE','DESCRIPCION','UND','CANT');


						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					//->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A1',  $titulosColumnas[0])
		            ->setCellValue('B1',  $titulosColumnas[1])
        		    ->setCellValue('C1',  $titulosColumnas[2])
        		    ->setCellValue('D1',  $titulosColumnas[3])
        		    ->setCellValue('E1',  $titulosColumnas[4])
        		    ->setCellValue('F1',  $titulosColumnas[5])
        		
        		   
        		    ;
		
		
		//Se agregan los datos de los alumnos
		$i = 2;
		while ($fila = mssql_fetch_array($result)) {
			$objPHPExcel->setActiveSheetIndex(0)
        	        ->setCellValueExplicit('A'.$i,  utf8_encode($fila['DECODIGO']),PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('B'.$i,  utf8_encode($fila['DESERIE']),PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('C'.$i,  utf8_encode($fila['DEDESCRI']),PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('D'.$i,  $fila['DEUNIDAD'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('E'.$i,  round($fila['DECANTID'],2),PHPExcel_Cell_DataType::TYPE_NUMERIC)
        		    
        		    

        		     ;
					$i++;
		}

       
				
		for($i = 'A'; $i <= 'C'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('GS - '.$documento.'');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="GS-'.$documento.'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

		
	}
	else
	{
	echo "No hay resultados para mostrar";
	}






}



function carga_inicial()
{


  $link = Conectarse();

	$query     = "SELECT ACODIGO,SERIE,ADESCRI,AUNIDAD,AFAMILIA,
	ISNULL(STKPREPRO,0.00)AS STKPREPRO,CANTIDAD,PROCEDENCIA
FROM [004BDAPLICACION].DBO.CARGA_EXCEL  AS C INNER JOIN 
(SELECT ACODIGO,ADESCRI,AUNIDAD,AFAMILIA,AESTADO,STALMA,STSKDIS,S.STKPREPRO FROM [004BDCOMUN].DBO.MAEART  AS M  LEFT JOIN 
[004BDCOMUN].DBO.STKART AS S ON M.ACODIGO=S.STCODIGO AND STALMA='01')AS M ON
C.CODIGO=M.ACODIGO  WHERE  AESTADO='V' AND USUARIO='".$_SESSION[KEY.USUARIO]."'";
	$result    = mssql_query($query);
	$numfilas  = mssql_num_rows($result);
	if($numfilas > 0 )
	{
	 					
		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("LUIS CLAUDIO") //Autor
							 ->setLastModifiedBy("LUIS CLAUDIO") //Ultimo usuario que lo modificó
							 ->setTitle("Carga Inicial")
							 ->setSubject("Carga Inicial")
							 ->setDescription("Carga Inicial")
							 ->setKeywords("Carga Inicial")
							 ->setCategory("Carga Inicial");

		$tituloReporte   = "CARGA INICIAL";
		$titulosColumnas = array('CÓDIGO', 'SERIE', 'DESCRIPCIÓN','UND','FAMILIA','CANT','COSTO(S/.)','PROCEDENCIA');


						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					//->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A1',  $titulosColumnas[0])
		            ->setCellValue('B1',  $titulosColumnas[1])
        		    ->setCellValue('C1',  $titulosColumnas[2])
        		    ->setCellValue('D1',  $titulosColumnas[3])
        		    ->setCellValue('E1',  $titulosColumnas[4])
        		    ->setCellValue('F1',  $titulosColumnas[5])
        		    ->setCellValue('G1',  $titulosColumnas[6])
        		    ->setCellValue('H1',  $titulosColumnas[7])
        		   
        		    ;
		
		
		//Se agregan los datos de los alumnos
		$i = 2;
		while ($fila = mssql_fetch_array($result)) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValueExplicit('A'.$i,  utf8_encode($fila['ACODIGO']),PHPExcel_Cell_DataType::TYPE_STRING)
		            ->setCellValueExplicit('B'.$i,  $fila['SERIE'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('C'.$i,  utf8_encode($fila['ADESCRI']),PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('D'.$i,  $fila['AUNIDAD'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('E'.$i,  $fila['AFAMILIA'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('F'.$i,  round($fila['CANTIDAD'],2),PHPExcel_Cell_DataType::TYPE_NUMERIC)
        		    ->setCellValueExplicit('G'.$i,  round($fila['STKPREPRO'],2),PHPExcel_Cell_DataType::TYPE_NUMERIC)
        		    ->setCellValueExplicit('H'.$i,  $fila['PROCEDENCIA'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    

        		     ;
					$i++;
		}

       
				
		for($i = 'A'; $i <= 'H'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('CARGA INICIAL');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="carga-inicial.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

		
	}
	else
	{
	echo "No hay resultados para mostrar";
	}





}



function nota_salida()
{


  $link = Conectarse();

	$query     = "SELECT ACODIGO,SERIE,ADESCRI,AUNIDAD,AFAMILIA,ISNULL(STKPREPRO,0.00)AS STKPREPRO,CANTIDAD,MAQUINA,DOC_REF
FROM [004BDAPLICACION].DBO.CARGA_EXCEL  AS C INNER JOIN 
(SELECT ACODIGO,ADESCRI,AUNIDAD,AFAMILIA,AESTADO,STALMA,STSKDIS,S.STKPREPRO FROM [004BDCOMUN].DBO.MAEART  AS M  LEFT JOIN 
[004BDCOMUN].DBO.STKART AS S ON M.ACODIGO=S.STCODIGO AND STALMA='01')AS M ON
C.CODIGO=M.ACODIGO  WHERE  AESTADO='V' AND USUARIO='".$_SESSION[KEY.USUARIO]."'";
	$result    = mssql_query($query);
	$numfilas  = mssql_num_rows($result);
	if($numfilas > 0 )
	{
	 					
		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("LUIS CLAUDIO") //Autor
							 ->setLastModifiedBy("LUIS CLAUDIO") //Ultimo usuario que lo modificó
							 ->setTitle("Carga Nota de Salida")
							 ->setSubject("Carga Nota de Salida")
							 ->setDescription("Carga Nota de Salida")
							 ->setKeywords("Carga Nota de Salida")
							 ->setCategory("Carga Nota de Salida");

		$tituloReporte   = "CARGA NOTA SALIDA";
		$titulosColumnas = array('CÓDIGO', 'SERIE', 'DESCRIPCIÓN','UND','CANT',
			'MAQUINA','DOC REF');


						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					//->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A1',  $titulosColumnas[0])
		            ->setCellValue('B1',  $titulosColumnas[1])
        		    ->setCellValue('C1',  $titulosColumnas[2])
        		    ->setCellValue('D1',  $titulosColumnas[3])
        		    ->setCellValue('E1',  $titulosColumnas[4])
        		    ->setCellValue('F1',  $titulosColumnas[5])
        		    ->setCellValue('G1',  $titulosColumnas[6])
        		   
        		    ;
		
		
		//Se agregan los datos de los alumnos
		$i = 2;
		while ($fila = mssql_fetch_array($result)) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValueExplicit('A'.$i,  utf8_encode($fila['ACODIGO']),PHPExcel_Cell_DataType::TYPE_STRING)
		            ->setCellValueExplicit('B'.$i,  $fila['SERIE'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('C'.$i,  utf8_encode($fila['ADESCRI']),PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('D'.$i,  $fila['AUNIDAD'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('E'.$i,  round($fila['CANTIDAD'],2),PHPExcel_Cell_DataType::TYPE_NUMERIC)
        		    ->setCellValueExplicit('F'.$i,  $fila['MAQUINA'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('G'.$i,  $fila['DOC_REF'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    

        		     ;
					$i++;
		}

       
				
		for($i = 'A'; $i <= 'G'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('CARGA NOTA DE SALIDA');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="carga-nota-de-salida.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

		
	}
	else
	{
	echo "No hay resultados para mostrar";
	}





}



function nota_ingreso()
{


  $link = Conectarse();

	$query     = "SELECT ACODIGO,SERIE,ADESCRI,AUNIDAD,AFAMILIA,ISNULL(STKPREPRO,0.00)AS STKPREPRO,CANTIDAD,MAQUINA,DOC_REF
FROM [004BDAPLICACION].DBO.CARGA_EXCEL  AS C INNER JOIN 
(SELECT ACODIGO,ADESCRI,AUNIDAD,AFAMILIA,AESTADO,STALMA,STSKDIS,S.STKPREPRO FROM [004BDCOMUN].DBO.MAEART  AS M  LEFT JOIN 
[004BDCOMUN].DBO.STKART AS S ON M.ACODIGO=S.STCODIGO AND STALMA='01')AS M ON
C.CODIGO=M.ACODIGO  WHERE  AESTADO='V' AND USUARIO='".$_SESSION[KEY.USUARIO]."'";
	$result    = mssql_query($query);
	$numfilas  = mssql_num_rows($result);
	if($numfilas > 0 )
	{
	 					
		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("LUIS CLAUDIO") //Autor
							 ->setLastModifiedBy("LUIS CLAUDIO") //Ultimo usuario que lo modificó
							 ->setTitle("Carga Nota de Ingreso")
							 ->setSubject("Carga Nota de Ingreso")
							 ->setDescription("Carga Nota de Ingreso")
							 ->setKeywords("Carga Nota de Ingreso")
							 ->setCategory("Carga Nota de Ingreso");

		$tituloReporte   = "CARGA NOTA DE INGRESO";
		$titulosColumnas = array('CÓDIGO', 'SERIE', 'DESCRIPCIÓN','UND','CANT');


						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					//->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A1',  $titulosColumnas[0])
		            ->setCellValue('B1',  $titulosColumnas[1])
        		    ->setCellValue('C1',  $titulosColumnas[2])
        		    ->setCellValue('D1',  $titulosColumnas[3])
        		    ->setCellValue('E1',  $titulosColumnas[4])       		   
        		    ;
		
		
		//Se agregan los datos de los alumnos
		$i = 2;
		while ($fila = mssql_fetch_array($result)) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValueExplicit('A'.$i,  utf8_encode($fila['ACODIGO']),PHPExcel_Cell_DataType::TYPE_STRING)
		            ->setCellValueExplicit('B'.$i,  $fila['SERIE'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('C'.$i,  utf8_encode($fila['ADESCRI']),PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('D'.$i,  $fila['AUNIDAD'],PHPExcel_Cell_DataType::TYPE_STRING)
        		    ->setCellValueExplicit('E'.$i,  round($fila['CANTIDAD'],2),PHPExcel_Cell_DataType::TYPE_NUMERIC)
    
        		    

        		     ;
					$i++;
		}

       
				
		for($i = 'A'; $i <= 'E'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('CARGA NOTA DE INGRESO');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="carga-nota-de-ingreso.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

		
	}
	else
	{
	echo "No hay resultados para mostrar";
	}





}

 ?>