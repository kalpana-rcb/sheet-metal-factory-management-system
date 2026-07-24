<?php
include('database.php');

$cod_id=$_REQUEST['cod_id'];
$contact_number=$_REQUEST['contact_number'];
$customer_name=$_REQUEST['customer_name'];
$pmid=$_REQUEST['pmid'];
$sql="update customer_order_details set cust_order_status='Confirmed' where customer_order_details_id='$cod_id' ";
mysqli_query($conn,$sql);

$msg1="Dear Customer ".$customer_name."your order is Confirmed";
$msg=str_replace(' ','+', $msg1);
file_get_contents("http://trans.vwgsms.com/api/mt/SendSMS?user=smsdemo&password=emo1234&senderid=VENTUR&channel=Trans&DCS=0&flashsms=0&number=".$contact_number."&text=".$msg."&route=6");


?>
<script>
alert("values is Confirmed..");
document.location="customer_order_master_more.php?pmid=<?php echo $pmid; ?>&cod_id=<?php  echo $cod_id; ?>";
</script>