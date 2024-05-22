<?php
require 'conn.php';
session_start();

if (isset($_POST["submit"])) {
  $fullname = $_POST['fullname'];
  $student_num = $_POST['student_num'];
  $program = $_POST['program'];
  $yr_sec = $_POST['yr_sec'];
  $dob = $_POST['dob'];
  $sem = $_POST['sem'];
  $purpose = $_POST['purpose'];


  $query = "INSERT INTO request (fullname,student_num,program,yr_sec,dob,sem,purpose,reqtype) 
  VALUES ('$fullname','$student_num','$program','$yr_sec','$dob','$sem', '$purpose', 'Transcript of Records')";


  mysqli_query($conn, $query);
?><script type="text/javascript">
    alert("Keep in mind that your request is subject to assessment, and approval is not guaranteed.");



    window.location.href = "qrgenerator.php";
  </script><?php




            //header("location: formrequest.html");
          }


            ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Feb-Ibig 2024</title>
  <link rel="icon" type="image/x-icon" href="images/G!.png" />
  <link href="/dist/output.css" rel="stylesheet" />
  <link rel="stylesheet" href="regFebibig.css">

</head>

<body class="min-h-screen relative bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200">
  <!-- Gradient Background -->
  <div class="blob w-full h-full rounded-[999px] absolute top-0 right-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200"></div>
  <div class="blob w-[1000px] h-[1000px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-red-200 via-gray-100 to-blue-100"></div>
  <div class="blob w-[600px] h-[600px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-slate-100 via-teal-100 to-blue-100"></div>
  <div class="blob w-[300px] h-[300px] rounded-[999px] absolute bottom-[10px] left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-green-200 via-cyan-200 to-fuchsia-300"></div>
  <div class="flex flex-col items-stretch pl-12 pr-12 max-md:px-5">
    <header>
      <nav class="flex w-full items-center justify-between gap-20 mt-10 max-md:max-w-full max-md:flex-wrap">
        <a href="userHome.php" class="flex items-stretch justify-between gap-5 my-auto max-md:max-w-full max-md:flex-wrap max-md:justify-center">
          <img src="images/G!.png" class="aspect-[4.09] object-contain object-center w-[200px] overflow-hidden shrink-0 max-w-full" alt="G! Arat Na" />
          <div class="justify-center self-start flex gap-10 my-auto mr-10 max-md:max-w-full max-md:flex-wrap max-md:justify-center">
            <a href="userHome.php" class="text-stone-900 text-center text-base font-medium leading-5">Home</a>
            <a href="events.php" class="text-black text-center text-base font-extrabold leading-5">Events</a>
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
              echo "<a href='logout.php' class='text-black text-center text-base font-medium leading-5'>Logout</a>";
            } else {
              echo "<a href='index.php' class='text-black text-center text-base font-medium leading-5'>Login</a>";
            }
            ?>
          </div>
        </a>
      </nav>
    </header>


    <div class="grid grid-cols-2 gap-16 mt-20">
      <div>
        <div class="px-20 ml-10">
          <h1 class="text-center text-[80px] pb-2">Feb-Ibig 2024</h1>
          <p class="text-justify pb-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate, necessitatibus et. Odit, eius quam. Adipisci quisquam molestias corrupti, facilis repellat unde harum facere quis ea earum commodi maxime necessitatibus vitae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis maiores libero, inventore dolor in repellat odit explicabo aliquam provident natus. Odit animi nobis eligendi vitae beatae? Voluptas officia incidunt et.
          </p>
          <div class="formbold-event-details">
            <h5>Event Details</h5>
            <ul>

              <li>
                <img src="images/bx-calendar-alt.svg" alt="">
                February 14, 2024
              </li>
              <li>
                <img src="images/bx-time.svg" alt="">
                8:00 AM - 5:00 PM
              </li>
              <li>
                <img src="images/bx-map.svg" alt="">
                CvSU Bacoor Gym
              </li>
              <li>
                <img src="images/bx-group.svg" alt="">
                All Students
              </li>
              <li>
                <img src="images/bx-purchase-tag.svg" alt="">
                Php 15.00
              </li>
            </ul>
          </div>

        </div>
      </div>
      <div>
        <img src="images/febibig.jpg" alt="" class="h-[650px] w-[650px] ml-4 ">
      </div>
    </div>

    <!-- Registration Form -->

    <div>
      <form class="" method="post" autocomplete="off">
        <section>
          <div class="flex flex-col items-stretch px-10 pt-20">
            <h2 class="text-4xl font-semibold">Register Here</h2>
            <div class="bg-gradient-to-r from-sky-500/50 to-blue-500/50 justify-center items-stretch flex w-full flex-col -mr-5 mt-8 px-7 py-8 rounded-[10px] max-md:max-w-full max-md:mt-10 max-md:px-5">
              <!-- First Row Info -->
              <div class="justify-between max-md:max-w-full">
                <div class="gap-5 flex max-md:flex-col max-md:items-stretch max-md:gap-0">
                  <!-- Full Name -->
                  <div class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="fullname" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Full Name</label>
                      <input type="text" name="fullname" id="fullname" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" placeholder="Full Name" required />
                    </div>
                  </div>
                  <!-- Student Number -->
                  <div class="flex flex-col items-stretch w-[35%] ml-5 max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="student_num" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Student Number</label>
                      <input id="student_num" name="student_num" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" placeholder="Student Number" required />
                    </div>
                  </div>
                  <!-- Program -->
                  <div class="flex flex-col items-stretch w-[33%] ml-5 max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="program" class="text-[#401b1b] text-base font-extrabold leading-6 whitespace-nowrap">Program</label>
                      <div class="w-88 relative">
                        <input type="text" id="program" name="program" placeholder="Program" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" />
                      </div>
                    </div>
                  </div>
                  <!-- end of program -->
                </div>
              </div>
              <!-- First Row Info -->
              <div class="justify-between mt-10 max-md:max-w-full">
                <div class="gap-14 flex max-md:flex-col max-md:items-stretch max-md:gap-0">
                  <!-- Full Name -->
                  <div class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="fullname" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Full Name</label>
                      <input type="text" name="fullname" id="fullname" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" placeholder="Year" value="
                      <?php
                      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        $email = $_SESSION['email'];
                        $sql = "Select * from users where email='$email'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['fullname'];
                      }
                      ?>
                      " required />
                    </div>
                  </div>

                  <!-- Student Number -->
                  <div class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="student_num" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Student Number</label>
                      <input type="text" name="student_num" id="student_num" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" placeholder="Section" value="
                      <?php
                      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        $email = $_SESSION['email'];
                        $sql = "Select * from users where email='$email'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['studentNum'];
                      }
                      ?>
                      " required />
                    </div>
                  </div>
                  <!-- Email -->
                  <div class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="email" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Email</label>
                      <input type="text" name="email" id="email" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" placeholder="Email" value="
                      <?php
                      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        $email = $_SESSION['email'];
                        $sql = "Select * from users where email='$email'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['email'];
                      }
                      ?>
                      " required />
                    </div>
                  </div>

                </div>
              </div>



















































              <!-- Second Row Info -->
              <div class="justify-between mt-10 max-md:max-w-full">
                <div class="gap-14 flex max-md:flex-col max-md:items-stretch max-md:gap-0">
                  <!-- Year -->
                  <div class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="year" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Year</label>
                      <input type="text" name="year" id="year" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" placeholder="Year" required />
                    </div>
                  </div>

                  <!-- Section -->
                  <div class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="sec" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Section</label>
                      <input type="text" name="sec" id="sec" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" placeholder="Section" required />
                    </div>
                  </div>
                  <!-- Email -->
                  <div class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="reg_email" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Email</label>
                      <input type="text" name="reg_email" id="reg_email" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" placeholder="Email" required />
                    </div>
                  </div>

                </div>
              </div>

              <!-- Third Row Info -->
              <div class="justify-between mt-10 max-md:max-w-full">
                <div class="gap-14 flex max-md:flex-col max-md:items-stretch max-md:gap-0">
                  <!-- Payment Option -->
                  <div class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0">
                    <div class="items-stretch flex grow flex-col max-md:mt-10">
                      <label for="payment" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Payment Option</label>
                      <div class="w-88 relative">
                        <select type="text" name="payment" id="payment" placeholder="Payment Option" class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1" autocomplete="off">
                          <option value=""></option>
                          <option value="Cash">Cash</option>
                          <option value="Online">Online</option>
                        </select>

                      </div>
                    </div>
                  </div>

                  <!-- Section 
                <div
                  class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0"
                >
                  <div class="items-stretch flex grow flex-col max-md:mt-10">
                    <label
                      for="sec"
                      class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap"
                      >Section</label
                    >
                    <input
                      type="text"
                      name="sec"
                      id="sec"
                      class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1"
                      placeholder="Section"
                      required
                    />
                  </div>
                </div>
                -->
                  <!-- Email 
                <div
                  class="flex flex-col items-stretch w-[33%] max-md:w-full max-md:ml-0"
                >
                  <div class="items-stretch flex grow flex-col max-md:mt-10">
                    <label
                      for="reg_email"
                      class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap"
                      >Email</label
                    >
                    <input
                      type="text"
                      name="reg_email"
                      id="reg_email"
                      class="bg-[#eff0f2] mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[50px] max-md:pl-1"
                      placeholder="Email"
                      required
                    />
                  </div>
                </div>
