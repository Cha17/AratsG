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
            <a href="userAbout.php" class="text-stone-900 text-center text-base font-medium leading-5">About</a>
            
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
    <h1 class="text-orange-950 text-[65px] font-extrabold pl-10 leading-[54px] w-[1012px] ml-4 mt-12 max-md:max-w-full max-md:mt-10">
      Events
    </h1>
    <section class="self-center flex max-w-full gap-5 mt-8 mb-10 max-md:flex-wrap max-md:justify-center max-md:mt-10">
      <div class="bg-gradient-to-tl from-transparent hover:from-[#FFFFFF] hover:via-[#e7be6e] hover:to-[#fc8044] self-stretch w-[250px] max-w-[250px] h-[320px] max-h-[320px] flex grow basis-0 flex-col items-stretch py-px rounded-xl">
        <div class="flex-col overflow-hidden relative flex w-full items-stretch px-6 pt-7 pb-9">
          <div class="relative flex items-stretch justify-between gap-2">
            <div class="bg-sky-900 flex w-1 shrink-0 h-[23px] flex-col rounded-3xl"></div>
            <h2 class="text-gray-950 text-xl font-medium leading-7 grow whitespace-nowrap self-start">
            𝐅𝐞𝐛-𝐈𝐛𝐢𝐠 2024
            </h2>
          </div>
          <p class="relative text-gray-700 text-base leading-5 opacity-90 mt-8">
            The Central Student Government presents Feb-Ibig 2024. Get ready
            for an event filled with activities, fun, and romance!
          </p>
          <a href="regfeb.php" class="flex items-end relative text-gray-700 text-sm font-bold leading-4 whitespace-nowrap mt-12 max-md:mt-10">Register Now</a>
        </div>
      </div>
      <div class="bg-gradient-to-tl from-transparent hover:from-[#FFFFFF] hover:via-[#e7be6e] hover:to-[#fc8044] self-stretch w-[250px] max-w-[250px] h-[330px] max-h-[330px] flex grow basis-0 flex-col items-stretch py-px rounded-xl">
        <div class="flex-col overflow-hidden relative flex w-full items-stretch px-6 pt-7 pb-12">
          <div class="relative flex items-stretch justify-between gap-2">
            <div class="bg-sky-900 flex w-1 shrink-0 h-[23px] flex-col rounded-3xl"></div>
            <h2 class="text-gray-950 text-xl font-medium leading-7 grow whitespace-nowrap self-start">
            𝐃𝐂𝐒 𝐖𝐄𝐄𝐊 2024
            </h2>
          </div>
          <p class="relative text-gray-700 text-base leading-5 opacity-90 mt-8">
            Gear up for DCS Week 2024! Join the Alliance of Computer
            Scientists and Information Technology Society in a week-long
            celebration of the Department of Computer Studies.
          </p>
          <a href="dcsweek.php" class="flex items-end relative text-gray-700 text-sm font-bold leading-4 whitespace-nowrap mt-12 max-md:mt-10">Register Now</a>
        </div>
      </div>
      <div class="bg-gradient-to-tl from-transparent hover:from-[#FFFFFF] hover:via-[#e7be6e] hover:to-[#fc8044] self-stretch w-[250px] max-w-[250px] h-[320px] max-h-[320px] flex grow basis-0 flex-col items-stretch py-px rounded-xl">
        <div class="flex-col overflow-hidden relative flex w-full items-stretch px-6 pt-7 pb-9">
          <div class="relative flex items-stretch justify-between gap-2">
            <div class="bg-sky-900 flex w-1 shrink-0 h-[23px] flex-col rounded-3xl"></div>
            <h2 class="text-gray-950 text-xl font-medium leading-7 grow whitespace-nowrap self-start">
            𝗠𝗜𝗡𝗗 𝗠𝗔𝗧𝗧𝗘𝗥𝗦
            </h2>
          </div>
          <p class="relative text-gray-700 text-base leading-5 opacity-90 mt-8">
          A seminar talking about Psychological First Aid and Mental Hygiene?
          “𝐌𝐈𝐍𝐃 𝐌𝐀𝐓𝐓𝐄𝐑𝐒: 𝐈𝐧𝐭𝐫𝐨𝐝𝐮𝐜𝐭𝐢𝐨𝐧 𝐭𝐨 𝐏𝐬𝐲𝐜𝐡𝐨𝐥𝐨𝐠𝐢𝐜𝐚𝐥 𝐅𝐢𝐫𝐬𝐭 𝐀𝐢𝐝 𝐚𝐧𝐝 𝐌𝐞𝐧𝐭𝐚𝐥 𝐇𝐲𝐠𝐢𝐞𝐧𝐞”.
          </p>
          <a href="ReqCOG.php" class="flex items-end relative text-gray-700 text-sm font-bold leading-4 whitespace-nowrap mt-12 max-md:mt-10">Register Now</a>
        </div>
      </div>
      <div class="bg-gradient-to-tl from-transparent hover:from-[#FFFFFF] hover:via-[#e7be6e] hover:to-[#fc8044] self-stretch w-[250px] max-w-[250px] h-[320px] max-h-[320px] flex grow basis-0 flex-col items-stretch py-px rounded-xl">
        <div class="flex-col overflow-hidden relative flex w-full items-stretch px-6 pt-7 pb-9">
          <div class="relative flex items-stretch justify-between gap-2">
            <div class="bg-sky-900 flex w-1 shrink-0 h-[23px] flex-col rounded-3xl"></div>
            <h2 class="text-gray-950 text-xl font-medium leading-7 grow whitespace-nowrap self-start">
            𝗦𝗘𝗠𝗜𝗡𝗔𝗥 𝗙𝗢𝗥 𝗬𝗢𝗨.💚🦋
            </h2>
          </div>
          <p class="relative text-gray-700 text-base leading-5 opacity-90 mt-8">
          𝗙𝗥𝗘𝗘 and remarkable 𝘀𝗲𝗺𝗶𝗻𝗮𝗿 entitled "𝗛𝗲𝗮𝗹𝘁𝗵 𝗔𝘄𝗮𝗿𝗲𝗻𝗲𝘀𝘀: 𝗙𝗼𝘀𝘁𝗲𝗿𝗶𝗻𝗴 𝗮 𝗛𝗲𝗮𝗹𝘁𝗵𝘆 𝗮𝗻𝗱 𝗣𝗿𝗼𝗱𝘂𝗰𝘁𝗶𝘃𝗲 𝗪𝗼𝗿𝗸 𝗘𝗻𝘃𝗶𝗿𝗼𝗻𝗺𝗲𝗻𝘁" at 𝗖𝗮𝗺𝗽𝘂𝘀 𝗚𝘆𝗺𝗻𝗮𝘀𝗶𝘂𝗺.
          </p>
          <a href="ReqCOE.php" class="flex items-end relative text-gray-700 text-sm font-bold leading-4 whitespace-nowrap mt-12 max-md:mt-10">Register Now</a>
        </div>
      </div>
    </section>
  </div>
</body>

</html>