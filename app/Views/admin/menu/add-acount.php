<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
                    <h1 class="h3 mb-3 fw-normal">Create Account</h1>
                    <p class="text-muted">Daftarkan akun baru untuk mulai mengorganisir tugas Anda</p>
                </div>

                <?= form_open('admin/add-account', ['class' => 'needs-validation', 'novalidate' => true]) ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text"
                                    class="form-control <?= isset($validation) && $validation->hasError('full_name') ? 'is-invalid' : '' ?>"
                                    id="full_name"
                                    name="full_name"
                                    value="<?= old('full_name') ?>"
                                    placeholder="Nama lengkap Anda"
                                    required>
                                <?php if (isset($validation) && $validation->hasError('full_name')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('full_name') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </span>
                                <input type="text"
                                    class="form-control <?= isset($validation) && $validation->hasError('username') ? 'is-invalid' : '' ?>"
                                    id="username"
                                    name="username"
                                    value="<?= old('username') ?>"
                                    placeholder="Username unik"
                                    required>
                                <?php if (isset($validation) && $validation->hasError('username')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email"
                            class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>"
                            id="email"
                            name="email"
                            value="<?= old('email') ?>"
                            placeholder="email@example.com"
                            required>
                        <?php if (isset($validation) && $validation->hasError('email')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password"
                                    class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>"
                                    id="password"
                                    name="password"
                                    placeholder="Password"
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
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Ulangi Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password"
                                    class="form-control <?= isset($validation) && $validation->hasError('password_confirm') ? 'is-invalid' : '' ?>"
                                    id="password_confirm"
                                    name="password_confirm"
                                    placeholder="Ulangi password"
                                    required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <?php if (isset($validation) && $validation->hasError('password_confirm')): ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password_confirm') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">
                            Saya menyetujui <a href="#" class="text-primary">syarat dan ketentuan</a> yang berlaku
                        </label>
                        <div class="invalid-feedback">
                            Anda harus menyetujui syarat dan ketentuan
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg" type="submit">
                        <i class="fas fa-user-plus me-2"></i>
                        Create Account
                    </button>
                </div>

                <?= form_close() ?>
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
            togglePasswordVisibility('#password', this);
        });

        $('#togglePasswordConfirm').click(function() {
            togglePasswordVisibility('#password_confirm', this);
        });

        function togglePasswordVisibility(inputSelector, button) {
            const input = $(inputSelector);
            const icon = $(button).find('i');

            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                input.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        }

        // Password strength indicator
        $('#password').on('input', function() {
            const password = $(this).val();
            const strength = checkPasswordStrength(password);
            updatePasswordStrength(strength);
        });

        function checkPasswordStrength(password) {
            let score = 0;
            if (password.length >= 6) score++;
            if (password.length >= 8) score++;
            if (/[a-z]/.test(password)) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;

            return score;
        }

        function updatePasswordStrength(score) {
            const strengthBar = $('#password-strength');
            if (strengthBar.length === 0) {
                $('#password').after('<div id="password-strength" class="progress mt-2" style="height: 5px;"><div class="progress-bar" role="progressbar"></div></div>');
            }

            const progressBar = $('#password-strength .progress-bar');
            const percentage = (score / 6) * 100;

            progressBar.css('width', percentage + '%');

            if (score < 2) {
                progressBar.removeClass().addClass('progress-bar bg-danger');
            } else if (score < 4) {
                progressBar.removeClass().addClass('progress-bar bg-warning');
            } else {
                progressBar.removeClass().addClass('progress-bar bg-success');
            }
        }

        // Password confirmation validation
        $('#password_confirm').on('input', function() {
            const password = $('#password').val();
            const confirmPassword = $(this).val();

            if (confirmPassword !== password && confirmPassword.length > 0) {
                $(this).addClass('is-invalid').removeClass('is-valid');
                $(this).siblings('.invalid-feedback').text('Password tidak sama');
            } else if (confirmPassword === password && confirmPassword.length > 0) {
                $(this).removeClass('is-invalid').addClass('is-valid');
            } else {
                $(this).removeClass('is-invalid is-valid');
            }
        });

        // Username availability check (optional)
        let usernameTimeout;
        $('#username').on('input', function() {
            const username = $(this).val();
            clearTimeout(usernameTimeout);

            if (username.length >= 3) {
                usernameTimeout = setTimeout(function() {
                    checkUsernameAvailability(username);
                }, 500);
            }
        });

        function checkUsernameAvailability(username) {
            // This would typically be an AJAX call to check username availability
            // For now, just show a placeholder message
            const feedback = $('#username').siblings('.username-feedback');
            if (feedback.length === 0) {
                $('#username').after('<div class="username-feedback small text-muted mt-1">Checking availability...</div>');
            }

            setTimeout(function() {
                $('.username-feedback').text('Username available').removeClass('text-muted').addClass('text-success');
            }, 1000);
        }

        // Form validation
        $('form').submit(function(e) {
            const form = this;
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        });

        // Focus on first input
        $('#full_name').focus();
    });
</script>
<?= $this->endSection() ?>
class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>"
id="password"
name="password"
placeholder="Minimal 6 karakter"
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
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label for="password_confirm" class="form-label">Konfirmasi Password</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-lock"></i>
            </span>
            <input type="password"