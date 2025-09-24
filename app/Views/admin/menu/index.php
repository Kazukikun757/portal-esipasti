<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col-md-6">
        <a href="/admin/menu/create" class="btn btn-add">
            <i class="fas fa-plus"></i> Tambah Menu Baru
        </a>
    </div>
</div>

<div class="card card-clean shadow-sm border-0">
    <div class="card-header bg-white border-0 pb-0">
        <h5 class="fw-semibold text-dark mb-1">Daftar Menu</h5>
        <small class="text-muted">Drag & drop untuk mengubah urutan menu</small>
    </div>
    <div class="card-body">
        <?php if (empty($menus)): ?>
            <div class="alert alert-light border text-muted">Belum ada menu yang ditambahkan.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle table-clean">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>Nama</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="sortable-menu">
                        <?php foreach ($menus as $index => $menu): ?>
                            <tr data-id="<?= $menu['id'] ?>">
                                <td>
                                    <i class="fas fa-grip-vertical handle text-muted" style="cursor: move;"></i>
                                    <span class="order-number"><?= $menu['order'] ?></span>
                                </td>
                                <td>
                                    <div class="menu-item-preview">
                                        <div class="menu-icon">
                                            <img src="<?= $menu['icon'] ?>" alt="<?= $menu['name'] ?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="fw-medium"><?= $menu['name'] ?></td>
                                <td><span class="text-muted"><?= $menu['link'] ?></span></td>
                                <td>
                                    <?php if ($menu['active']): ?>
                                        <span class="badge-soft bg-pastel-success">Aktif</span>
                                    <?php else: ?>
                                        <span class="badge-soft bg-pastel-gray">Nonaktif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="/admin/menu/edit/<?= $menu['id'] ?>" class="btn btn-action btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button type="button" class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $menu['id'] ?>">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal<?= $menu['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $menu['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 rounded-3 shadow-sm">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-muted">
                                                    Apakah Anda yakin ingin menghapus menu "<strong><?= $menu['name'] ?></strong>"?
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
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

<style>
    /* Card clean */
    .card-clean {
        border-radius: 14px;
        border: 1px solid #e5e7eb;
    }

    /* Button */
    .btn-add {
        background: #fff;
        border: 1px solid #d8b4fe;
        color: #7c3aed;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s;
    }

    .btn-add:hover {
        background: linear-gradient(90deg, #d8b4fe, #fbcfe8);
        color: #111;
        border-color: transparent;
    }

    .btn-action {
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        padding: 5px 10px;
        transition: all 0.2s;
    }

    .btn-edit {
        border: 1px solid #a78bfa;
        color: #6d28d9;
        background: #f9f9ff;
    }

    .btn-edit:hover {
        background: #ede9fe;
    }

    .btn-delete {
        border: 1px solid #f9a8d4;
        color: #be185d;
        background: #fff5f7;
    }

    .btn-delete:hover {
        background: #ffe4e6;
    }

    /* Table */
    .table-clean thead {
        background: #fafafa;
    }

    .table-clean thead th {
        font-size: 0.9rem;
        font-weight: 600;
        color: #6b7280;
        border-bottom: 1px solid #e5e7eb;
    }

    .table-clean tbody tr:hover {
        background: #fafafa;
    }

    .table-clean td {
        border-bottom: 1px solid #f1f1f1;
    }

    /* Badges */
    .badge-soft {
        display: inline-block;
        padding: 4px 10px;
        font-size: 0.75rem;
        border-radius: 9999px;
        font-weight: 500;
    }

    .bg-pastel-success {
        background: #ecfdf5;
        color: #065f46;
    }

    .bg-pastel-gray {
        background: #f3f4f6;
        color: #374151;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function() {
        $("#sortable-menu").sortable({
            handle: ".handle",
            placeholder: "sortable-placeholder",
            update: function(event, ui) {
                $("#sortable-menu tr").each(function(index) {
                    $(this).find(".order-number").text(index + 1);
                });
                var positions = [];
                $("#sortable-menu tr").each(function(index) {
                    positions.push({
                        id: $(this).data("id"),
                        order: index + 1
                    });
                });
                $.ajax({
                    url: "/admin/menu/update-order",
                    method: "POST",
                    data: JSON.stringify({
                        positions: positions
                    }),
                    contentType: "application/json",
                    success: function(response) {
                        const alertHtml = `
                        <div class="alert alert-${response.success ? 'success' : 'danger'} alert-dismissible fade show" role="alert">
                            ${response.success ? 'Urutan menu berhasil diperbarui.' : (response.message || 'Terjadi kesalahan.')}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                        $("main.main-content").prepend(alertHtml);
                    },
                    error: function() {
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