<?php
require('conn.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>G! Arat Na</title>
  <link rel="icon" type="image/x-icon" href="images/G!.png" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <!-- Header -->
  <header>
    <nav class="flex w-full items-center justify-between gap-20 mt-10 max-md:max-w-full max-md:flex-wrap">
      <a href="index.php" class="flex items-stretch justify-between gap-5 my-auto max-md:max-w-full max-md:flex-wrap max-md:justify-center">
        <img src="images/G!.png" class="aspect-[4.09] object-contain object-center w-[200px] overflow-hidden shrink-0 max-w-full" alt="G! Arat Na" />
        <div class="justify-center self-start flex my-auto max-md:max-w-full max-md:flex-wrap max-md:justify-center">
          <a href="index.php" class="text-stone-900 text-center text-base font-extrabold leading-5">Home</a>
          <a href="events.php" class="text-black text-center text-base font-medium leading-5">Events</a>
          <a href="events.php" class="text-black text-center text-base font-medium leading-5">About</a>
          <?php
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            echo "<a href='logout.php' class='text-black text-center text-base font-medium leading-5'>Logout</a>";
          } else {
            echo "<a href='login.php' class='text-black text-center text-base font-medium leading-5'>Login</a>";
          }
          
          ?>
        </div>
      </a>
    </nav>
  </header>
  <!-- Carousel -->
  <div class="carousel">
    <div class="list">
      <?php
      $q = "SELECT * FROM events";
      $result = mysqli_query($conn, $q);

      if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="item">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
            <div class="content">
              <div class="contentContainer">
                <div class="author"><?php echo $row['author']?></div>
                <div class="title"><?php echo $row['title']?></div>
                <div class="des">
                  <?php echo $row['description']?>
                </div>
                <div class="buttons">
                  <button type="button">
                    <?php echo '<a href="register.php?event_id='.$row['event-id'].'">Register</a>'?>
                  </button>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>

    <div class="thumbnail">
      <?php
      // Create a copy of the result set for thumbnails
      $thumbnailResult = mysqli_query($conn, $q);

      if ($thumbnailResult->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($thumbnailResult)) {
      ?>
          <div class="item">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" class="border-solid border-2 border-slate-500">
            <div class="content">
              <div class="font-bold text-gray-950"><?php echo $row['title']; ?></div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>

    <!-- arrows -->
    <div class="arrows">
      <button id="prev">
        <
          <button id="next">></button>
          
    </div>
    
  </div>
  <div class="time"></div>
  <script src="app.js"></script>
  
</body>

</html>