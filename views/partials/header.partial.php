<!DOCTYPE HTML>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        [data-theme=dark] {
            background-color: #1b202b;
            box-shadow: 0 0 20px rgb(15, 18, 24);
        }

        .create-communication-container, .file-attach-container {
            max-width: 690px;
        }

        .create-communication-container {

            h1 {
                margin-top: 1.7rem;
                text-align: center;
            }

            & > a {
                display: inline-block;
                margin-bottom: 1rem;
            }

            & > div {
                padding: 1.2rem;
                border-radius: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <main class="tracker-main">