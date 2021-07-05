<div class="container-fluid dashboard">
    <?= $breadcrumb ?>
    <?= $this->session->flashdata('message') ?>
    <h4>Tentang </h4>
    <form action="<?= base_url("process_about_edit") ?>" method="post">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="about">Tentang</label>
                            <textarea class="form-control" id="about" name="about" rows="3"><?= $config->about ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea class="form-control" id="address" name="address" rows="3"><?= $config->address ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="text" class="form-control" id="phone" name="contact" placeholder="082185213XX" value="<?= $config->contact; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
    </form>
</div>