<?php require ROOT . 'views/partials/header.partial.php' ?>
<?php require ROOT . 'views/partials/sidenav.partial.php' ?>

<div class="communication-container">
    <h1>Communications List 📰</h1>
    <fieldset class="communication-actions">
        <a href="/communications/create" role="button" tabindex="0">Add New</a>
        <form action="" method="post" role="search">
            <input type="search" name="search-communication" placeholder="Search by Barcode, Sender, or Subject">
            <input type="submit" value="Search">
        </form>
    </fieldset>
    <div class="overflow-auto">
        <table class="striped">
            <thead>
                <tr>
                    <th scope="col">Barcode</th>
                    <th scope="col">Sender</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Doc. Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action Required</th>
                    <th scope="col">Status</th>
                    <th scope="col">Target Date</th>
                    <th scope="col">Date Received</th>
                    <th scope="col">PDF / File Attachment</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<?php require ROOT . 'views/partials/footer.partial.php' ?>