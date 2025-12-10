<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Example</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Create Item</h2>

        <form class="space-y-5" method="POST">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text"
                       class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Enter a title"
                       name="title" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea
                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    rows="4"
                    placeholder="Enter a description"
                    name="description"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Choose an option</label>
                <select
                    class="w-full p-3 border rounded-lg bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none" name="option">
                    <option selected disabled></option>
                    <option>development</option>
                    <option>engineering</option>
                    <option>programming</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Image URL</label>
                <input type="url"
                       class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="https://example.com/image.jpg"
                       name="url" />
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition"
                    name="submit">
                Submit
            </button>

        </form>

    </div>

    <?php 
    include('form_validation.php');
    check_validation($_POST);
    ?>

</body>
</html>
