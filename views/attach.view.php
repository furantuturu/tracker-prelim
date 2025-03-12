<?php require 'partials/header.partial.php' ?>

<div class="container file-attach-container" data-theme="dark">
    <a href="/communications">Back to List</a>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Upload PDF attachment</h1>
        <div>
            <label>
                Choose PDF file to upload:
                <input type="file" name="attachment" accept="application/pdf">
            </label>
            <button type="submit" style="width: unset;">Upload PDF</button>
        </div>
    </form>
    <hr>
    <form action="" method="post">
        <h2>Search Uploaded PDFs</h2>
        <div role="search">
            <input type="search" name="search-pdf" placeholder="Enter pdf name to search..." required>
            <input type="submit" value="Search" class="secondary">
        </div>
    </form>
    <hr>
    <div>
        <h2>Uploaded PDF Files</h2>
        <table class="striped">
            <thead>
                <tr>
                    <th scope="col">PDF File name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <button class="secondary" onclick="window.print()">Print</button>
</div>

<?php require 'partials/footer.partial.php' ?>