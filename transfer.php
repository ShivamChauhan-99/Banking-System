<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <style>
        html, body {
          font-family: 'Times New Roman', Times, serif;
          background-color: white;
          height: 100%;
          margin: 0%;
        }
        h1{
          font-weight: bold;
          font-size: 80px;
          text-align: center;
          color: black;
          background-color: lightskyblue;
          margin: 0%;
          padding: 30px;
        }
        #content{
          display: flex;
          flex-direction: row;
          justify-content: center;
          text-align: center;
          /* background-image: url('images/wallpaper_8.jpg'); */
          background-repeat: no-repeat;
          background-position: center;   
          background-size: 100% 100%;
          border: 0px;
          margin: 0%;
          height: 70%;
        }
        #contact {
          padding: 5px;
          position: relative;
          color: black;
          background-color: lightskyblue;
          text-align: center;
        }
        #info{
          height: fit-content;
          margin: 0%;
          position: relative;
          width: fit-content;
          transform: translateY(53%);
        }
        p{
          margin: 5px;
        }
        label{
          font-size: x-large;
          font-weight: bold;
        }
        select{
          border-radius: 7px;
          padding: 5px;
          background-color: rgb(255 255 255);
          font-size: large;
        }
        #select, #number{
          padding: 15px;
        }
        #amount{
          width: 194px;
          padding: 5px;
          border-radius: 5px;
          font-size: larger;
        }
        #amt_label{
          margin-right: 140px;
        }
        #pay{
          transform: translateY(160px);
          margin: 10px;
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
        #pay:hover{
          transform: translateY(160px);
          margin: 10px;
          background-color: black;
          color: white;
          padding: 12px;
          padding-left: 15px;
          padding-right: 15px;
          border-radius: 12px;
          cursor: pointer;
        }
        #pay:active{
          transform: translateY(160px);
          margin: 10px;
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

    <?php

        if(isset($_GET['id'])){
          include("connection.php");
          $id = mysqli_real_escape_string($conn, $_GET['id']);
          $query = "SELECT * FROM CUSTOMERS WHERE C_ID<>'$id'";
          $data = mysqli_query($conn, $query);
          echo "
            <form action='logic.php?' method='get' id='info'>
              <input type='hidden' name='id' value='{$id}'>
              <div id='select'><label for='user'>Transfer Money to: </label>
              <select name='user' id='user' required>
                <option value=''></option>
          ";
          while($result = mysqli_fetch_assoc($data)){
            echo "
                <option value='{$result['C_ID']}'>
                  {$result['C_Name']}
                </option>
            ";
          }
          echo "
              </select></div>
              <div id='number'><label for='amount' id='amt_label'>Amount: </label>
              <input type='number' name='amount' id='amount' min='1' required></div>
              <input type='submit' name='transfer' id='pay' value='Pay'>
            </form>
          ";
        }
        else{
          echo "id not found";
        }

    ?>
      
  </div>
  <div id="contact">
    <p>CONTACT</p>
    <p>shivamchauhan@gmail.com &emsp; 8700205757</p>
  </div>
</body>
</html>