<?php
require 'conn.php';

if (isset($_POST["submit"])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $addtl_info = $_POST['addtl_info'];

    $query = "INSERT INTO events (title, author, date, time, location, price, image, description, addtl_info) VALUES ('$title', '$author', '$date', '$time', '$location', '$price', '$image', '$description', '$addtl_info')";

    $result = mysqli_query($conn, $query);
?><script type="text/javascript">
        alert("Event Successfully Added.");



        window.location.href = "adminDashboard.php";
    </script><?php




                //header("location: formrequest.html");
            }


                ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    <title>Add Event</title>
    <link rel="icon" type="image/x-icon" href="images/G!.png" />
    <link rel="stylesheet" href="table.css" type="text/css">
    <link href="/dist/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="pendpay.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

</head>

<body>
    <!-- Gradient Background -->
    <div class="blob w-full h-full rounded-[999px] absolute top-0 right-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200"></div>
    <div class="blob w-[1000px] h-[1000px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-red-200 via-gray-100 to-blue-100"></div>
    <div class="blob w-[600px] h-[600px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-slate-100 via-teal-100 to-blue-100"></div>
    <div class="blob w-[300px] h-[300px] rounded-[999px] absolute bottom-[10px] left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-green-200 via-cyan-200 to-Fuchsia-300"></div>
    <!-- End of Gradient Background -->

    <!-- Sidebar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <a href="adminDashboard.php" class="flex items-center py-6 ps-8 mb-5">
                <img src="images/G!.png" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">G! Arat Na</span>
            </a>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="adminDashboard.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-slate-50 hover:bg-gradient-to-l from-red-100 to-sky-700 group">
                        <img src="images/bxs-home-alt-2.svg" alt="" />
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="pendingpayments.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-slate-50 hover:bg-gradient-to-l from-red-100 to-sky-700">
                        <img src="images/bxs-file.svg" alt="" />
                        <span class="flex-1 ms-3 whitespace-nowrap">Pending Payment</span>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-red-100">
                            <?php
                            $sql1 = "Select * from registrations where payment_status='Pending'";
                            $result = mysqli_query($conn, $sql1);

                            if (isset($result)) {
                                $row = mysqli_num_rows($result);
                                echo $row;
                            }
                            ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg bg-gradient-to-l from-red-100 to-sky-700 dark:text-white hover:text-slate-50 hover:bg-sky-900 group">
                        <img src="images/bx-calendar-plus.svg" alt="" />
                        <span class="ms-3">Add Event</span>
                    </a>
                </li>
            </ul>

        </div>

    </aside>
    <!-- End of Sidebar -->


    <!-- Content div -->
    <div class="py-8 px-10 sm:ml-64">
        <!-- Header -->
        <div class="flex w-full items-center justify-between pb-8 gap-5 max-md:max-w-full max-md:flex-wrap">
            <h1 class="text-[#10182c] text-6xl font-bold my-auto">
                Add Event
            </h1>


            <!--Admin Dropdown-->
            <div class="max-w-lg">
                <button class="text-[#424242] bg-transparent hover:bg-transparent focus:ring-4 focus:ring-transparent font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown">
                    Account
                </button>

                <!-- Dropdown menu -->
                <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                    <div class="px-4 py-3">
                        <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                            $email = $_SESSION['email'];
                            $sql2 = "Select * from users where email='$email'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row = mysqli_fetch_assoc($result2);
                            echo '<p>' . $row['fullname'] . '</p>';
                        }
                        ?>
                    </div>
                    <ul class="py-1" aria-labelledby="dropdown">

                        <li>
                            <a href="login.php" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                        </li>
                    </ul>
                </div>
                <!-- End of Dropdown menu -->
            </div>
            <!--End of Admin Dropdown-->
        </div>
        <!-- End of Header -->

        <!-- Add Event Form -->

        <form class="" method="post" autocomplete="off">
            <div class="flex flex-col items-stretch">
                <div class="grid grid-cols-3 gap-6 bg-sky-900 bg-opacity-15 p-8 rounded-lg">
                    <!-- Event Name -->
                    <div class="flex flex-col items-stretch max-md:w-full max-md:ml-0">
                        <div class="items-stretch flex grow flex-col max-md:mt-10">
                            <label for="title" class="text-base font-bold leading-6 whitespace-nowrap">Event Name</label>
                            <input type="text" name="title" id="title" class="bg-red-50 bg-opacity-70 mt-3 py-3 px-5 w-full  p-3 focus:outline-none focus:ring-sky-900 focus:ring-1 rounded-full max-md:pl-1" placeholder="Event Name" required />
                        </div>
                    </div>
                    <!-- Author -->
                    <div class="flex flex-col items-stretch max-md:w-full max-md:ml-0">
                        <div class="items-stretch flex grow flex-col max-md:mt-10">
                            <label for="author" class="text-base font-bold leading-6 whitespace-nowrap">Author</label>
                            <input type="text" name="author" id="author" class="bg-red-50 bg-opacity-70 mt-3 py-3 px-5 w-full  p-3 focus:outline-none focus:ring-sky-900 focus:ring-1 rounded-full max-md:pl-1" placeholder="Author" required />
                        </div>
                    </div>
                    <!-- Date -->
                    <div class="flex flex-col items-stretch max-md:w-full max-md:ml-0">
                        <div class="items-stretch flex grow flex-col max-md:mt-10">
                            <label for="date" class="text-base font-bold leading-6 whitespace-nowrap">Date</label>
                            <input type="date" name="date" id="date" class="bg-red-50 bg-opacity-70 mt-3 py-3 px-5 w-full  p-3 focus:outline-none focus:ring-sky-900 focus:ring-1 rounded-full max-md:pl-1" placeholder="Date" required />
                        </div>
                    </div>
                    <!-- Time -->
                    <div class="flex flex-col items-stretch max-md:w-full max-md:ml-0">
                        <div class="items-stretch flex grow flex-col max-md:mt-10">
                            <label for="time" class="text-base font-bold leading-6 whitespace-nowrap">Time</label>
                            <input type="time" name="time" id="time" class="bg-red-50 bg-opacity-70 mt-3 py-3 px-5 w-full  p-3 focus:outline-none focus:ring-sky-900 focus:ring-1 rounded-full max-md:pl-1" placeholder="Time" required />
                        </div>
                    </div>
                    <!-- Location -->
                    <div class="flex flex-col items-stretch max-md:w-full max-md:ml-0">
                        <div class="items-stretch flex grow flex-col max-md:mt-10">
                            <label for="location" class="text-base font-bold leading-6 whitespace-nowrap">Location</label>
                            <input type="text" name="location" id="location" class="bg-red-50 bg-opacity-70 mt-3 py-3 px-5 w-full  p-3 focus:outline-none focus:ring-sky-900 focus:ring-1 rounded-full max-md:pl-1" placeholder="Location" required />
                        </div>
                    </div>
                    <!-- Price -->
                    <div class="flex flex-col items-stretch max-md:w-full max-md:ml-0">
                        <div class="items-stretch flex grow flex-col max-md:mt-10">
                            <label for="price" class="text-base font-bold leading-6 whitespace-nowrap">Price (If free, input "0.00")</label>
                            <input type="text" name="price" id="price" class="bg-red-50 bg-opacity-70 mt-3 py-3 px-5 w-full  p-3 focus:outline-none focus:ring-sky-900 focus:ring-1 rounded-full max-md:pl-1" placeholder="Price" required />
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="flex flex-col items-stretch max-md:w-full max-md:ml-0">
                        <div class="items-stretch flex grow flex-col max-md:mt-10">
                            <label for="image" class="text-base font-bold leading-6 whitespace-nowrap">Event Poster</label>
                            <input type="text" name="image" id="image" class="bg-red-50 bg-opacity-70 mt-3 py-3 px-5 w-full  p-3 focus:outline-none focus:ring-sky-900 focus:ring-1 rounded-full max-md:pl-1" placeholder="Enter File Name" required />
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="flex flex-col items-stretch max-md:w-full max-md:ml-0">
                        <div class="items-stretch flex grow flex-col max-md:mt-10">
                            <label for="description" class="text-base font-bold leading-6 whitespace-nowrap">Short Description</label>
                            <textarea type="text" name="description" id="description" class="bg-red-50 bg-opacity-70 mt-3 py-3 px-5 w-full p-3 focus:outline-none focus:ring-sky-900 focus:ring-1 rounded-md max-md:pl-1" placeholder="Short Event Description" required></textarea>
                        </div>
                    </div>
                    <!-- Additional Info -->
                    <div class="flex flex-col items-stretch max-md:w-full max-md:ml-0">
                        <div class="items-stretch flex grow flex-col max-md:mt-10">
                            <label for="addtl_info" class="text-base font-bold leading-6 whitespace-nowrap">Full Description</label>
                            <textarea type="text" name="addtl_info" id="addtl_info" class="bg-red-50 bg-opacity-70 mt-3 py-3 px-5 w-full  p-3 focus:outline-none focus:ring-sky-900 focus:ring-1 rounded-md max-md:pl-1" placeholder="Full Event Description" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Registration Form -->
            <!-- Submit Button -->
            <section>
                <div class="flex flex-col items-stretch px-16">
                    <div class="justify-center items-stretch flex w-full flex-col -mr-5 px-7 mt-8 rounded-[30px] max-md:max-w-full max-md:mt-10 max-md:px-5">
                        <button type="submit" name="submit" class="bg-sky-900 hover:text-slate-100 hover:bg-gradient-to-l from-red-100 to-sky-700 justify-center items-center shadow-2xl flex w-[200px] max-w-full gap-2 mt-6 px-12 py-5 rounded-[40px] self-center max-md:mt-10 max-md:px-5 text-gray-200 text-center font-extrabold leading-6">
                            Submit
                        </button>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- End of Add Event Form -->

</body>

</html>