<?= $this->extend('auth/layout/base') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center w-100 mx-0">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <i class="fas fa-sign-in-alt fa-3x text-primary mb-3"></i>
                    <h1 class="h3 mb-3 fw-bold">Sign In</h1>
                    <p class="text-muted">Masuk ke akun Anda untuk melanjutkan</p>
                </div>

                <?= form_open('login', ['class' => 'needs-validation', 'novalidate' => true]) ?>
                <div class="mb-3">
                    <label for="login_field" class="form-label">Email atau Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text"
                            class="form-control <?= isset($validation) && $validation->hasError('login_field') ? 'is-invalid' : '' ?>"
                            id="login_field"
                            name="login_field"
                            value="<?= old('login_field') ?>"
                            placeholder="Masukkan email atau username"
                            required>
                        <?php if (isset($validation) && $validation->hasError('login_field')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('login_field') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password"
                            class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                        <?php if (isset($validation) && $validation->hasError('password')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('password') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                    <label class="form-check-label" for="remember_me">Ingat saya</label>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg" type="submit">
                        <i class="fas fa-sign-in-alt me-2"></i> Sign In
                    </button>
                </div>
                <?= form_close() ?>

                <hr class="my-4">

                <div class="text-center">
                    <p class="mb-0">
                        Belum punya akun?
                        <a href="<?= base_url('register') ?>" class="text-primary fw-semibold">Daftar sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        // Toggle password visibility
        $('#togglePassword').click(function() {
            const password = $('#password');
            const icon = $(this).find('i');

            if (password.attr('type') === 'password') {
                password.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                password.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        // Validation
        $('form').submit(function(e) {
            const form = this;
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        });

        // Auto focus
        $('#login_field').focus();
    });
</script>
<?= $this->endSection() ?>