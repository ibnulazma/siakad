<html>

<head>
    <title>Add Multiple Data</title>
</head>

<body>
    <h2>Add Multiple Data</h2>
    <form method="post" action="<?php echo site_url('controller/insert_multiple_data'); ?>">
        <label><input type="checkbox" name="items[]" value="item1"> Item 1</label><br>
        <label><input type="checkbox" name="items[]" value="item2"> Item 2</label><br>
        <label><input type="checkbox" name="items[]" value="item3"> Item 3</label><br>
        <!-- Add more checkboxes as needed -->

        <input type="submit" value="Add Data">
    </form>
</body>

</html>