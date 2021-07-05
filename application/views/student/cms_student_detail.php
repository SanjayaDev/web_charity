<div class="container-fluid dashboard">
    <?= $breadcrumb ?>
    <?= $this->session->flashdata('message') ?>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <i class="fas fa-edit icon-edit" onclick="navigateTo('view_student_edit?id=<?= $student_info->student_id; ?>')"></i>
                <div class="card-body">
                    <h3 class="display-4"><?= $student_info->student_name ?></h3>
                    <dl class="row">
                        <dt class="col-sm-3">Tanggal Lahir</dt>
                        <dd class="col-sm-9"><?= date("d M Y", strtotime($student_info->student_dob)); ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Umur</dt>
                        <dd class="col-sm-9"><?= $student_info->student_age; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Wali Siswa</dt>
                        <dd class="col-sm-9"><?= $student_info->student_trustee; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Alamat</dt>
                        <dd class="col-sm-9"><?= $student_info->student_address; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Kategori Umur</dt>
                        <dd class="col-sm-9"><?= $student_info->category_name; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Sekolah</dt>
                        <dd class="col-sm-9"><?= $student_info->student_school; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Note</dt>
                        <dd class="col-sm-9"><?= $student_info->note; ?></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9"><?= $student_info->student_status; ?></dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img id="photoItem" src="<?= $student_info->file_path ?>" class="img-fluid" alt="file-photo">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <th scope="col">Prestasi</th>
                            <th scope="col">Tingkat</th>
                            <th scope="col">Deskripsi</th>
                        </thead>
                        <tbody id="achievementTable">
                            <?php if (isset($achievement_list) && is_array($achievement_list)) {
                                if (count($achievement_list) > 0) {
                                    foreach ($achievement_list as $item) {
                                        echo "<tr>";
                                        echo "<td>$item->achievement_name</td>";
                                        echo "<td>$item->level_name</td>";
                                        echo "<td>$item->description</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr id='noData'>";
                                    echo "<td colspan='4' class='text-center'>Tidak ada prestasi</td>";
                                    echo "</tr>";
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>