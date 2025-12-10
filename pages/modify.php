<form method="POST">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" placeholder="Enter a title">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Enter a description"></textarea>
    </div>

    <div class="form-group">
        <label for="option">Choose an option</label>
        <select id="option" name="option">
            <option selected disabled>Select one</option>
            <option>development</option>
            <option>engineering</option>
            <option>programming</option>
        </select>
    </div>

    <div class="form-group">
        <label for="url">Image URL</label>
        <input type="url" id="url" name="url" placeholder="https://example.com/image.jpg">
    </div>

    <button type="submit">Submit</button>
</form>


<?php
include('form_validation.php');
check_validation($_POST);
?>