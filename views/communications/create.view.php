<?php require ROOT . 'views/partials/header.partial.php' ?>

<div class="create-communication-container">
    <h1>Create New Communication 📰+</h1>
    <a href="/communications">Back to List</a>
    <div data-theme="dark">
        <form action="/communications-create" method="post" enctype="multipart/form-data">
            <?php if (isset($_SESSION['_flash']['emptyfielderror'])): ?>
                <div style="color: red;  margin-bottom: 1rem;"><?= $emptyField ?></div>
            <?php endif ?>
            <div>
                <label>
                    Subject
                    <input type="text" name="subject" placeholder="Subject" required>
                </label>
            </div>
            <div>
                <label>
                    Sender
                    <input type="text" name="sender" placeholder="Sender" required>
                </label>
            </div>
            <div>
                <label>
                    Document Date
                    <input type="date" name="date-doc" aria-label="Date" required>
                </label>
            </div>
            <div>
                <label>
                    Category
                    <select name="category" aria-label="Select category..." required>
                        <option selected disabled value="">
                            Select category...
                        </option>
                        <option value="Priority">Priority</option>
                        <option value="Routine">Routine</option>
                    </select>
                </label>
            </div>
            <div>
                <label>
                    Action Requested
                    <select name="action-requested" aria-label="Select action..." required>
                        <option selected disabled value="">
                            Select action...
                        </option>
                        <option value="Others">Others</option>
                        <option value="Info/Notation">Info/Notation</option>
                        <option value="Reference/File">Reference/File</option>
                    </select>
                </label>
            </div>
            <div>
                <label>
                    Status
                    <select name="status" aria-label="Select status..." required>
                        <option selected disabled value="">
                            Select status...
                        </option>
                        <option value="Received">Received</option>
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                    </select>
                </label>
            </div>
            <div>
                <label>
                    Target Date
                    <input type="date" name="date-target" aria-label="Date" required>
                </label>
            </div>
            <div id="days-overdue">
                <label>
                    Days Overdue
                    <input type="number" name="days-overdue" value="1" min="1" aria-label="Number" required>
                </label>
                <?php if (isset($_SESSION['_flash']['dayerror'])): ?>
                    <div style="color: red;  margin-bottom: 1rem;"><?= $dayErr ?></div>
                <?php endif ?>
            </div>
            <div>
                <label>
                    Date Received
                    <input type="date" name="date-received" aria-label="Date" required>
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
            </div>
            <input type="submit" class="outline">
        </form>
    </div>
</div>

<?php require ROOT . 'views/partials/footer.partial.php' ?>