-->
                </div>
              </div>



            </div>
          </div>
        </section>
        <section>
          <div class="flex flex-col items-stretch px-10">
            <div class="bg-gradient-to-r from-sky-500/50 to-blue-500/50 justify-center items-stretch flex w-full flex-col -mr-5 mt-8 px-7 py-8 rounded-[10px] max-md:max-w-full max-md:mt-10 max-md:px-5">
              <div class="items-stretch flex grow flex-col max-md:mt-10">
                <label for="note" class="text-[#401b1b] text-base font-bold leading-6 whitespace-nowrap">Note</label>

              </div>
              <input type="text" name="note" id="note" class="bg-[#eff0f2] align-text-top mt-3 py-3 px-5 w-full border border-gray-300 p-3 focus:outline-none focus:ring-[#ab644d] focus:ring-1 rounded-[10px] max-md:pl-1" placeholder="Add note here" required />
            </div>

          </div>


          <!-- component -->

          <section class="mb-20">
            <div class="flex flex-col items-stretch px-16">
              <div class="justify-center items-stretch  flex w-full flex-col -mr-5 px-7 mt-12 rounded-[30px] max-md:max-w-full max-md:mt-10 max-md:px-5">
                <button type="submit" name="submit" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 justify-center items-center shadow-2xl flex w-[200px] max-w-full gap-2 mt-6 px-12 py-5 rounded-[40px] self-center max-md:mt-10 max-md:px-5">

                  <h2 class="text-gray-200 text-center text-lg font-extrabold leading-6">Submit</h2>
                </button>
              </div>
            </div>
          </section>
      </form>
    </div>
  </div>

</body>
<script src="programs.js"></script>

</html>