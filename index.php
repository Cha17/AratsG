<?php
require('conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>G! Arat Na</title>
    <link rel="icon" type="image/x-icon" href="images/G!.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>



<body class="bg-gray-50">
   <!-- Gradient Background -->
   <div class="blob w-full h-full rounded-[999px] absolute top-0 right-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200"></div>
  <div class="blob w-[1000px] h-[1000px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-red-200 via-gray-100 to-blue-100"></div>
  <div class="blob w-[600px] h-[600px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-slate-100 via-teal-100 to-blue-100"></div>
  <div class="blob w-[300px] h-[300px] rounded-[999px] absolute bottom-[10px] left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-green-200 via-cyan-200 to-Fuchsia-300"></div>
  <!-- End of Gradient Background -->
    <!-- Header with sticky navigation -->
    <header class="fixed top-0 w-full bg-white/80 backdrop-blur-md shadow-sm z-50">
       <!-- Gradient Background -->
   <div class="blob w-full h-full rounded-[999px] absolute top-0 right-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200"></div>
  <div class="blob w-[1000px] h-[1000px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-red-200 via-gray-100 to-blue-100"></div>
  <div class="blob w-[600px] h-[600px] rounded-[999px] absolute bottom-0 left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-slate-100 via-teal-100 to-blue-100"></div>
  <div class="blob w-[300px] h-[300px] rounded-[999px] absolute bottom-[10px] left-0 -z-10 blur-3xl bg-opacity-60 bg-gradient-to-r from-green-200 via-cyan-200 to-Fuchsia-300"></div>
  <!-- End of Gradient Background -->
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <a href="index.php" class="flex items-center space-x-4">
                    <img src="images/G!.png" class="w-10 h-auto" alt="G! Arat Na" />G! Arat Na
                </a>
                
                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-bars text-gray-600 text-xl"></i>
                </button>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-gray-800 hover:text-blue-600 font-bold transition-colors">Home</a>
                    <a href="events.php" class="text-gray-800 hover:text-blue-600 font-medium transition-colors">Events</a>
                    <a href="events.php" class="text-gray-800 hover:text-blue-600 font-medium transition-colors">About</a>
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        echo '<a href="logout.php" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">Logout</a>';
                    } else {
                        echo '<a href="login.php" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">Login</a>';
                    }
                    ?>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-4">
                    <a href="index.php" class="text-gray-800 hover:text-blue-600 font-medium transition-colors">Home</a>
                    <a href="events.php" class="text-gray-800 hover:text-blue-600 font-medium transition-colors">Events</a>
                    <a href="userAbout.php" class="text-gray-800 hover:text-blue-600 font-medium transition-colors">About</a>
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        echo '<a href="logout.php" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors text-center">Logout</a>';
                    } else {
                        echo '<a href="login.php" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-center">Login</a>';
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>

   <!-- Main Content with top padding for fixed header -->
   <main class="pt-28 pb-6">
    <!-- Two Column Layout Container -->
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex flex-col md:flex-row gap-20">
            <!-- Left Column - Main Carousel -->
            <div class="md:w-3/4">
                <div class="carousel relative">
                    <div class="list overflow-hidden rounded-2xl shadow-xl">
                        <?php
                        // Fetch events from the database
                        $sql = "SELECT * FROM events ORDER BY `event-id` DESC";
                        $query = mysqli_query($conn, $sql);
                        $events = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        $totalEvents = count($events);

                        // Function to render an event item
                        function renderEventItem($event, $isVisible = false) {
                            // Construct the image path
                            $imagePath = 'uploads/' . ($event['image'] ? $event['image'] : 'default-event.jpg');
                            ?>
                            <div class="item relative <?= $isVisible ? '' : 'hidden'; ?>">
                                <img src="<?= htmlspecialchars($imagePath); ?>" 
                                     alt="<?= htmlspecialchars($event['title']); ?>" 
                                     class="w-full <?= $isVisible ? 'h-[550px]' : 'h-[500px]'; ?> object-cover" />
                                <div class="content absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end">
                                    <div class="p-8 text-white max-w-2xl">
                                        <div class="text-blue-400 font-medium mb-2"><?= htmlspecialchars($event['author']); ?></div>
                                        <h2 class="text-4xl font-bold mb-4"><?= htmlspecialchars($event['title']); ?></h2>
                                        <p class="text-lg mb-6"><?= htmlspecialchars($event['description']); ?></p>
                                        <button onclick="location.href='regform.php?event_id=<?= $event['event-id']; ?>'" 
                                                class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                            Register Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        // Display events in the carousel
                        if ($totalEvents > 0) {
                            // Render the first event as visible (main event)
                            renderEventItem($events[0], true);

                            // Render remaining events as hidden
                            for ($i = 1; $i < $totalEvents; $i++) {
                                renderEventItem($events[$i]);
                            }
                        }
                        ?>
                    </div>

                    <!-- Navigation Arrows -->
                    <div class="arrows">
                        <button id="prev" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white/80 p-3 rounded-full shadow-lg hover:bg-white transition-colors">
                            <i class="fas fa-chevron-left text-gray-800"></i>
                        </button>
                        <button id="next" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white/80 p-3 rounded-full shadow-lg hover:bg-white transition-colors">
                            <i class="fas fa-chevron-right text-gray-800"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Column - Thumbnails -->
            <div class="md:w-1/4">
                <div class="sticky top-24">
                    <h3 class="text-lg font-semibold mb-4">Event Preview</h3>
                    <div class="flex flex-col space-y-4">
                        <?php
                        // Display thumbnails for all events
                        foreach ($events as $event) {
                            // Construct the image path for thumbnails
                            $thumbnailPath = 'uploads/' . ($event['image'] ? $event['image'] : 'default-event.jpg');
                            ?>
                            <div class="item cursor-pointer transform hover:scale-105 transition-transform">
                                <img src="<?= htmlspecialchars($thumbnailPath); ?>" 
                                     alt="<?= htmlspecialchars($event['title']); ?>" 
                                     class="w-full h-32 object-cover rounded-lg border-2 border-gray-300" />
                                <p class="mt-2 text-sm font-medium"><?= htmlspecialchars($event['title']); ?></p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

   
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    <script src="carousel.js"></script>
</body>
</html>