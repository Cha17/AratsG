<?php
require 'conn.php';
session_start();

// Confirm user role (optional function based on your logic)
roleConfirm($_SESSION['logged_in'], $_SESSION['email']);

// Check if the event ID is set for editing
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Fetch the event details from the database
    $sql = "SELECT * FROM events WHERE `event-id` = '$event_id'";
    $result = mysqli_query($conn, $sql);
    $event = mysqli_fetch_assoc($result);

    // Check if the event exists
    if (!$event) {
        die('Event not found.');
    }
}

// Handle update request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $addtl_info = mysqli_real_escape_string($conn, $_POST['addtl_info']);

    // Initialize the SQL query without image
    $sql = "UPDATE events SET 
            title='$title', 
            author='$author', 
            date='$date', 
            time='$time', 
            location='$location', 
            price='$price', 
            description='$description', 
            addtl_info='$addtl_info'";

    // Handle image update
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        // Process new image upload
        $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
        $upload_path = 'uploads/' . $image_name;

        // Create uploads directory if it doesn't exist
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
            // Delete old image if exists
            if (!empty($event['image']) && file_exists('uploads/' . $event['image'])) {
                unlink('uploads/' . $event['image']);
            }
            
            // Add image update to SQL query
            $sql .= ", image='$image_name'";
        } else {
            echo "<script>alert('Error uploading image.');</script>";
        }
    } elseif (isset($_POST['delete_image']) && $_POST['delete_image'] === "1") {
        // Handle image deletion
        if (!empty($event['image']) && file_exists('uploads/' . $event['image'])) {
            unlink('uploads/' . $event['image']);
        }
        $sql .= ", image=NULL";
    }

    $sql .= " WHERE `event-id`='$event_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Event successfully updated.'); window.location.href='adminDashboard.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error updating event: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    <title>Edit Event</title>
    <link rel="icon" type="image/x-icon" href="images/G!.png" />
    <link rel="stylesheet" href="table.css" type="text/css">
    <link href="/dist/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="pendpay.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
    <!-- Gradient Background -->
    <div class="blob w-full h-full rounded-[999px] absolute top-0 right-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200"></div>
    <div class="blob w-[1000px] h-[1000px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-red-200 via-gray-100 to-blue-100"></div>
    <div class="blob w-[600px] h-[600px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-slate-100 via-teal-100 to-blue-100"></div>
    <div class="blob w-[300px] h-[300px] rounded-[999px] absolute bottom-[10px] left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-green-200 via-cyan-200 to-Fuchsia-300"></div>

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
                    <a href="pendingpayment.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-slate-50 hover:bg-gradient-to-l from-red-100 to-sky-700">
                        <img src="images/bxs-file.svg" alt="" />
                        <span class="flex-1 ms-3 whitespace-nowrap">Events</span>
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

    <!-- Content div -->
    <div class="py-8 px-10 sm:ml-64">
        <!-- Header -->
        <div class="flex w-full items-center justify-between pb-8 gap-5 max-md:max-w-full max-md:flex-wrap">
            <h1 class="text-[#10182c] text-6xl font-bold my-auto">
                Edit Event
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
            </div>
        </div>

        <!-- Edit Event Form -->
        <form method="post" enctype="multipart/form-data">
            <div class="flex flex-col items-stretch">
                <div class="grid grid-cols-2 gap-6 bg-sky-900 bg-opacity-15 p-8 rounded-lg">
                    <!-- Event Name -->
                    <div class="flex flex-col">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-[5px]">Title</label>
                        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($event['title']); ?>" required class="w-full border border-gray-300 rounded-md p-[10px]" />
                    </div>

                    <!-- Author -->
                    <div class="flex flex-col">
                        <label for="author" class="text-sm font-semibold text-gray-700 mb-1">Author</label>
                        <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($event['author']); ?>" required 
                            class="bg-white py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent"
                            placeholder="Enter author name">
                    </div>

                    <!-- Date -->
                    <div class="flex flex-col">
                        <label for="date" class="text-sm font-semibold text-gray-700 mb-1">Date</label>
                        <input type="date" name="date" id="date" value="<?php echo htmlspecialchars($event['date']); ?>" required
                            class="bg-white py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent">
                    </div>

                    <!-- Time -->
                    <div class="flex flex-col">
                        <label for="time" class="text-sm font-semibold text-gray-700 mb-1">Time</label>
                        <input type="time" name="time" id="time" value="<?php echo htmlspecialchars($event['time']); ?>" required
                            class="bg-white py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent">
                    </div>

                    <!-- Location -->
                    <div class="flex flex-col">
                        <label for="location" class="text-sm font-semibold text-gray-700 mb-1">Location</label>
                        <input type="text" name="location" id="location" value="<?php echo htmlspecialchars($event['location']); ?>" required
                            class="bg-white py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent"
                            placeholder="Enter location">
                    </div>

                    <!-- Price -->
                    <div class="flex flex-col">
                        <label for="price" class="text-sm font-semibold text-gray-700 mb-1">Price (PHP)</label>
                        <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($event['price']); ?>" required
                            class="bg-white py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent"
                            placeholder="0.00">
                    </div>

                    <!-- Image Upload -->
                    <div class="flex flex-col col-span-2">
    <label for="image" class="text-sm font-semibold text-gray-700 mb-1">Event Poster</label>
    
    <div class="grid grid-cols-2 gap-6">
        <!-- Left Column - Image Preview -->
        <div class="flex flex-col justify-center items-center border-2 border-gray-300 rounded-lg p-4 min-h-[300px]">
            <?php if (!empty($event['image'])): ?>
                <img id="imagePreview" 
                     src="<?php echo 'uploads/' . htmlspecialchars($event['image']); ?>" 
                     alt="Event Poster" 
                     class="max-h-[250px] rounded-lg object-contain">
            <?php else: ?>
                <img id="imagePreview" 
                     src="images/placeholder-image.png" 
                     alt="No Image" 
                     class="max-h-[250px] rounded-lg object-contain opacity-50">
                <p class="text-gray-500 mt-2">No image uploaded</p>
            <?php endif; ?>
        </div>
        
        <!-- Right Column - Upload Controls -->
        <div class="flex flex-col justify-center items-center border-2 border-gray-300 rounded-lg p-4">
            <!-- Current Image Info -->
            <div class="w-full text-center mb-4">
                <p class="text-gray-600 font-medium">Current Poster</p>
                <p class="text-sm text-gray-500">
                    <?php echo !empty($event['image']) ? 
                        htmlspecialchars($event['image']) : 
                        'No image uploaded'; ?>
                </p>
            </div>

            <!-- Upload Button -->
            <div class="flex flex-col items-center gap-4 w-full">
                <label for="image" class="w-full">
                    <div class="bg-sky-900 text-white text-center py-2 px-4 rounded-lg cursor-pointer hover:bg-sky-800 transition-colors">
                        Change Poster
                    </div>
                    <input type='file' 
                           id='image' 
                           name='image' 
                           accept='image/*' 
                           onchange='previewImage(this)' 
                           class="hidden" />
                </label>

                <!-- Remove Button - Only show if there's an image -->
                <button type="button" 
                        onclick="removeImage()" 
                        class="w-full bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition-colors <?php echo empty($event['image']) ? 'hidden' : ''; ?>"
                        id="removeButton">
                    Remove Poster
                </button>
            </div>

            <!-- File Requirements -->
            <div class="mt-4 text-center">
                <p class="text-xs text-gray-500">Accepted formats: PNG, JPG, JPEG</p>
                <p class="text-xs text-gray-500">Max size: 5MB</p>
            </div>
        </div>
    </div>
    
    <!-- Hidden input to track image deletion -->
    <input type="hidden" name="delete_image" id="delete_image" value="0">
