<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col-md-6">
        <a href="/admin/menu" class="btn btn-outline-secondary rounded-pill px-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white border-0 pb-0">
        <h5 class="fw-bold mb-1"
            style="background: #000;
                   -webkit-background-clip: text;
                   -webkit-text-fill-color: transparent;">
            Tambah Menu Baru
        </h5>
        <p class="text-muted small mb-0">Isi detail menu untuk ditambahkan ke sidebar</p>
    </div>
    <div class="card-body">
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/admin/menu/store" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
                <!-- Form kiri -->
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Menu</label>
                        <input type="text"
                            class="form-control rounded-3 border-secondary-subtle"
                            id="name" name="name"
                            value="<?= old('name') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label fw-semibold">Link</label>
                        <input type="text"
                            class="form-control rounded-3 border-secondary-subtle"
                            id="link" name="link"
                            value="<?= old('link') ?? '#' ?>" required>
                        <small class="text-muted">Gunakan # untuk link kosong</small>
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label fw-semibold">Icon (SVG atau PNG)</label>
                        <input type="file"
                            class="form-control rounded-3 border-secondary-subtle"
                            id="icon" name="icon" accept=".svg,.png" required>
                        <small class="text-muted">Maks 1MB. Format: SVG, PNG</small>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="active" name="active" value="1"
                            <?= old('active') ? 'checked' : 'checked' ?>>
                        <label class="form-check-label" for="active">Aktif</label>
                    </div>
                </div>

                <!-- Preview kanan -->
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-header bg-white border-0">
                            <span class="fw-semibold">Preview</span>
                        </div>
                        <div class="card-body text-center">
                            <div class="menu-item-preview p-4 rounded-3"
                                style="background: linear-gradient(135deg, #d8b4fe, #fbcfe8);
                                        color: #333; box-shadow: 0 6px 16px rgba(0,0,0,0.05);">
                                <div class="menu-icon mb-2">
                                    <img id="icon-preview" src="../assets/img/icons/default.svg" alt="Preview"
                                        style="width:48px; height:48px; object-fit:contain;">
                                </div>
                                <div class="fw-semibold" id="name-preview">Nama Menu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol -->
            <div class="mt-4 d-flex flex-column flex-sm-row gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan</button>
                <a href="/admin/menu" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function() {
        // Preview name
        $("#name").on('input', function() {
            $("#name-preview").text($(this).val() || "Nama Menu");
        });

        // Preview icon
        $("#icon").on('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#icon-preview").attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
<?= $this->endSection() ?>