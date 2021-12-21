<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php
        if(isset($_GET['id'])){
          include("connection.php");
          $id = mysqli_real_escape_string($conn, $_GET['id']);
          $query = "SELECT * FROM CUSTOMERS WHERE C_ID='$id'";
          $data = mysqli_query($conn, $query);
          $result = mysqli_fetch_assoc($data);
          echo "{$result['C_Name']}";
        }
        else{
          echo "id not found";
        }
      ?>
    </title>
    <style>
        html, body {
          font-family: 'Times New Roman', Times, serif;
          background-color: rgb(255, 255, 255);
          margin: 0%;
        }
        h1{
          -webkit-text-stroke: 1px black;
          font-weight: bold;
          font-size: 80px;
          text-align: center;
          color: rgb(0, 0, 0);
          background-color: lightskyblue;
          margin: 0%;
          padding: 30px;
        }
        #content{
          font-family: 'Times New Roman', Times, serif;
          display: flex;
          flex-direction: row;
          justify-content: center;
          text-align: center;
          /* background-image: url('images/wallpaper_4.jpg'); */
          background-repeat: no-repeat;
          background-position: center;   
          background-size: 100% 100%;
          border: 0px;
          margin: 0%;
          height: 69%;
        }
        #contact {
          padding: 5px;
          position: relative;
          color: rgb(0, 0, 0);
          background-color: lightskyblue;
          text-align: center;
        }
        #customer{
          padding-left: 25px;
          padding-right: 25px;
          background-color: rgba(133, 205, 250, 50%);
          justify-content: center;
          position: absolute;
          transform: translateY(16%);
          margin: 0%;
          width: fit-content;
        }
        #transfer{
          font-family: 'Times New Roman', Times, serif;
          margin: 0%;
          height: fit-content;
          transform: translateY(430px);
          width: fit-content;
          position: relative;
        }
        p{
          font-size: large;
          margin: 5px;
        }
        h3{
          font-size: xx-large;
        }
        #button1, #button2{
          text-align: center;
          background-color: white;
          text-decoration: none;
          display: inline-block;
          font-size: larger;
          font-weight: bold;
          padding: 10px;
          padding-left: 15px;
          padding-right: 15px;
          border: 2px solid black;
        }
        #button1:hover, #button2:hover{
          background-color: black;
          color: white;
          padding: 12px;
          padding-left: 15px;
          padding-right: 15px;
          border-radius: 12px;
          cursor: pointer;
        }
        #button1:active, #button2:active{
          background-color: black;
          color: white;
          padding: 10px;
          padding-left: 15px;
          padding-right: 15px;
          border-radius: 12px;
          cursor: pointer;
        }
        
    </style>
</head>
<body >
  <h1><u>NRC BANK</u></h1>
  <div id="content">

    <div id="customer">
      <?php
        echo "<h3>{$result['C_Name']}</h3>";
        echo "
          <p><b>C_ID:</b> {$result['C_ID']}</p><br>
          <p><b>Email:</b> {$result['email']}</p><br>
          <p><b>Contact:</b> {$result['phone']}</p><br>
          <p><b>Address:</b> {$result['address']}</p><br>
          <p><b>Balance:</b> {$result['account_balance']}</p><br>
        ";
      ?>
    </div>

    <div id="transfer" style="position: relative;">
      <?php
        echo "
        <a href='transfer.php?id={$id}'><input type='submit' id='button1' value='Transfer'></a>
        <a href='history.php?id={$id}'><input type='submit' id='button2' value='History'></a>
        ";   
      ?>
    </div>

  </div>
  <div id="contact">
    <p>CONTACT</p>
    <p>shivamchauhan@gmail.com &emsp; 8700205757</p>
  </div>
</body>
</html>