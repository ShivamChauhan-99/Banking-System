<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All</title>
    <style>
        html, body {
          font-family: 'Times New Roman', Times, serif;
          background-color: rgb(255, 255, 255);
          height: 100%;
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
          height: 70%;
        }
        #contact {
          padding: 5px;
          position: relative;
          color: rgb(0, 0, 0);
          background-color: lightskyblue;
          text-align: center;
        }
        #customers{
          position: absolute;
          transform: translateY(14%);
          margin: 0%;
          width: 80%;
        }
        a{
          text-decoration: none;
          color: black;
        }
        p{
          margin: 5px;
        }
        th{
          border-bottom-style: solid;
          border-bottom-width: 1px;
          font-size: x-large;
          padding-top: 7px;
          padding-bottom: 7px;
        }
        td{
          font-size: large;
          padding-bottom: 5px;
          padding-top: 4px;
        }
        .user:hover{
          cursor: pointer;
          background-color: lightskyblue;
        }
        tr td:nth-child(3){
          font-weight: bold;
          text-align: center;
        }
        #all{
          background-color: rgb(255, 255, 255);
          width: inherit;
          margin: auto;
          border-collapse: collapse;
          text-align: center;
        }
    </style>
    <script>
      function fun(id){
        window.location.href="view.php?id="+id+"";
        // console.log(id);
      }
    </script>
</head>
<body >
  <h1><u>NRC BANK</u></h1>
  <div id="content">

    <div id="customers">
      <table id='all'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Balance</th>
        </tr>
        <?php
            include("connection.php");
            $query = "SELECT * FROM CUSTOMERS";
            $data = mysqli_query($conn, $query);
            // $total = mysqli_num_rows($data);
            // echo $total;
            // $result = mysqli_fetch_assoc($data);
            // echo $result['C_ID']." ".$result['C_Name']." ".$result['account_balance'];
            while($result = mysqli_fetch_assoc($data)){
                echo "
                <tr id='{$result['C_ID']}' onclick=fun('{$result['C_ID']}') class="."user".">
                    <td>".$result['C_ID']."</td>
                    <td><a href='view.php?id={$result['C_ID']}'>".$result['C_Name']."</a></td>
                    <td>".$result['account_balance']."</td>
                </tr>
                ";
            }
        ?>
      </table>
    </div>

  </div>
  <div id="contact">
    <p>CONTACT</p>
    <p>shivamchauhan2gr8@gmail.com &emsp;(+91) 8700205757</p>
  </div>
</body>
</html>