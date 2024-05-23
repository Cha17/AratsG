<?php
require('conn.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>G! Arat Na</title>
  <link rel="icon" type="image/x-icon" href="images/G!.png" />
  <link href="/dist/output.css" rel="stylesheet" />
  <link rel="stylesheet" href="regFebibig.css">
</head>

<body
    class="bg-fixed bg-no-repeat bg-cover bg-center bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#f3f4f5] via-[#e0e8ed] to-[#d0dde6]"
  >
    
      <div class="flex flex-col items-stretch pb-10 pl-12 pr-12 max-md:px-5">
      <header>
      <nav class="flex w-full items-center justify-between gap-20 mt-10 max-md:max-w-full max-md:flex-wrap">
        <a href="index.php" class="flex items-stretch justify-between gap-5 my-auto max-md:max-w-full max-md:flex-wrap max-md:justify-center">
          <img src="images/G!.png" class="aspect-[4.09] object-contain object-center w-[200px] overflow-hidden shrink-0 max-w-full" alt="G! Arat Na" />
          <div class="justify-center self-start flex gap-10 my-auto max-md:max-w-full max-md:flex-wrap max-md:justify-center">
            <a href="index.php" class="text-stone-900 text-center text-base font-medium leading-5">Home</a>
            <a href="events.php" class="text-stone-900 text-center text-base font-medium leading-5">Events</a>
            <a href="userAbout.php" class="text-black text-center text-base font-extrabold leading-5">About</a>
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
              <div class="text-orange-950 text-center text-5xl font-extrabold leading-[54px] max-w-[1500px] ml-5 mr-5 mb-10 mt-16">
                <span class="text-orange-950"> CvSU <br /> </span>
                <span class="text-pink-900">C</span>
                <span class="text-orange-950">avite</span>
                <span class="text-pink-900">S</span>
                <span class="text-orange-950">atate</span>
                <span class="text-pink-900">U</span>
                <span class="text-orange-950">niversity</span>
                <span class="text-orange-950">-</span>
                <span class="text-pink-900">B</span>
                <span class="text-orange-950">acoor</span>
                <span class="text-pink-900">C</span>
                <span class="text-orange-950">ampus</span>
              </div>
              <img loading="lazy" srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/63236c64-2748-462e-a052-ac21953575aa?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=100 100w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/63236c64-2748-462e-a052-ac21953575aa?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=200 200w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/63236c64-2748-462e-a052-ac21953575aa?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=400 400w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/63236c64-2748-462e-a052-ac21953575aa?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=800 800w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/63236c64-2748-462e-a052-ac21953575aa?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=1200 1200w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/63236c64-2748-462e-a052-ac21953575aa?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=1600 1600w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/63236c64-2748-462e-a052-ac21953575aa?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=2000 2000w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/63236c64-2748-462e-a052-ac21953575aa?apiKey=949dc02d5acc420a9a54e7e811a36e3e&"
              class="aspect-[1.46] object-contain object-center w-full overflow-hidden max-w-[1240px] mt-16 max-md:max-w-full max-md:mt-10" />
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/37790781-cd2c-4ad2-8a18-bd4b0218d0b9?apiKey=949dc02d5acc420a9a54e7e811a36e3e&" 
              class="aspect-[42] object-contain object-center w-[1344px] overflow-hidden mt-20 max-md:max-w-full max-md:mt-10" />
              <div class="text-orange-950 text-center text-5xl font-extrabold leading-[54px] max-w-[1200px] ml-10 mr-10 mb-10 mt-16">
                <span class="text-orange-950"> CvSU <br /> </span>
                <span class="text-pink-900">C</span>
                <span class="text-orange-950">avite</span>
                <span class="text-pink-900">S</span>
                <span class="text-orange-950">tate</span>
                <span class="text-pink-900">U</span>
                <span class="text-orange-950">niversity</span>
                <span class="text-orange-950">-</span>
                <span class="text-pink-900">B</span>
                <span class="text-orange-950">acoor</span>
                <span class="text-pink-900">C</span>
                <span class="text-orange-950">ampus</span>
              </div>
              <div class="w-full max-w-[1234px] mt-28 max-md:max-w-full max-md:mt-10">
                <div class="gap-5 flex max-md:flex-col max-md:items-stretch max-md:gap-0">
                  <div class="flex flex-col items-stretch w-6/12 max-md:w-full max-md:ml-0">
                    <div class="text-orange-950 text-justify text-lg font-semibold leading-8 max-md:max-w-full max-md:mt-10">
                      <span class="font-extrabold">Welcome to G! Arat na!</span>
                      <span class="font-semibold">,</span>
                      <span class="font-medium"> your gateway to a seamless and efficient admission and enrollment experience. 
                        At PAPS, we prioritize simplicity, transparency, and user-friendliness. Our platform is designed to 
                        streamline the admission process, providing you with a stress-free journey into academic success. 
                        <br /> <br /> Discover a user-centric interface that guides you through each step, ensuring clarity 
                        and ease of use. We are committed to maintaining the highest standards of security to safeguard your 
                        information throughout the application process. <br /> </span>
                    </div>
                  </div>
                  <div class="flex flex-col items-stretch w-6/12 ml-5 max-md:w-full max-md:ml-0">
                    <div class="text-orange-950 text-justify text-lg font-medium leading-8 max-md:max-w-full max-md:mt-10">
                      At PAPS, we understand that every student is unique. Our Admission System is tailored to accommodate diverse needs, making it accessible for all prospective students. Whether you're a first-time applicant or a transfer student, our system is designed to cater to your specific requirements. <br /> <br /> Experience a new era of admissions, where efficiency meets a personalized approach. We are excited to be part of your educational journey, and our Admission System is here to make the process as smooth as possible. Welcome to a world of possibilities at PAPS.
                    </div>
                  </div>
                </div>
              </div>
              <img loading="lazy" srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/8431b76f-c480-4d30-b7fe-97c3044cdb01?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=100 100w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/8431b76f-c480-4d30-b7fe-97c3044cdb01?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=200 200w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/8431b76f-c480-4d30-b7fe-97c3044cdb01?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=400 400w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/8431b76f-c480-4d30-b7fe-97c3044cdb01?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=800 800w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/8431b76f-c480-4d30-b7fe-97c3044cdb01?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=1200 1200w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/8431b76f-c480-4d30-b7fe-97c3044cdb01?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=1600 1600w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/8431b76f-c480-4d30-b7fe-97c3044cdb01?apiKey=949dc02d5acc420a9a54e7e811a36e3e&width=2000 2000w, 
              https://cdn.builder.io/api/v1/image/assets/TEMP/8431b76f-c480-4d30-b7fe-97c3044cdb01?apiKey=949dc02d5acc420a9a54e7e811a36e3e&"
              class="w-[330px] mx-auto mt-28 mb-11 block" />
            </div>
          </div>

    </div>
  </body>

</html>

