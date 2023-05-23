<table>
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item) : ?>
            <tr>
                <td><input type="checkbox" class="delete-item" value="<?= $item->id ?>"></td>
                <td><?= $item->id ?></td>
                <td><?= $item->name ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<button id="delete-selected">Delete Selected</button>

<script>
    $(function() {
        $('#delete-selected').click(function() {
            var selectedItems = [];
            $('.delete-item:checked').each(function() {
                selectedItems.push($(this).val());
            });

            $.ajax({
                url: '<?= base_url('items/delete_selected') ?>',
                method: 'POST',
                data: {
                    items: selectedItems
                },
                success: function(response) {
                    location.reload(); // Refresh the page after delete
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>