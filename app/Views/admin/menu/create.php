<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col-md-6">
        <a href="/admin/menu" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Tambah Menu Baru</h5>
    </div>
    <div class="card-body">
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger">
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
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" id="link" name="link" value="<?= old('link') ?? '#' ?>" required>
                        <small class="text-muted">Gunakan # untuk link kosong</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon (SVG atau PNG)</label>
                        <input type="file" class="form-control" id="icon" name="icon" accept=".svg,.png" required>
                        <small class="text-muted">Ukuran maksimal 1MB. Format yang diizinkan: SVG, PNG</small>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="active" name="active" value="1" <?= old('active') ? 'checked' : 'checked' ?>>
                        <label class="form-check-label" for="active">Aktif</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Preview</div>
                        <div class="card-body">
                            <div class="menu-item-preview">
                                <div class="menu-icon">
                                    <img id="icon-preview" src="../assets/img/icons/default.svg" alt="Preview">
                                </div>
                                <div class="menu-text" id="name-preview">Nama Menu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/admin/menu" class="btn btn-secondary">Batal</a>
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