<?php

/*
 * Production - linux
 */


include_once'./set_inc_path.php';

include_once 'util/ses.php';
$ajxSess = new Session();

include_once 'PhpRbac/database/database.config';

try {
    $Db = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
} catch (Exception $exc) {
    
}


header('Content-Type: application/json');


$dtvalue=$_POST[elementval];
$tablename=$_POST[tablename];
$columnname=$_POST[columnname];
$formval=isset($_POST[formval])?$_POST[formval]:'';



if(($dtvalue)){

	$evtdatet_tab = $tablePrefix . $tablename;
	
    //$entityID = $ajxSess->get('user')['entity_ID'];
   
  
  if($formval != $dtvalue)
  {
      $sql_query  = "SELECT count(*) as DataCount FROM  $evtdatet_tab WHERE  $evtdatet_tab.$columnname = '".$dtvalue."'";
  }
  else
  {
       $sql_query  = "SELECT count(*) as DataCount FROM  $evtdatet_tab WHERE $evtdatet_tab.$columnname NOT IN('".$formval."') and  $evtdatet_tab.$columnname = '".$dtvalue."'";
      
  }


	try {
                $stmt = $Db->prepare($sql_query);
                if ($stmt->execute()) {

                 $Data_rows = $stmt->fetch(7);
                 
                 if($Data_rows){
		            http_response_code();
		           // echo json_encode($Data_rows);
                 echo $Data_rows;
             
                 }else{
        	 	http_response_code(204);
        	 	echo json_encode(array('noData' => 'noData'));
    		}   
                    
                } else {
                   http_response_code(204);
                }
            } catch (Exception $exc) {
               
               http_response_code(500);
            }


}


?>