</div>
                    <!-- Description -->
                    <div class="flex flex-col col-span-2">
                        <label for="description" class="text-sm font-semibold text-gray-700 mb-1">Short Description</label>
                        <textarea name="description" id="description" required rows="3"
                            class="bg-white py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent"
                            placeholder="Enter a brief description"><?php echo htmlspecialchars($event['description']); ?></textarea>
                    </div>

                    <!-- Additional Info -->
                    <div class="flex flex-col col-span-2">
                        <label for="addtl_info" class="text-sm font-semibold text-gray-700 mb-1">Full Description</label>
                        <textarea name="addtl_info" id="addtl_info" required rows="5"
                            class="bg-white py-2 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent"
                            placeholder="Enter detailed description"><?php echo htmlspecialchars($event['addtl_info']); ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-8">
                <button type="submit" name="submit" 
                    class="bg-sky-900 hover:bg-sky-800 text-white font-semibold py-2 px-8 rounded-full focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                    Update Event
                </button>
            </div>
        </form>
    </div>

    <script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const removeButton = document.getElementById('removeButton');
    const deleteImageInput = document.getElementById('delete_image');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('opacity-50');
            removeButton.classList.remove('hidden');
            deleteImageInput.value = "0";
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const preview = document.getElementById('imagePreview');
    const removeButton = document.getElementById('removeButton');
    const fileInput = document.getElementById('image');
    const deleteImageInput = document.getElementById('delete_image');
    
    preview.src = 'images/placeholder-image.png';
    preview.classList.add('opacity-50');
    removeButton.classList.add('hidden');
    fileInput.value = '';
    deleteImageInput.value = "1";
}
</script>
</body>
</html>