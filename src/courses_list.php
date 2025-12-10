<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <!-- Screen buttons (students will add JS to handle click + switch screens) -->
                <button class="sidebar__btn is-active" data-screen="stats" onclick="switch_screen(this)">
                    <span class="sidebar__label">Courses List</span>
                </button>

                <button class="sidebar__btn" data-screen="add" onclick="switch_screen(this)">
                    <span class="sidebar__icon">➕</span>
                    <span class="sidebar__label">Add course</span>
                </button>

                <button class="sidebar__btn" data-screen="list" onclick="switch_screen(this)" id="table_show">
                    <span class="sidebar__icon">📋</span>
                    <span class="sidebar__label">Events</span>
                </button>

                <button class="sidebar__btn" data-screen="archive" onclick="switch_screen(this)" id="table_archive">
                    <span class="sidebar__icon">🗄️</span>
                    <span class="sidebar__label">Archive</span>
                </button>
            </nav>

            <footer class="sidebar__footer">
                <p class="text-muted">UI Kit v1.0</p>
            </footer>
        </aside>
        <!-- Courses Section -->
<section class="px-6 py-12 bg-gray-50">
  <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Courses</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

    <!-- Course Card 1 -->
    <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition">
      <h3 class="text-xl font-semibold text-gray-900">Web Development Basics</h3>
      <p class="text-gray-600 mt-2">Learn how to build modern websites.</p>

      <div class="mt-4 flex justify-between">
        <span class="text-green-600 font-bold">$49</span>
        <span class="text-sm text-gray-500">10 hours</span>
      </div>
    </div>

    <!-- Course Card 2 -->
    <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition">
      <h3 class="text-xl font-semibold text-gray-900">Advanced JavaScript</h3>
      <p class="text-gray-600 mt-2">Master JavaScript and build dynamic apps.</p>

      <div class="mt-4 flex justify-between">
        <span class="text-green-600 font-bold">$79</span>
        <span class="text-sm text-gray-500">15 hours</span>
      </div>
    </div>

    <!-- Course Card 3 -->
    <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition">
      <h3 class="text-xl font-semibold text-gray-900">UI/UX Design Essentials</h3>
      <p class="text-gray-600 mt-2">Design beautiful and user-friendly interfaces.</p>

      <div class="mt-4 flex justify-between">
        <span class="text-green-600 font-bold">$69</span>
        <span class="text-sm text-gray-500">12 hours</span>
      </div>
    </div>

  </div>
</section>


    </div>
</body>

</html>