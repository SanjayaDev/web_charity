<div class="container-fluid dashboard">
    <?= $breadcrumb ?>
    <?= $this->session->flashdata('message') ?>
    <h4>Tambah Siswa</h4>
    <form action="<?= base_url("process_student_edit")  ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="student_id" value="<?= $student_info->student_id; ?>">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="studentName" class="col-sm-4 col-form-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <input type="text" name="student_name" class="form-control" id="studentName" value="<?= (isset($bounced)) ? $bounced->student_name : $student_info->student_name; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="studentDob" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" name="student_dob" value='<?= (isset($bounced)) ? date("Y-d-m", strtotime($bounced->student_dob)) : date("Y-d-m", strtotime($student_info->student_dob)) ?>' class="form-control" id="studentDob" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="studentTrustee" class="col-sm-4 col-form-label">Nama Wali</label>
                            <div class="col-sm-8">
                                <input type="text" name="student_trustee" class="form-control" id="studentTrustee" value="<?= (isset($bounced)) ? $bounced->student_trustee : $student_info->student_trustee; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="studentSchool" class="col-sm-4 col-form-label">Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" name="student_school" class="form-control" id="studentSchool" value="<?= (isset($bounced)) ? $bounced->student_school : $student_info->student_school; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="studentCategory" class="col-sm-4 col-form-label">Kategori Umur</label>
                            <div class="col-sm-8">
                                <select name="category_id" id="studentCategory" class="form-control" required>
                                    <?php foreach ($category_list as $category) {
                                        if ($student_info->category_id == $category->category_id) {
                                            echo "<option value='$category->category_id' selected>$category->category_name</option>";
                                        } else {
                                            echo "<option value='$category->category_id'>$category->category_name</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="filePath" class="col-sm-4 form-label">Foto Siswa</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="student_photo" class="custom-file-input" onchange="previewImage(this)" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="studentAddress" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea rows="3" name="student_address" class="form-control" id="studentAddress"><?= (isset($bounced)) ? $bounced->student_address : $student_info->student_address; ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="studentnote" class="col-sm-4 col-form-label">Catatan</label>
                            <div class="col-sm-8">
                                <textarea rows="3" name="student_note" class="form-control" id="studentNote"><?= (isset($bounced)) ? $bounced->student_note : $student_info->note; ?></textarea>
                            </div>
                        </div>
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
                        <div class='btn btn-primary btn-md mb-3' id="addAchievementBtn">Tambah Prestasi</div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <th scope="col">Prestasi</th>
                                <th scope="col">Tingkat</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col" style="width: 10%;">Aksi</th>
                            </thead>
                            <tbody id="achievementTable">
                                <?php if (isset($achievement_list) && is_array($achievement_list)) {
                                    if (count($achievement_list) > 0) {
                                        foreach ($achievement_list as $item) {
                                            echo "<tr id='row$item->achievement_id'>";
                                            echo "<td><input type='text' name='achievement_name[]' class='form-control' placeholder='Masukkan prestasi..' value='$item->achievement_name'></td>";
                                            echo "<td><select name='level_id[]' class='form-control'>";
                                            foreach ($level_list as $level) {
                                                if ($item->level_id == $level->level_id) {
                                                    echo "<option value='$level->level_id' selected>$level->level_name</option>";
                                                } else {
                                                    echo "<option value='$level->level_id'>$level->level_name</option>";
                                                }
                                            }
                                            echo "</select></td>";
                                            echo "<td><textarea name='description[]' class='form-control' olaceholder-'Masukkan deskripsi prestasi..'>$item->description</textarea></td>";
                                            echo "<td><div class='btn btn-danger btn-sm' onclick='removeRow(\"$item->achievement_id\")'>Delete</div></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr id='noData'>";
                                        echo "<td colspan='4' class='text-center'>Klik tambah prestasi untuk menambhakan baris</td>";
                                        echo "</tr>";
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-lg mb-3">Simpan</button>
    </form>
</div>
<script>
    const addAchievementBtn = document.getElementById("addAchievementBtn");
    const achievementTable = document.getElementById("achievementTable");
    const noData = document.getElementById("noData");

    let countRow = 0;
    let levelList = <?php echo json_encode($level_list); ?>;

    addAchievementBtn.addEventListener("click", () => {
        addRow();
    })

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("photoItem").setAttribute("src", e.target.result);
                document.querySelector(".custom-file label").innerHTML = input.value;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    const addRow = () => {
        let html = "";
        let rowId = uid();
        html += "<tr id='row" + rowId + "'>";
        html += "<td><input type='text' name='achievement_name[]' class='form-control' placeholder='Masukkan prestasi..'></td>";
        html += "<td><select name='level_id[]' class='form-control'>";
        levelList.forEach(level => {
            html += "<option value='" + level.level_id + "'>" + level.level_name + "</option>"
        });
        html += "</select></td>";
        html += "<td><textarea name='description[]' class='form-control' olaceholder-'Masukkan deskripsi prestasi..'></textarea></td>";
        html += "<td><div class='btn btn-danger btn-sm' onclick='removeRow(\"" + rowId + "\")'>Delete</div></td>"
        html += "</tr>"
        achievementTable.insertAdjacentHTML("beforeend", html);
        countRow++;
        if (countRow != 0) {
            noData.style.display = "none";
        }
    }

    const removeRow = (rowId) => {
        $("#row" + rowId).remove();
        countRow--;
        if (countRow == 0) {
            noData.style.display = "table-row";
        }
    }


    const uid = function() {
        return Date.now().toString(36) + Math.random().toString(36).substr(2);
    }
</script>