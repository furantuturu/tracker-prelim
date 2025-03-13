<?php require 'partials/header.partial.php' ?>

<div class="file-attach-container" data-theme="dark">
    <a href="/communications">Back to List</a>
    <form action="/attach" method="post" enctype="multipart/form-data">
        <h1>Upload PDF attachment</h1>
        <div>
            <label>
                Choose PDF file to upload:
                <input type="file" name="attachment" accept="application/pdf">
            </label>
            <?php if(isset($_SESSION['_flash']['filetypeerr']) || isset($_SESSION['_flash']['fileexists']) || isset($_SESSION['_flash']['fileerror'])): ?>
                <div style="color: red;  margin-bottom: 1rem;"><?= $uploadErr ?></div>
            <?php endif ?>
            <?php if(isset($_SESSION['_flash']['filesuccess'])): ?>
                <div style="color: lightgreen;  margin-bottom: 1rem;"><?= $uploadSucc ?></div>
            <?php endif ?>
            <button type="submit" style="width: unset;">Upload PDF</button>
        </div>
    </form>
    <hr>
    <form class="search-pdf-form">
        <h2>Search Uploaded PDFs</h2>
        <div role="search">
            <input type="search" name="search-pdf" placeholder="Enter pdf name to search..." required>
            <input type="submit" value="Search" class="search-pdf-btn secondary">
        </div>
    </form>
    <hr>
    <div id="uploaded-files">
        <h2>Uploaded PDF Files</h2>
        <?php if(isset($_SESSION['_flash']['filedelete'])): ?>
            <div style="color: lightgreen;  margin-bottom: 1rem;"><?= $fileDel ?></div>
        <?php endif ?>
        <div class="overflow-auto">
            <table class="striped">
                <thead>
                    <tr>
                        <th scope="col">PDF File name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="uploaded-files-tbody">
                    <?php foreach($uploadedPDFS as $pdf): ?>
                        <tr>
                            <td><?= $pdf['filename'] ?></td>
                            <td class="upload-actions">
                                <a href="uploads/<?= $pdf['filename'] ?>" target="_blank" class="upload-view-btn">View</a>
                                <a href="uploads/<?= $pdf['filename'] ?>" target="_blank" download class="upload-dwnl-btn">Download</a>
                                <form action="/attach" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_id" value="<?= $pdf['upload_id'] ?>">
                                    <input type="hidden" name="_file" value="uploads/<?= $pdf['filename'] ?>">
                                    <button type="submit" class="upload-del-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <button class="secondary" onclick="window.print()">Print</button>
</div>
<script src="assets/js/uploadSearch.js"></script>

<?php require 'partials/footer.partial.php' ?>