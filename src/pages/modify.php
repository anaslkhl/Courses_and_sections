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
        <label for="date">started at</label>
        <input type="date" id="url" name="started_at" placeholder="https://example.com/image.jpg">
    </div>

    <button action="add_cour()" type="submit">Add</button>
</form>
<?php
    
 ?>


<?php
include('form_validation.php');
check_validation($_POST);
add_cours($_POST);
?>


