<?php
include('database.php');
$bmid=$_REQUEST["bmid"];
$dat=$_REQUEST["date"];
$c_id=$_REQUEST["c_id"];
$p_id=$_REQUEST["prodcut_id"];
$qnt=$_REQUEST["qnt"];
$rate=$_REQUEST["rate"];
$dic=$_REQUEST["dic"];

$quant=$qnt;

  
  
$sql="select * from stock_details where product_id='$p_id'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);

$c_stock=$row["stock"];
$cs_id=($c_stock-$quant);


  $sql2="select * from  bill_master where bill_master_id='$bmid'";
		$res2=mysqli_query($conn,$sql2);
		if($row2=mysqli_fetch_array($res2))
		{
		 $sql3="insert into bill_details values(null,'$bmid','$p_id','$qnt','$rate','$dic')";
		mysqli_query($conn,$sql3);
		$sql4="update  stock_details set stock='$cs_id' where product_id='$p_id' ";
		mysqli_query($conn,$sql4);
		}
		else
		{
		 $sql5="insert into bill_details values(null,'$bmid','$p_id','$qnt','$rate','$dic')";
		mysqli_query($conn,$sql5);
		$sql6="insert into bill_master values('$bmid','$dat','$c_id','0','','')";
		mysqli_query($conn,$sql6);
		$sql7="update  stock_details set stock='$cs_id' where product_id='$p_id' ";
		mysqli_query($conn,$sql7);
		}
?>
<script>
alert("Product Added Ur Bill");
document.location="Bill_master_form.php?bmid="+<?php echo $bmid; ?>+"&c_id="+<?php echo $c_id; ?>+" ";
</script>

