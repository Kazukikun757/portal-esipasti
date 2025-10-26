<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="card card-clean">
    <div class="card-header pb-0">
        <div class="d-flex align-items-center">
            <a href="/admin/menu" class="btn btn-outline-secondary btn-sm me-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h5 class="fw-semibold text-dark mb-1">Edit Menu</h5>
                <p class="text-muted mb-0"><small>Ubah detail menu sesuai kebutuhan</small></p>
            </div>
        </div>
    </div>
    <div class="card-body">

        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/admin/menu/update/<?= $menu['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
                <div class="col-lg-7">
                    <div class="mb-3">
                        <label for="name-input" class="form-label fw-medium">Nama Menu</label>
                        <input type="text" class="form-control" id="name-input" name="name" value="<?= esc(old('name', $menu['name'] ?? '')) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label fw-medium">Link</label>
                        <input type="text" class="form-control" id="link" name="link" value="<?= esc(old('link', $menu['link'] ?? '')) ?>" required>
                        <small class="text-muted">Gunakan # untuk link kosong atau /nama-halaman untuk link internal.</small>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="active" name="active" value="1" <?= (old('active', $menu['active'] ?? true)) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="active">Aktifkan Menu</label>
                    </div>
                </div>

                <div class="col-lg-5 mb-3 mb-lg-0">
                    <div class="mb-3">
                        <label for="icon-input" class="form-label fw-medium">Icon (SVG atau PNG)</label>
                        <input type="file" class="form-control" id="icon-input" name="icon" accept=".svg,.png">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah icon.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Preview</label>
                        <div class="menu-item-preview">
                            <div class="menu-icon">
                                <img id="icon-preview" src="<?= base_url($menu['icon']) ?>" alt="Icon Preview">
                            </div>
                            <div class="fw-semibold" id="name-preview"><?= esc($menu['name']) ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">
                <a href="/admin/menu" class="btn btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-add">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Memberi gaya khusus untuk wadah preview di halaman edit */
    .menu-item-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        min-height: 180px;
        /* Memberi tinggi minimal agar rapi */
    }

    /* KUNCI PERBAIKAN: Mengatur ukuran gambar preview */
    #icon-preview {
        max-width: 80px;
        /* Batasi lebar maksimum gambar */
        max-height: 80px;
        /* Batasi tinggi maksimum gambar */
        height: auto;
        object-fit: contain;
        /* Pastikan gambar pas tanpa peot */
        display: block;
        margin-bottom: 1rem;
        /* Memberi jarak ke teks nama di bawahnya */
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function() {
        // Preview untuk nama menu
        $("#name-input").on('input', function() {
            let menuName = $(this).val();
            $("#name-preview").text(menuName || "Nama Menu");
        });

        // Preview untuk ikon
        $("#icon-input").on('change', function(event) {
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