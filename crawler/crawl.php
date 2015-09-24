<?php
ini_set('max_execution_time', 900);
include("Crawler.php");
include("../Connections/con2.php");
$mycrawler=new Crawler();
$waitage=array();
$keyword=array();
$sites=array();
$s_wait=array();
//$course="10B11CI411";
$course=$_GET['col'];
$con=mysqli_connect($hostname_con1,$username_con1,$password_con1,$database_con1);
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else
		{
			$result0 = mysqli_query($con,"SELECT * FROM sites where c_id='$course'");
			$l=0;
			while($row= mysqli_fetch_array($result0) )
			{
				$sites[$l]=$row[1];
				$s_wait[$l++]=$row[2];
			}
			$result = mysqli_query($con,"SELECT * FROM course where c_id='$course'");
			$l=0;
			while($row= mysqli_fetch_array($result) )
			{
				$keyword[$l]=$row[1];
				$waitage[$l++]=$row[2];
			}
		}

	$temp=array();
	$wait=array();
for($d=0;$d<sizeof($sites);$d++)
{
	$link=$mycrawler->crawlLinks($sites[$d]);
	
	//print the result
	$k=0;
	for($i=0;$i<sizeof($link['link']);$i++)
	{
		
		$sum=0;
		for($j=0;$j<sizeof($waitage);$j++)
		{
			$c=substr_count($link['link'][$i],$keyword[$j]);
			if($c)
			{
				$sum=$sum+($c*$waitage[$j]);
			}
		}
		if($sum>0)
		{
			$wait[$k]=$sum*$s_wait[$d];
			$temp[$k++]=$link['link'][$i];
		}
	}
}
array_multisort($wait,SORT_DESC,$temp,SORT_ASC);
		for($q=0;$q<10;$q++)
			echo '<a href="'.$temp[$q].'" target="_blank">'.$temp[$q].'</a><br><br>';

?>