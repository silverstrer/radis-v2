<?php include "../conf/veriflogin.php"; ?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Data Eksktrakurikuler</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Setup</li>
            <li class="active">Ekstrakurikuler</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Data Eksktrakurikuler</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="../conf/proses-tambahekskul.php">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ekskul">Nama Ekstrakurikuler</label>
                                        <input type="text" class="form-control" id="ekskul" name="namaekskul">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="add">Tambah Data</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Eksktrakurikuler</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ekstrakurikuler</th>
                                    <th colspan="3">Deskripsi Nilai</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "../conf/conn.php";
                                $no = 0;
                                $query = mysqli_query($link, 'SELECT * FROM ekskul ORDER BY IDekskul');
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['namaekskul']; ?></td>
                                        <td>
                                            <div class="form-group">(A)
                                                <input type="checkbox" class="flat-red" <?php if ($row['desk1'] !== "") {
                                                                                            echo "checked";
                                                                                        }  ?> disabled />
                                        </td>
                                        <td>
                                            <div class="form-group">(B)
                                                <input type="checkbox" class="flat-red" <?php if ($row['desk2'] !== "") {
                                                                                            echo "checked";
                                                                                        }  ?> disabled />
                                        </td>
                                        <td>
                                            <div class="form-group">(C)
                                                <input type="checkbox" class="flat-red" <?php if ($row['desk3'] !== "") {
                                                                                            echo "checked";
                                                                                        }  ?> disabled />
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['IDekskul']; ?>">Ubah</a>
                                            <!-- MODAL POP UP -->
                                            <div class="modal fade" id="modal<?php echo $row['IDekskul']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Ubah Data</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" method="post" action="../conf/ubah-ekskul.php">
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="namaekskul">Nama Eksktrakurikuler</label>
                                                                                <input type="text" class="form-control" id="namaekskul" name="namaekskul" value="<?php echo $row['namaekskul']; ?>">
                                                                            </div>
                                                                            <br>
                                                                            <div class="form-group">
                                                                                <label for="desk1">Deskripsi nilai A</label>
                                                                                <textarea cols="60" rows="4" id="desk1" name="desk1" maxlength="255"><?php echo $row['desk1']; ?></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div class="form-group">
                                                                                <label for="desk2">Deskripsi nilai B</label>
                                                                                <textarea cols="60" rows="4" id="desk2" name="desk2" maxlength="255"><?php echo $row['desk2']; ?></textarea>
                                                                            </div>
                                                                            <br>
                                                                            <div class="form-group">
                                                                                <label for="desk3">Deskripsi nilai C</label>
                                                                                <textarea cols="60" rows="4" id="desk3" name="desk3" maxlength="255"><?php echo $row['desk3']; ?></textarea>
                                                                            </div>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="IDekskul" name="IDekskul" value="<?php echo $row['IDekskul']; ?>">
                                                                </div><!-- /.box-body -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary" name="ubah">Simpan Perubahan</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- / MODAL POP UP -->

                                            <a class="btn btn-sm btn-danger" href="../conf/hapus_ekskul.php?id=<?= $row['IDekskul']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->