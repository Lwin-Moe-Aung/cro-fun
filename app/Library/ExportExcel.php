<?php
namespace App\Library;

class ExportExcel
{

    /*
     * create excel format
     */
	public static function export($data, $filename, $type)
	{

		$exportData = "";
		$columns = config("export.excel.$type");
		 

		 if (count($data) > 0) {

		 	$exportData .='<table>';

		 	// call printHeaderRow function and add return data to $proData 	  
		 	$exportData .= self::printHeaderRow($columns);
		 	 
		 	
		 	// call printDataRow function	and add return data to $proData 

		 	$exportData .= self::printDataRow($data ,$columns);
		 	

		 	$exportData .='</table>';

		 	  
		}
		  
	
		// call fileWrite function 
		self::fileWrite($exportData, $filename);
		
		return true;

	}


	/*
	 * Create header row of the table
	 */
	public static function printHeaderRow($columns)
	{

		$hrow = "<tr>";
		foreach ($columns as $key=>$value){
			
			// code here for th
			$hrow .= '<th style = "border:1px solid #000">'.$value.'</th>';
		}
		
		$hrow .= "</tr>";

		return $hrow;

	}


	/*
	 * Create data row of the table
	 */
	public static function printDataRow($d, $columns)
	{		
		$drow = "<tr>";
		// code here using two foreach (first loop=> d , second loop=>$columns)
		foreach ($d['data'] as $key => $value) {
			
			foreach ($columns as $keys => $values) {

				$drow .= '<td style = "border:1px solid #000">'.$value[$keys].'</td>';

			}
			$drow .= "</tr>";

		}
		
		
		return $drow;
	}


	/*
	 * Create excel file
	 */
	public static function fileWrite($proData, $filename){

		//  code here for file write
		
        $fp = fopen('../storage/app/public/export/'.$filename, 'w');

        //write into this file
        fwrite($fp, $proData);

        //close the file
        fclose($fp);
	}
}