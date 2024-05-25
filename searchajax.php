<?php 
  include("conn.php");
  if (isset($_POST['name'])){
   $name = $_POST['name'];
  
   $sql = "SELECT * FROM registrations WHERE reg_id LIKE '{$name}%' OR event_id LIKE '{$name}%'";  
   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr><td>". $row["event_id"]."</td>
       <td>". $row["reg_id"]."</td>
       <td>". $row["user_id"]."</td>
       <td>". $row["yearlvl"]."</td>
       <td>". $row["program"]."</td>
       <td>". $row["payment_mode"]."</td>
       <td>
                  <button class='bg-stone-500 text-white text-sm leading-5 font-medium rounded-3xl px-4 py-2.5 mr-5'>View</button>
                        </td>
       <td></tr>";
   }
    echo $data;}
    else {
      return;
    }
 ?>

