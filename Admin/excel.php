
<?php 
include("../database/db.php"); 
//$sql = "SELECT `userid`,`first_name`,`last_name` FROM `employee`"; 
 $sql = "SELECT `Name`,`Gender`,`Mobileno`,`Email`,`NoofDays`,`Child`,`Adults`,`Message` FROM `enquiry`";
$setRec = mysql_query($sql); 
$columnHeader = ''; 
$columnHeader = "Name" . "\t" . "Gender" . "\t" . "Mobile" . "\t"."Email" . "\t" . "No of Days" . "\t" . "Child" . "\t"."Adult" . "\t" . "Message" . "\t"; 
$setData = ''; 
while ($rec = mysql_fetch_row($setRec)) { 
$rowData = ''; 
foreach ($rec as $value) { 
$value = '"' . $value . '"' . "\t"; 
$rowData .= $value; 
} 
$setData .= trim($rowData) . "\n"; 
} 
header("Content-type: application/octet-stream"); 
//header("Content-Disposition: attachment; filename=User_Detail.xls"); 
header("Content-Disposition: attachment; filename=Purchaise_Report.xls");
header("Pragma: no-cache"); 
header("Expires: 0"); 
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
?>