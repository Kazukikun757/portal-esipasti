<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Sipasti</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <?= $this->renderSection('styles') ?>
</head>

<body>
    <div class="page-wrapper">
        <div class="pattern-layer"></div>
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("mousemove", function(e) {
            const pattern = document.querySelector(".pattern-layer");
            const x = (e.clientX / window.innerWidth) * 30;
            const y = (e.clientY / window.innerHeight) * 30;
            pattern.style.backgroundPosition = `${x}px ${y}px`;
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>