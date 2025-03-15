<?php require 'partials/header.partial.php' ?>
<?php require 'partials/sidenav.partial.php' ?>

<div class="report-container">
    <h1>Generate Reports 📝</h1>
    <form action="" method="post">
        <fieldset class="report-actions grid">
            <select name="status" aria-label="Select status..." required>
                <option selected disabled value="">
                    Select status...
                </option>
                <option value="Received">Received</option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
            <input type="date" name="date-doc" aria-label="Date" required>
            <button type="submit" class="contrast">Generate Report</button>
            <?php if($filtered): ?>
                <a href="/reports" role="button">Reset</a>
            <?php endif; ?>
        </fieldset>
    </form>
    <div class="overflow-auto">
        <table class="striped">
            <thead>
                <tr>
                    <th scope="col">Barcode</th>
                    <th scope="col">Sender</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Doc. Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($reports as $report): ?>
                    <tr>
                        <th scope="row">GFA-<?= $report['communication_id'] ?></th>
                        <td><?= $report['sender'] ?></td>
                        <td><?= $report['subject'] ?></td>
                        <td><?= $report['docdate'] ?></td>
                        <td><?= $report['status'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <button class="secondary" onclick="window.print()">Print</button>
</div>

<?php require 'partials/footer.partial.php' ?>