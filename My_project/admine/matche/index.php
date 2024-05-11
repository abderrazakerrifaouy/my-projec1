<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="abdo.css"> 
    <title>Document mateche</title>
</head>

<body>
    <!-- adife sora fi 9a3idate lbayanate  -->
    <div class="containr">
        <div class="heder">
            <div class="logo">
                <h3>teran maroc</h3>
            </div>
        </div>
        <div class="content">
        <div class="navBare">
        <ul>
                <li>
                    <div class="hedNav">
                        <div class="img"><img src="media/Screensh.png"></div>
                       <div class="lonom"><h4><a href="#">le nome</a></h4></div> 
                    </div>
                </li>
                <li> <a  href="http://localhost/My_project/admine/profaile/index.php">my profile</a> </li>
                <li><a href="#"> cmd </a></li>
                <li> <a href="http://localhost/My_project/admine/usr/UserLest.html">les usr </a></li>
                <li  > <a  class="abdo" href="http://localhost/My_project/admine/matche/index.php">les match </a></li>
                <li> <a href="http://localhost/My_project/admine/vip/vipLest.html">les vip </a> </li>
                <li> <a href="http://localhost/My_project/admine/tecet/index.php">les tcket</a>  </li>
            </ul>
        </div>
        <div class="content1">
        <?PHP
         $host = 'localhost';
         $user = 'root';
         $pass = '';
         $db = 'matchbooking';
         $conn = new mysqli($host, $user, $pass, $db);
         $sql = "SELECT au.id , e.team_name , eu.team_name as teme2 , a.name , au.match_time 
         FROM matche au 
         JOIN équipe e ON e.id = au.FIRST_team_id 
         JOIN équipe eu ON eu.id = au.second_team_id 
         JOIN stadium a on a.id = au.stadium_id;";
         $rs = $conn->query($sql);


      if ($rs && $rs->num_rows > 0 ){
         while( $row = $rs->fetch_assoc()){
            echo '<div class="matech"><h4>'. $row["team_name"] .' VS '. $row["teme2"].' </h4><h5>taime = '.$row["match_time"] .'</h5><h5>teran ='.$row["name"].' </h5><div class="boton"> 
            <form action="modife.php" method="POST">
             <input type="text" value="'.$row["id"].'" name="id" >
            <input type="submit" value="updat" id="abdo"> 
             </form> 
             <form action="delete.php" method="GET"> 
               <input type="submit" value="delete">
               <input type="hidden" value="'.$row["id"].'" name="id" >
            </form>
            <input type="submit" value="+cmd" ></div></div>';
        }  
        echo $row ;   
}
   echo ' <div class="matech"> 
   <form action="ajoute.php" method="POST">
  <input type="submit" value="ajute"> 
   </form>  <div> ';

         ?>
        </div>
        <div class="FOT">
            <div class="logo">
                <h3>teran maroc</h3>
            </div>
        </div>
    </div>
    <script src="/js/admin/">
    </script>
</body>

</html>