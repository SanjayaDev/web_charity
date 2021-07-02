<div class="container-fluid dashboard">
    <?= $breadcrumb ?>
    <h4>Tambah Siswa</h4>
    <form action="<?= base_url("process_category_add") ?>" method="post">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="categoryName" class="col-sm-4 col-form-label">Kategori Umur</label>
                            <div class="col-sm-8">
                                <input type="text" name="category_name" class="form-control" id="categoryName">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
    </form>
</div>