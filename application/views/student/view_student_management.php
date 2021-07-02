<div class="container-fluid dashboard">
    <?= $breadcrumb ?>
    <h4>Siswa Management</h4>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-success btn-sm mb-4" onclick="navigateTo('view_student_add')"><i class="fas fa-plus mr-1"></i>Tambah Siswa</button>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-dark w-100" id="tableStudent">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Sekolah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($student_list) && is_array($student_list)) {
                            if (count($student_list) > 0) {
                                $index = 1;
                                foreach ($student_list as $student) {
                                    echo "<tr>";
                                    echo "<td>$index</td>";
                                    echo "<td>$student->student_name</td>";
                                    echo "<td>$student->student_age</td>";
                                    echo "<td>$student->student_school</td>";
                                    echo "<td><button class='btn btn-primary btn-sm' onclick=\"navigateTo('student_detail?id=" . encrypt_url($item->student_id) . "')\"><i class='fas fa-search mr-2'></i>Detail</button></td>";
                                    echo "</tr>";
                                    $index++;
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='5' class='text-center'>Tidak ada data Siswa</td>";
                                echo "</tr>";
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // const table = getDataTable("tableStudent", "get_student");

    // function submitAdmin(formId, e) {
    //     e.preventDefault();
    //     sendData(formId, "add_admin", "modalAdd", table);
    // }
</script>