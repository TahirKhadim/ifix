<?php
session_start();
// echo "welcome". $_SESSION['var'];
?>
<html>
    <head>
        <title>Display</title>
        <style>
            body
            {
                background:#D071f9;
            }
            table 
            {
               color:red;
               background:white;
            }
            .update , .delete
            {
                background-color: red;
                color:white;
                border:0;
                outline:none;
                border-radius:5px;
                hieght:24px;
                width:85px;
                font-weight:bold;
                cursor:pointer;
            }
        </style>
    </head>

<?php 
include("connection.php");
error_reporting(0);

$sesion_var= $_SESSION['var'];
if($sesion_var==true)
{

}
else
{
    header('location:signup.php');
}

 
$query= "SELECT * FROM ftable";
$data = mysqli_query($con, $query);

$total= mysqli_num_rows($data);

if($total !=0)



   
{
    ?>
 
   <h2 align="center"><mark> Displaying All Registered User</mark></h2>
   <center><table  border="1" cellspacing="10" width="40%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Operations</th>
        </tr>
    
    <?php
  while($result=mysqli_fetch_assoc($data))
  {
    
   echo" <tr>
            <td>".$result['id']."</td>
            <td>".$result['name']."</td>
            <td>".$result['email']."</td>
            

            <td><a href='update_design.php?id=$result[id]'><input type='submit' value='update' class='update'</a>
            <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'</a></td>
        </tr>
        ";
   
  }

}
else
{
    echo "table has no record";
}
    
    
    ?>
    </table>
</center>
<a href="logout.php">
<input type="submit" name="" Value="LogOut" style="background: blue; color:white; height:35px; width: 100px; margin-top: 20px;"></a>

<script>
    function checkdelete()
    {
        return confirm('are you sure u want to delete this record');
    }
</script>
</body>
</html>