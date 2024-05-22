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
      <nav
        class="flex w-full items-center justify-between gap-20 mt-10 max-md:max-w-full max-md:flex-wrap"
      >
        <a
          href="userHome.php"
          class="flex items-stretch justify-between gap-5 my-auto max-md:max-w-full max-md:flex-wrap max-md:justify-center"
        >
          <img
            src="images/G!.png"
            class="aspect-[4.09] object-contain object-center w-[200px] overflow-hidden shrink-0 max-w-full"
            alt="G! Arat Na"
          />
          <div
            class="justify-center self-start flex my-auto max-md:max-w-full max-md:flex-wrap max-md:justify-center"
          >
            <a
              href="userHome.php"
              class="text-stone-900 text-center text-base font-extrabold leading-5"
              >Home</a
            >
            <a
              href="events.html"
              class="text-black text-center text-base font-medium leading-5"
              >Events</a
            >
            <?php 
              if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                echo "<a href='logout.php' class='text-black text-center text-base font-medium leading-5'>Logout</a>";
              }
              else{
                echo "<a href='index.php' class='text-black text-center text-base font-medium leading-5'>Login</a>";
              }
            ?>
          </div>
        </a>
      </nav>
    </header>
    <!-- Carousel -->
    <div class="carousel">
      <!-- list items -->
      <div class="list">
        <div class="item">
          <img src="images/febibig.jpg" alt="Feb-Ibig 2024" />
          <div class="content">
            <div class="contentContainer">
              <div class="author">Central Student Government</div>
              <div class="title">Feb-Ibig 2024</div>
              <div class="des">
                The Central Student Government presents Feb-Ibig 2024. Get ready
                for an event filled with activities, fun, and romance!
              </div>
              <div class="buttons">
                <button>Register</button>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/DCS 2024.jpg" alt="DCS Week 2024" />
          <div class="content">
            <div class="contentContainer">
              <div class="author">Department of Computer Studies</div>
              <div class="title">DCS Week 2024</div>
              <div class="des">
                Gear up for DCS Week 2024! Join the Alliance of Computer
                Scientists and Information Technology Society in a week-long
                celebration of the Department of Computer Studies.
              </div>
              <div class="buttons">
                <button>Register</button>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/biniverse.jpg" alt="Bin" />
          <div class="content">
            <div class="contentContainer">
              <div class="author">Bini</div>
              <div class="title">Biniverse</div>
              <div class="des">
                BINI is gearing up for their much-anticipated first solo concert
                at the New Frontier Theater on June 28, 2024. Get ready to
                witness powerful performances, stunning visuals, and special
                surprises!
              </div>
              <div class="buttons">
                <button>Register</button>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/sbtown music fiesta.jpg" alt="SBTown Music Fiesta" />
          <div class="content">
            <div class="contentContainer">
              <div class="author">YGIG, PLUUS, Darlene, and more</div>
              <div class="title">SBTown Music Fiesta</div>
              <div class="des">
                SBTown Music Fiesta is set on May 26, 2024, 5PM at Rizal Open
                Auditorium, Rizal Park Luneta.
              </div>
              <div class="buttons">
                <button>Register</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- thumbnail -->
      <div class="thumbnail">
        <div class="item">
          <img
            src="images/sbtown music fiesta.jpg"
            alt="Biniverse"
            class="border-solid border-2 border-slate-500"
          />
          <div class="content">
            <div class="font-bold text-gray-950">SBTown Music Fiesta</div>
          </div>
        </div>
        <div class="item">
          <img
            src="images/febibig.jpg"
            alt="Biniverse"
            class="border-solid border-2 border-slate-500"
          />
          <div class="content">
            <div class="font-bold text-gray-950">Feb-Ibig 2024</div>
          </div>
        </div>
        <div class="item">
          <img
            src="images/DCS 2024.jpg"
            alt="Biniverse"
            class="border-solid border-2 border-slate-500"
          />
          <div class="content">
            <div class="font-bold text-gray-950">DCS Week 2024</div>
          </div>
        </div>
        <div class="item">
          <img
            src="images/biniverse.jpg"
            alt="Biniverse"
            class="border-solid border-2 border-slate-500"
          />
          <div class="content">
            <div class="font-bold text-gray-950">Biniverse</div>
          </div>
        </div>
      </div>

      <!-- arrows -->
      <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
      </div>
    </div>

    <div class="time"></div>
    <script src="app.js"></script>
  </body>
</html>
