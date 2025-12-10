<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="app">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar__header">
                <h1 class="sidebar__title">Courses</h1>
                <p class="sidebar__subtitle">Management</p>
            </div>

            <nav class="sidebar__nav">
                <button class="sidebar__btn" data-screen="list">
                    <span class="sidebar__icon">📋</span>
                    <span class="sidebar__label">Courses</span>
                </button>

                <button class="sidebar__btn" data-screen="add">
                    <span class="sidebar__icon">➕</span>
                    <span class="sidebar__label">Add course</span>
                </button>
                <button class="sidebar__btn" data-screen="archive">
                    <span class="sidebar__icon">🗄️</span>
                    <span class="sidebar__label">Edit Courses</span>
                </button>
            </nav>

            <footer class="sidebar__footer">
                <p class="text-muted">UI Kit v1.0</p>
            </footer>
        </aside>
        <main class="max-w-7xl mx-auto px-4 py-8">
            <h2 class="text-3xl font-semibold mb-6">Available Courses</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Course Card -->
                

    <?php 
        include 'connect_db.php';
        $Courses = get_data_db();

        foreach($Courses as $course){

                echo '<div class="bg-grey rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                    <img src="./images/javascript-node-js-code.webp" alt="JavaScript" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">' .htmlspecialchars($course['tittle']).'</h3>
                        <p class="text-gray-600 mb-2">' .htmlspecialchars($course['started_at']).'</p>
                        <p class="text-gray-800 font-semibold">' .htmlspecialchars($course['levelof']).'</p>
                    </div>
                </div>';   
            }
    ?>
                <!-- <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                    <img src="https://source.unsplash.com/400x200/?python,code" alt="Python" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Python for Beginners</h3>
                        <p class="text-gray-600 mb-2">Duration: 6 weeks</p>
                        <p class="text-gray-800 font-semibold">Price: $59</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                    <img src="https://source.unsplash.com/400x200/?web,development" alt="Web Development" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Web Development Bootcamp</h3>
                        <p class="text-gray-600 mb-2">Duration: 12 weeks</p>
                        <p class="text-gray-800 font-semibold">Price: $199</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                    <img src="https://source.unsplash.com/400x200/?react,code" alt="React" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">React Advanced</h3>
                        <p class="text-gray-600 mb-2">Duration: 8 weeks</p>
                        <p class="text-gray-800 font-semibold">Price: $129</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                    <img src="https://source.unsplash.com/400x200/?data,science" alt="Data Science" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Data Science with Python</h3>
                        <p class="text-gray-600 mb-2">Duration: 10 weeks</p>
                        <p class="text-gray-800 font-semibold">Price: $149</p>
                    </div>
                </div> -->

            </div>
        </main>
    </div>
</body>

</html>