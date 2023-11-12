<div >
  <h2>Total Bookings</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Book id</th>
        <th class="text-center">Book date</th>
        <!-- <th class="text-center">Lname</th> -->
        <!-- <th class="text-center">Email</th> -->
        <th class="text-center">Book Place</th>
        <!-- <th class="text-center">Joining Date</th> -->
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from booking";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["book_date"]?></td>
      <td><?=$row["book_place"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>