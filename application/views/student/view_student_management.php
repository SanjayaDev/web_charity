<div class="container-fluid dashboard">
    <?= $breadcrumb ?>
    <?= $this->session->flashdata('message') ?>
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
                            <th>Pendidikan</th>
                            <th style="width: 20%;">Action</th>
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
                                    echo "<td>$student->student_education</td>";
                                    echo "<td><button class='btn btn-primary btn-sm' onclick=\"navigateTo('view_student_detail?id=$student->student_id')\"><i class='fas fa-search mr-2'></i>Detail</button>";
                                    echo "<button class='btn btn-danger btn-sm ml-md-3 mt-md-0 d-md-table-cell d-sm-block' onclick=\"navigateTo('process_student_delete?id=$student->student_id')\">Delete</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $index++;
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='6' class='text-center'>Tidak ada data Siswa</td>";
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
    const table = dataTable("tableStudent");
</script>