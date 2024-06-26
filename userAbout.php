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

<body class="min-h-screen relative bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200">
  <!-- Gradient Background -->
  <div class="blob w-full h-full rounded-[999px] absolute top-0 right-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200"></div>
  <div class="blob w-[1000px] h-[1000px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-red-200 via-gray-100 to-blue-100"></div>
  <div class="blob w-[600px] h-[600px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-slate-100 via-teal-100 to-blue-100"></div>
  <div class="blob w-[300px] h-[300px] rounded-[999px] absolute bottom-[10px] left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-green-200 via-cyan-200 to-Fuchsia-300"></div>
  <!-- End of Gradient Background -->
  <div class="flex flex-col items-stretch pb-4 pl-12 pr-12 max-md:px-5">
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
    <!-- Cavite State University - Bacoor Campus -->
    <section>
      <section>
        <div class="text-orange-950 text-center text-[75px] font-extrabold leading-[54px] max-w-[1500px] ml-5 mr-5 mb-10 mt-20">
          <h1>Cavite State University - Bacoor Campus</h1>
        </div>
        <section class="grid grid-cols-2 gap-16 px-20">
          <div class="text-orange-950 text-justify text-lg pt-10 leading-8 max-md:max-w-full max-md:mt-10">
            <p class="indent-8">Cavite State University - Bacoor Campus, is dedicated to providing high-quality education across various disciplines. Located in the vibrant city of Bacoor, this campus offers a range of undergraduate and graduate programs designed to meet the educational needs of the local community. Equipped with modern facilities, the Bacoor Campus supports a conducive learning environment and fosters academic excellence, research, and community engagement. As a public institution, it emphasizes accessibility and affordability, making higher education attainable for a diverse student population. </p>
          </div>
          <div>
            <img src="images/Bacoor-Campus-scaled.jpg" alt="">
          </div>
        </section>
      </section>
      <section class="grid grid-cols-2 gap-20 mx-20 pt-24">
        <div class="bg-gray-900 bg-opacity-5 text-orange-950 rounded-[10px] text-justify text-lg p-10 leading-8 max-md:max-w-full max-md:mt-10">
          <h3 class="text-center text-[45px] font-medium">Mission</h3>
          <p class="indent-8 pt-4">Cavite State University shall provide excellent, equitable and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities. It shall produce professional, skilled and morally upright individuals for global competitiveness.
        </div>
        <div class="bg-gray-900 bg-opacity-5 text-orange-950 rounded-[10px] text-justify text-lg p-10 leading-8 max-md:max-w-full max-md:mt-10">
          <h3 class="text-center text-[45px] font-medium">Vision</h3>
          <p class="indent-8 pt-4">The premier university in historic Cavite globally recognized for excellence in character development, academics, research, innovation and sustainable community engagement.
        </div>
      </section>
    </section>
    <!-- G! ARAT NA -->
    <section class="mt-16">
      <section class="pb-6">
        <div class="text-orange-950 text-center text-[75px] font-extrabold leading-[54px] max-w-[1500px] ml-5 mr-5 mb-10 mt-20">
          <h1>G! ARAT NA</h1>
        </div>
        <section class="grid grid-cols-2 gap-16 px-20">
          <div class="text-orange-950 text-justify text-lg leading-8 max-md:max-w-full max-md:mt-10">
            <p class="indent-8">Welcome to G! Arat Na, where efficiency meets accessibility in event management! Whether you're a student at Cavite State University - Bacoor Campus, we're excited to introduce you to our web-based event registration system tailored just for you. Say goodbye to manual methods and hello to a seamless event experience designed with students in mind.</p>
            <br>
            <p class="indent-8">Join us as we revolutionize the way events are organized and attended on campus. With our intuitive system, student organizers can effortlessly create, manage, and report on events with ease. You, as students, will enjoy the convenience of online registration forms and real-time updates on event availability, making attending events a breeze</p>
          </div>
          <div class="text-orange-950 text-justify text-lg leading-8 max-md:max-w-full max-md:mt-10">
            <p class="indent-8">Administrators, prepare to simplify your workflow and gain valuable insights into student participation. Our system offers reporting capabilities, ensuring you have the data you need to make informed decisions. Welcome to a new era of event management, where efficiency and accessibility reign supreme. Let's make every event at CvSU Bacoor Campus a memorable experience together.</p>
            <br>
            <p class="indent-8">At G! Arat Na, we're committed to continuous improvement and innovation. Your feedback is invaluable to us as we strive to enhance our system and provide an unparalleled event management experience for students. Together, let's shape the future of event organization at Cavite State University - Bacoor Campus.</p>
          </div>
        </section>
      </section>
      <img class="object-center mx-auto" src="images/arats.png" alt="">
    </section>
  </div>
</body>

</html>