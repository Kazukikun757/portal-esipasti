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
    <!-- Custom CSS -->
    <style>
        /* Background full screen dengan gradient & spotlight */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(135deg,
                    #a18cd1 0%,
                    #f8cdda 40%,
                    #ffffff 100%);
            position: relative;
            overflow: hidden;
        }

        .page-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 25% 35%,
                    rgba(255, 200, 255, 0.25), transparent 70%);
            pointer-events: none;
        }

        .page-wrapper::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 70% 65%,
                    rgba(160, 120, 255, 0.25), transparent 70%);
            pointer-events: none;
        }

        .card {
            border: none;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .card-body h1 {
            font-weight: 700;
            background: linear-gradient(90deg, #fbd1e1, #c9b5f9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .input-group-text {
            background: #f8f9fa;
            border-right: none;
        }

        .form-control {
            border-left: none;
        }

        .form-control:focus {
            border-color: #c9a7f4;
            box-shadow: 0 0 0 0.25rem rgba(201, 167, 244, 0.25);
        }

        .btn-primary {
            background: linear-gradient(90deg, #f8cdda, #a18cd1);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(161, 140, 209, 0.4);
        }

        a.text-primary {
            color: #a18cd1 !important;
        }

        a.text-primary:hover {
            text-decoration: underline;
        }

        .pattern-layer {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle,
                    rgba(186, 104, 200, 0.25) 1.5px,
                    transparent 1.5px);
            background-size: 30px 30px;
            z-index: 0;
            transition: background-position 0.15s ease-out;
            pointer-events: none;
        }
    </style>

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