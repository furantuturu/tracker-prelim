<?php require 'partials/header.partial.php' ?>
<?php require 'partials/sidenav.partial.php' ?>

<main class="dashboard-main">
    <h1>Hello World</h1>
</main>
<script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
<script>
    const jsConfetti = new JSConfetti()

    jsConfetti.addConfetti({
        emojis: ['🌈', '⚡️', '💥', '✨', '💫', '🌸', '🦄'],
        confettiRadius: 6,
        confettiNumber: 111,
        emojiSize: 50
    })
</script>

<?php require 'partials/footer.partial.php' ?>