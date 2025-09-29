<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col-md-6">
        <a href="/admin/menu/create" class="btn btn-add">
            <i class="fas fa-plus"></i> Tambah Menu Baru
        </a>
    </div>
</div>

<div class="card card-clean">
    <div class="card-header pb-0">
        <h5 class="fw-semibold text-dark mb-1">Daftar Menu</h5>
        <p class="text-muted"><small>Drag & drop untuk mengubah urutan menu</small></p>
    </div>
    <div class="card-body">
        <?php if (empty($menus)): ?>
            <div class="alert alert-light border text-muted">Belum ada menu yang ditambahkan.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-borderless table-clean">
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
                                <td class="text-muted">
                                    <i class="fas fa-grip-vertical handle" style="cursor: move;"></i>
                                    <span class="order-number ms-2"><?= $menu['order'] ?></span>
                                </td>
                                <td>
                                    <div class="icon-cell-preview">
                                        <img src="<?= base_url($menu['icon']) ?>" alt="<?= $menu['name'] ?>">
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
                                    <button type="button"
                                        class="btn btn-action btn-delete"
                                        data-id="<?= $menu['id'] ?>"
                                        data-name="<?= esc($menu['name']) ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Hapus (Global, tidak per row) -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 shadow-sm">
            <div class="modal-header border-0">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-muted" id="deleteModalBody">
                Apakah Anda yakin ingin menghapus menu ini?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function() {
        // Drag & Drop urutan
        $("#sortable-menu").sortable({
            handle: ".handle",
            placeholder: "sortable-placeholder",
            update: function(event, ui) {
                var positions = [];
                $("#sortable-menu tr").each(function(index) {
                    // Update nomor urutan di layar
                    $(this).find(".order-number").text(index + 1);
                    // Kumpulkan data id dan urutan baru
                    positions.push({
                        id: $(this).data("id"),
                        order: index + 1
                    });
                });
                // Kirim data baru ke server
                $.ajax({
                    url: "/admin/menu/update-order",
                    method: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({
                        positions: positions
                    }),
                    success: function(response) {
                        console.log('Order updated!');
                    },
                    error: function() {
                        console.error('Failed to update order.');
                    }
                });
            }
        });

        // Modal hapus dinamis
        $(document).on("click", ".btn-delete", function() {
            let id = $(this).data("id");
            let name = $(this).data("name");
            $("#deleteModalBody").html(
                'Apakah Anda yakin ingin menghapus menu "<strong>' + name + '</strong>"?'
            );
            $("#confirmDeleteBtn").attr("href", "/admin/menu/delete/" + id);
        });
    });
</script>
<?= $this->endSection() ?>