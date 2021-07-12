<div class="container-fluid dashboard">
    <?= $breadcrumb ?>
    <?= $this->session->flashdata('message') ?>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <i class="fas fa-edit icon-edit" onclick="navigateTo('view_student_edit?id=<?= $student_info->student_id; ?>')"></i>
                <div class="card-body">
                    <h4 class="display-4"><?= $student_info->student_name ?></h4>
                    <table class="table">
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?= $student_info->student_gender; ?></td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td>: <?= $student_info->student_age; ?></td>
                        </tr>
                        <tr>
                            <td>Kategori Umur</td>
                            <td>: <?= $student_info->category_name; ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan</td>
                            <td>: <?= $student_info->student_education; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>: <?= $student_info->student_class; ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td>
                            <td>: <?= $student_info->father_profesion; ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ibu</td>
                            <td>: <?= $student_info->mother_profesion; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $student_info->student_address; ?></td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td>: <?= $student_info->student_note; ?></td>
                        </tr>
                    </table>
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