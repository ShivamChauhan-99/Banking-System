<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
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
          flex-direction: column;
          justify-content: center;
          align-items: center;
          text-align: center;
          /* background-image: url('images/wallpaper_8.jpg'); */
          background-repeat: no-repeat;
          background-position: center;   
          background-size: 100% 100%;
          border: 0px;
          margin: 0%;
          height: 70%;
          overflow: auto;
        }
        div::-webkit-scrollbar {
          width: 12px;
        }

        div::-webkit-scrollbar-track {
          background: rgba(245, 245, 245, 0);
        }

        div::-webkit-scrollbar-thumb {
          background-color: rgba(128, 128, 128, 0.6);
          border-radius: 20px;
          border: 2px black;
        }
        #history{
            align-items: center;
            justify-content: center;
            display: flex;
            overflow: auto;
            height: inherit;
        }
        #contact {
          padding: 5px;
          position: relative;
          color: black;
          background-color: lightskyblue;
          text-align: center;
        }
        #head{
          padding: 7px;
          margin-bottom: 15px;
        }
        #head table{
          font-size: larger;
        }
        #head, #history{
          background-color: rgb(133, 205, 250, 45%);
          width: 80%;
        }
        table{
            display: contents;
            align-self: center;
        }
        tbody{
          width: 100%;
          height: -webkit-fill-available;
        }
        tr{
          margin: 5px;
        }
        th{
          width: 11%;
            text-align: center;
            padding-left: 5px;
            padding-right: 5px;
        }
        td{
          width: 9%;
            text-align: center;
            padding-left: 5px;
            padding-right: 5px;
        }
        p{
          margin: 5px;
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
          $query = "SELECT * FROM TRANSFERS WHERE S_ID='$id' OR R_ID='$id' ORDER BY time DESC";
          $data = mysqli_query($conn, $query);
          echo "
            <div id='head'>
              <table>
                <tr>
                  <th>Date & Time</th>
                  <th>T_ID</th>
                  <th>Debit</th>
                  <th>Credit</th>
                </tr>
              </table>
            </div>
          ";
          echo "
            <div id='history'>
              <table>
          ";
          while($result = mysqli_fetch_assoc($data)){
            echo "
              <tr>
                <td>{$result['time']}</td>
                <td>{$result['T_ID']}</td>";
            if($id==$result['S_ID']){
              echo "
                <td>{$result['amount']}</td> 
                <td></td> 
              ";
            }
            else if($id==$result['R_ID']){
              echo "
                <td></td>
                <td>{$result['amount']}</td>  
              ";
            }
            echo 
            " </tr>
            ";
          }
          echo "
              </table>
            </div>
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