<h2 class="text-3xl font-semibold mb-6">Available Courses</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Course Card -->
    <?php
    include 'connect_db.php';
    $Courses = get_data_db();

    foreach ($Courses as $course) {

        echo '<div class="bg-grey rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                                                <img src="./images/javascript-node-js-code.webp" alt="JavaScript" class="w-full h-48 object-cover">
                                                <div class="p-6">
                                                    <h3 class="text-xl font-bold text-gray-800 mb-2">' . htmlspecialchars($course['tittle']) . '</h3>
                                                    <p class="text-gray-600 mb-2">' . htmlspecialchars($course['started_at']) . '</p>
                                                    <p class="text-gray-800 font-semibold">' . htmlspecialchars($course['levelof']) . '</p>
                                                </div>
                                            </div>';
    }
    ?>

</div>