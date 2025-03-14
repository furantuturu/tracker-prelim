<?php require ROOT . 'views/partials/header.partial.php' ?>

<div class="create-communication-container">
    <h1>Edit Communication 📰</h1>
    <a href="/communications">Back to List</a>
    <div data-theme="dark">
        <form action="/communications-edit?id=<?= $currCom['communication_id'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <?php if (isset($_SESSION['_flash']['emptyfielderror'])): ?>
                <div style="color: red;  margin-bottom: 1rem;"><?= $emptyField ?></div>
            <?php endif ?>
            <div>
                <label>
                    Subject
                    <input type="text" name="subject" placeholder="Subject" value="<?= $currCom['subject'] ?>" required>
                </label>
            </div>
            <div>
                <label>
                    Sender
                    <input type="text" name="sender" placeholder="Sender" value="<?= $currCom['sender'] ?>" required>
                </label>
            </div>
            <div>
                <label>
                    Document Date
                    <input type="date" name="date-doc" aria-label="Date" value="<?= $currCom['docdate'] ?>" required>
                </label>
            </div>
            <div>
                <label>
                    Category
                    <select name="category" aria-label="Select category..." value="<?= $currCom['category'] ?>" required>
                        <option disabled value="">
                            Select category...
                        </option>
                        <option <?= $currCom['category'] ? 'selected' : '' ?> value="Priority">Priority</option>
                        <option <?= $currCom['category'] ? 'selected' : '' ?> value="Routine">Routine</option>
                    </select>
                </label>
            </div>
            <div>
                <label>
                    Action Requested
                    <select name="action-requested" aria-label="Select action..." required>
                        <option disabled value="">
                            Select action...
                        </option>
                        <option <?= $currCom['action_required'] ? 'selected' : ''; ?> value="Others">Others</option>
                        <option <?= $currCom['action_required'] ? 'selected' : ''; ?> value="Info/Notation">Info/Notation</option>
                        <option <?= $currCom['action_required'] ? 'selected' : ''; ?> value="Reference/File">Reference/File</option>
                    </select>
                </label>
            </div>
            <div>
                <label>
                    Status
                    <select name="status" aria-label="Select status..." required>
                        <option disabled value="">
                            Select status...
                        </option>
                        <option <?= $currCom['status'] ? 'selected' : '' ?> value="Received">Received</option>
                        <option <?= $currCom['status'] ? 'selected' : '' ?> value="Pending">Pending</option>
                        <option <?= $currCom['status'] ? 'selected' : '' ?> value="Completed">Completed</option>
                    </select>
                </label>
            </div>
            <div>
                <label>
                    Target Date
                    <input type="date" name="date-target" aria-label="Date" value="<?= $currCom['target_date'] ?>" required>
                </label>
            </div>
            <div id="days-overdue">
                <label>
                    Days Overdue
                    <input type="number" name="days-overdue" value="<?= $currCom['overdue'] ?>" min="1" aria-label="Number" required>
                </label>
                <?php if (isset($_SESSION['_flash']['dayerror'])): ?>
                    <div style="color: red;  margin-bottom: 1rem;"><?= $dayErr ?></div>
                <?php endif ?>
            </div>
            <div>
                <label>
                    Date Received
                    <input type="date" name="date-received" aria-label="Date" value="<?= $currCom['date_received'] ?>" required>
                </label>
            </div>
            <div id="attachment">
                <label>
                    Attachment (PDF)
                    <input type="file" name="attachment" accept="application/pdf">
                </label>
                <?php if (isset($_SESSION['_flash']['uploaderror'])): ?>
                    <div style="color: red;  margin-bottom: 1rem;"><?= $uploadErr ?></div>
                <?php endif ?>
                <?php if (isset($_SESSION['_flash']['filetypeerr']) || isset($_SESSION['_flash']['fileexists']) || isset($_SESSION['_flash']['fileerror'])): ?>
                    <div style="color: red;  margin-bottom: 1rem;"><?= $fileErr ?></div>
                <?php endif ?>
                <div style="margin-bottom: .8rem;">Current PDF: <a href="communication-uploads/<?= $currCom['pdf_file'] ?>" target="_blank" rel="noopener noreferrer">View</a></div>
                <input type="hidden" name="_oldpdffile" value="communication-uploads/<?= $currCom['pdf_file'] ?>">
            </div>
            <input type="submit" class="outline" value="Edit">
        </form>
    </div>
</div>

<?php require ROOT . 'views/partials/footer.partial.php' ?>