<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whats My Name</title>
    <?php $isDev = isset($_ENV['ENVIRONMENT']) && $_ENV['ENVIRONMENT'] === 'dev' && isset($_ENV['VITE_PORT']) ?>

    <?php if($isDev) : ?>
        <script type="module" src="<?= $_ENV['VITE_ORIGIN'] ?>:<?= $_ENV['VITE_PORT'] ?>/@vite/client"></script>
        <script type="module" src="<?= $_ENV['VITE_ORIGIN'] ?>:<?= $_ENV['VITE_PORT'] ?>/src/main.ts"></script>
        <script type="module" src="<?= $_ENV['VITE_ORIGIN'] ?>:<?= $_ENV['VITE_PORT'] ?>/src/assets/main.css"></script>
    <?php else: ?>
        <script type="module" src="/public/dist/main.js"></script>
        <link rel="stylesheet" href="/public/dist/main.css">
    <?php endif; ?>
</head>
<body>
    <header style="width: 100%;">
        <h1>Whats My Name</h1>
    </header>
    <main id="vue-root" style="width: 100%;">
        <?= $template ?? '' ?>
    </main>
</body>
</html>
