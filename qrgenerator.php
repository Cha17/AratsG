<?php
session_start();


include("conn.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Feb-Ibig 2024</title>
  <link rel="icon" type="image/x-icon" href="images/G.png" />
  <link href="/dist/output.css" rel="stylesheet" />
  <link rel="stylesheet" href="regFebibig.css">
</head>

<body>
  <!-- Gradient Background -->
  <div class="blob w-full h-full rounded-[999px] absolute top-0 right-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200"></div>
  <div class="blob w-[1000px] h-[1000px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-red-200 via-gray-100 to-blue-100"></div>
  <div class="blob w-[600px] h-[600px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-slate-100 via-teal-100 to-blue-100"></div>
  <div class="blob w-[300px] h-[300px] rounded-[999px] absolute bottom-[10px] left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-green-200 via-cyan-200 to-Fuchsia-300"></div>
  <!-- End of Gradient Background -->
  <div class="flex flex-col items-stretch pl-12 pr-12 max-md:px-5">
    <header>
      <nav class="flex w-full items-center justify-between gap-20 mt-10 max-md:max-w-full max-md:flex-wrap">
        <a href="index.php" class="flex items-stretch justify-between gap-5 my-auto max-md:max-w-full max-md:flex-wrap max-md:justify-center">
          <img src="images/G!.png" class="aspect-[4.09] object-contain object-center w-[200px] overflow-hidden shrink-0 max-w-full" alt="G! Arat Na" />
          <div class="justify-center self-start flex gap-10 my-auto max-md:max-w-full max-md:flex-wrap max-md:justify-center">
            <a href="index.php" class="text-stone-900 text-center text-base font-medium leading-5">Home</a>
            <a href="events.php" class="text-black text-center text-base font-extrabold leading-5">Events</a>
            <!--<?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                  echo "<a href='logout.php' class='text-black text-center text-base font-medium leading-5'>Logout</a>";
                } else {
                  echo "<a href='index.php' class='text-black text-center text-base font-medium leading-5'>Login</a>";
                }
                ?>-->
          </div>
        </a>
      </nav>
    </header>

    <section class="grid gap-20 grid-cols-2 justify-between pt-10">
      <!-- Left Side -->
      <div class="justify-center">
        <div class="flex flex-col items-stretch pl-16 max-md:max-w-full max-md:mt-10">
          <h1 class="text-red-950 text-[60px] font-extrabold mr-5 max-md:max-w-full max-md:text-4xl max-md:leading-[71px]">
            Request Successfully Sent
          </h1>
          <div>
            <p class="text-orange-950 leading-8 w-full mr-5 max-md:max-w-full">
              <span>You're all set! You've successfully registered for
                <span class="font-bold">Feb-Ibig 2024</span>
                <span>. Below is the summary of your registration and remember to settle your payment before the event.</span>
            </p>
          </div>
          <!-- Registration Details -->
          <div class="formbold-event-details">
            <h5>Registration Details</h5>
            <ul>
              <li>
                [Event Name]
              </li>
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
              <li>
                [Full Name]
              </li>
              <li>
                [Student Number]
              </li>
              <li>
                [email]
              </li>
              <li>
                [Program]
              </li>
              <li>
                [Year Level and Section (3 - 1)]
              </li>
              <li>
                [Payment Option]
              </li>
            </ul>
          </div>
          <!-- End of Registration Details -->
        </div>
      </div>
      <!-- End of Left Side -->

      <!-- Right Side -->
      <div class="justify-center">
        <!-- QR Code Generator Button -->
        <div class="flex items-stretch justify-center pt-8 gap-5 max-md:max-w-full max-md:flex-wrap max-md:pr-5">
          <button class="text-stone-100 text-center w-fit font-semibold leading-6 whitespace-nowrap bg-[#ab644d] p-4 items-center rounded-xl" onclick="generateQR()">Generate QR Code</button>
        </div>
        <!-- Description -->
        <div>
          <p class="text-center px-20 py-10">Your
            <span class="font-extrabold">Registration ID</span>
            is encoded in this QR Code. Please keep this confidential and do not share it with anyone. To register your attendance for the event, simply scan this code upon arrival.
          </p>
        </div>

        <!-- PHP Code for Registration ID -->
        <?php
        $sql = "SELECT reg_id FROM registrations ORDER BY reg_id DESC LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        $theone = mysqli_fetch_assoc($result)
        ?>

        <!-- Control Number -->
        <div class="flex  justify-center pb-7">
          <input type="text" class="bg-inherit text-center p-2 border h-[56px] rounded-xl border-solid border-orange-950" value="<?php echo $theone['reg_id']; ?>" id="qrText" readonly>
          <div id="dwld" class="flex justify-center items-center gap-5 ml-6 max-md:max-w-full max-md:flex-wrap max-md:pr-5">
            <a class="text-stone-100 font-semibold leading-6 whitespace-nowrap bg-[#ab644d] p-4 rounded-full shadow-md" onclick="downloadQR()">
              <img src="images/bx-download.svg" alt="">
            </a>
          </div>
        </div>
        <!-- QR Code -->
        <div id="qrImageContainer" class="hidden ">
          <img src="" id="qrImage" class="mx-auto rounded-lg border border-orange-950 p-2 h-[190px] w-[190px]" />
        </div>
      </div>
      <!-- End of Right Side -->
    </section>
  </div>
  <!-- <script src="script.js"></script> -->
  <script>
    let imgBox = document.getElementById("imgBox");
    let qrImage = document.getElementById("qrImage");
    let qrText = document.getElementById("qrText");
    let input = document.querySelector("input");
    let generatebtn = document.querySelector("generate");
    let downloadbtn = document.querySelector("download");


    function generateQR() {
      if (qrText.value.length > 0) {
        const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${qrText.value}`;
        fetch(qrUrl, {
            headers: {
              'Accept': 'image/png'
            }
          })
          .then(response => response.blob())
          .then(blob => {
            const imageUrl = URL.createObjectURL(blob);
            qrImage.src = imageUrl;
            document.getElementById("qrImageContainer").classList.remove("hidden");
            document.getElementById("dwld").classList.remove("hidden");
          })
          .catch(error => console.error('Error:', error));
      } else {
        qrText.classList.add("error");
        setTimeout(() => {
          qrText.classList.remove("error");
        }, 1000);
      }
    }

    function downloadQR() {
      const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${qrText.value}`;
      fetch(qrUrl, {
          headers: {
            'Accept': 'image/png'
          }
        })
        .then(response => response.blob())
        .then(blob => {
          const link = document.createElement("a");
          link.download = "Registration ID.png";
          link.href = URL.createObjectURL(blob);
          link.click();
        })
        .catch(error => console.error('Error:', error));
    }
  </script>







</body>

</html>