<?php
require_once 'phplot-6.2.0/phplot.php';
include("connection.php");
$q="select * from member";
$children=0;
$young=0;
$old=0;
$total=0;
$qq=mysqli_query($con,$q);
while($row=mysqli_fetch_array($qq))
{
	
     $total=$total+1;
	if($row['age']<25)
     $children++;
	else if($row['age']>=25 && $row['age']<=40)
	$young++;
	else
	$old++;
}

 $children=($children/$total)*100;
 $young=($young/$total)*100;
 $old=($old/$total)*100;	
$data = array(
  array('Children', $children), array('Young', $young), array('Old',  $old),
  );

$plot = new PHPlot(700, 400);
$plot->SetImageBorderType('plain');

$plot->SetPlotType('bars');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);
# Let's use a new color for these bars:
$plot->SetDataColors('blue');
$plot->SetFont('x_label', '3');
$plot->SetFont('y_label', '3');
$plot->SetFont('x_title', '3');
$plot->SetFont('y_title', '5');

# Force bottom to Y=0 and set reasonable tick interval:
$plot->SetPlotAreaWorld(NULL, 0, NULL, 100);
$plot->SetYTickIncrement(5);

# Main plot title:
$plot->SetTitle('Age partion%');
# Y Axis title:
$plot->SetYTitle('Values in %');
$plot->SetXTitle('Category Name');

$plot->DrawGraph();
?>