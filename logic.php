<?php
include("connection.php");

$sender = mysqli_real_escape_string($conn, $_GET['id']);
$reciever = mysqli_real_escape_string($conn, $_GET['user']);
$amt = mysqli_real_escape_string($conn, $_GET['amount']);

$query = "SELECT * FROM CUSTOMERS WHERE C_ID='$sender'";
$sender_data = mysqli_query($conn, $query);
$sender_balance = mysqli_fetch_assoc($sender_data);
$query = "SELECT * FROM CUSTOMERS WHERE C_ID='$reciever'";
$reciever_data = mysqli_query($conn, $query);
$reciever_balance = mysqli_fetch_assoc($reciever_data);

$from = $sender_balance['account_balance'];
$to = $reciever_balance['account_balance'];

if($amt <= $sender_balance['account_balance']){

    $query_1 = "UPDATE CUSTOMERS SET account_balance=$from-$amt WHERE C_ID='$sender'";
    $query_2 = "UPDATE CUSTOMERS SET account_balance=$to+$amt WHERE C_ID='$reciever'";
    $update_1 = mysqli_query($conn, $query_1);
    $update_2 = mysqli_query($conn, $query_2);

    if($update_1 and $update_2){
        // echo date_default_timezone_get();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        $transfer_query = "INSERT INTO TRANSFERS (`time`, `amount`, `S_ID`, `R_ID`) VALUES ('$date', $amt, $sender, $reciever)";
        $transfer = mysqli_query($conn, $transfer_query);
        echo "
          <script>
            alert("."'Transaction Success'".");
          </script>
        ";
    }
    else{
        echo "<script>alert("."'Transaction Failed'".");</script>";
    }
}
else{
    echo "<script>alert("."'Transaction Failed'".");</script>";
}

echo "
      <script>
      window.location.replace('view_all.php');
      </script>
    ";

?>