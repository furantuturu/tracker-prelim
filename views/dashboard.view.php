<?php require 'partials/header.partial.php' ?>
<?php require 'partials/sidenav.partial.php' ?>

<h1 class="dashboard-title">Hello Dashboard <small title="Pop it" style="cursor: pointer;">🎉</small></h1>

<script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
<script>
    const jsConfetti = new JSConfetti()

    jsConfetti.addConfetti({
        emojis: ['🌈', '⚡️', '💥', '✨', '💫', '🌸', '🦄'],
        confettiRadius: 6,
        confettiNumber: 111,
        emojiSize: 50
    })

    document.querySelector('small').addEventListener('click', () => {
        jsConfetti.addConfetti({
            emojis: ['🌈', '⚡️', '💥', '✨', '💫', '🌸', '🦄'],
            confettiRadius: 6,
            confettiNumber: 111,
            emojiSize: 50
        })
    })
</script>

<?php require 'partials/footer.partial.php' ?>