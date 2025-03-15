<?php require ROOT . 'views/partials/header.partial.php' ?>
<?php require ROOT . 'views/partials/sidenav.partial.php' ?>

<div class="communication-container">
    <h1>Communications List 📰</h1>
    <fieldset class="communication-actions">
        <a href="/communications-create" role="button" tabindex="0">Add New</a>
        <form action="/communications" method="post" role="search">
            <input type="search" name="search-communication" placeholder="Search by Barcode, Sender, or Subject">
            <input type="submit" value="Search">
        </form>
    </fieldset>
    <small>*If you search by barcode, search it by its number. Search with empty value to retrieve all data again.</small>
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
                    <th scope="col">Days Overdue</th>
                    <th scope="col">Date Received</th>
                    <th scope="col">PDF / File Attachment</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($communications as $com): ?>
                    <tr>
                        <th scope="row">GFA-<?= $com['communication_id'] ?></th>
                        <td><?= $com['sender'] ?></td>
                        <td><?= $com['subject'] ?></td>
                        <td><?= $com['docdate'] ?></td>
                        <td><?= $com['category'] ?></td>
                        <td><?= $com['action_required'] ?></td>
                        <td><?= $com['status'] ?></td>
                        <td><?= $com['target_date'] ?></td>
                        <td><?= $com['overdue'] ?></td>
                        <td><?= $com['date_received'] ?></td>
                        <td>
                            <?php if (empty($com['pdf_file'])): ?>
                                No Attachment
                            <?php else: ?>
                                <a href="communication-uploads/<?= $com['pdf_file'] ?>" target="_blank" class="com-view-btn">
                                    View Attachment
                                </a>
                            <?php endif; ?>
                        </td>
                        <td class="com-actions">
                            <a href="/communications-edit?id=<?= $com['communication_id'] ?>" class="com-edit-btn">Edit</a>
                            <form action="/communications" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_id" value="<?= $com['communication_id'] ?>">
                                <input type="hidden" name="_file" value="communication-uploads/<?= $com['pdf_file'] ?>">
                                <button type="submit" class="com-del-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if ($pageLen >= 1): ?>
        <div class="pagination">
            <?php for ($i=0; $i < $pageLen; $i++): ?>
                <a href="/communications?p=<?= $i + 1; ?>&q=<?= $query ?>"><?= $i + 1; ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

<?php require ROOT . 'views/partials/footer.partial.php' ?>