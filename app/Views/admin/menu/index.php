<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col-md-6">
        <a href="/admin/menu/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Menu Baru
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Daftar Menu</h5>
        <small class="text-muted">Drag dan drop untuk mengubah urutan menu</small>
    </div>
    <div class="card-body">
        <?php if (empty($menus)): ?>
            <div class="alert alert-info">Belum ada menu yang ditambahkan.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Icon</th>
                            <th width="25%">Nama</th>
                            <th width="25%">Link</th>
                            <th width="10%">Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="sortable-menu">
                        <?php foreach ($menus as $index => $menu): ?>
                            <tr data-id="<?= $menu['id'] ?>">
                                <td>
                                    <i class="fas fa-grip-vertical handle" style="cursor: move;"></i>
                                    <span class="order-number"><?= $menu['order'] ?></span>
                                </td>
                                <td>
                                    <div class="menu-item-preview">
                                        <div class="menu-icon">
                                            <img src="<?= $menu['icon'] ?>" alt="<?= $menu['name'] ?>">
                                        </div>
                                    </div>
                                </td>
                                <td><?= $menu['name'] ?></td>
                                <td><?= $menu['link'] ?></td>
                                <td>
                                    <?php if ($menu['active']): ?>
                                        <span class="badge bg-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="/admin/menu/edit/<?= $menu['id'] ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $menu['id'] ?>">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal<?= $menu['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $menu['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel<?= $menu['id'] ?>">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus menu "<?= $menu['name'] ?>"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="/admin/menu/delete/<?= $menu['id'] ?>" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
$(function() {
    // Make the table rows sortable
    $("#sortable-menu").sortable({
        handle: ".handle",
        placeholder: "sortable-placeholder",
        update: function(event, ui) {
            // Update order numbers visually
            $("#sortable-menu tr").each(function(index) {
                $(this).find(".order-number").text(index + 1);
            });
            
            // Prepare data for AJAX
            var positions = [];
            $("#sortable-menu tr").each(function(index) {
                positions.push({
                    id: $(this).data("id"),
                    order: index + 1
                });
            });
            
            // Send AJAX request to update order
            $.ajax({
                url: "/admin/menu/update-order",
                method: "POST",
                data: { positions: positions },
                success: function(response) {
                    if (response.success) {
                        // Show success message
                        const alertHtml = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Urutan menu berhasil diperbarui.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("main.main-content").prepend(alertHtml);
                    } else {
                        // Show error message
                        const alertHtml = `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                ${response.message || 'Terjadi kesalahan saat memperbarui urutan menu.'}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("main.main-content").prepend(alertHtml);
                    }
                },
                error: function() {
                    // Show error message
                    const alertHtml = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Terjadi kesalahan saat memperbarui urutan menu.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    $("main.main-content").prepend(alertHtml);
                }
            });
        }
    });
});
</script>
<?= $this->endSection() ?>