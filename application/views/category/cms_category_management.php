<div class="container-fluid dashboard">
    <?= $breadcrumb ?>
    <?= $this->session->flashdata('message') ?>
    <h4>Kategori Umur Management</h4>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-success btn-sm mb-4" onclick="navigateTo('view_category_add')"><i class="fas fa-plus mr-1"></i>Tambah Kategori Umur</button>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-dark w-100">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Kategori Umur</th>
                            <th style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($category_list) && is_array($category_list)) {
                            if (count($category_list) > 0) {
                                $index = 1;
                                foreach ($category_list as $category) {
                                    echo "<tr>";
                                    echo "<td>$index</td>";
                                    echo "<td>$category->category_name</td>";
                                    echo "<td><button class='btn btn-primary btn-sm' onclick=\"navigateTo('view_category_edit?id=$category->category_id')\"><i class='fas fa-search mr-2'></i>Edit</button>";
                                    echo "<button class='btn btn-danger btn-sm ml-md-3 mt-md-0 d-md-table-cell d-sm-block' onclick=\"navigateTo('process_category_delete?id=$category->category_id')\">Delete</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $index++;
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='3' class='text-center'>Tidak ada kategori umur</td>";
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
</script>