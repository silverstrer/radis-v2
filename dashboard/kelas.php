<?php include "../conf/veriflogin.php"; ?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Data Kelas</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Setup</li>
            <li class="active">Kelas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Data Kelas</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="../conf/proses-tambahkelas.php">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <input type="text" class="form-control" id="kelas" name="kelas">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="proke">Program Keahlian</label>
                                        <input type="text" class="form-control" id="proke" name="proke">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bidang">Bidang Keahlian</label>
                                        <input type="text" class="form-control" id="bidang" name="bidang">
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
                        <h3 class="box-title">Data Kelas</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kelas</th>
                                    <th>Program Keahlian</th>
                                    <th>Bidang Keahlian</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "../conf/conn.php";
                                $no = 0;
                                $query = mysqli_query($link, 'SELECT * FROM kelas ORDER BY IDkelas');
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['kelas']; ?></td>
                                        <td><?php echo $row['proke']; ?></td>
                                        <td><?php echo $row['bidang']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['IDkelas']; ?>">Ubah</a>
                                            <!-- MODAL POP UP -->
                                            <div class="modal fade" id="modal<?php echo $row['IDkelas']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Ubah Data</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" method="post" action="../conf/ubah-kelas.php">
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="kelas">Kelas</label>
                                                                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $row['kelas']; ?>">
                                                                            </div>
                                                                            <br>
                                                                            <div class="form-group">
                                                                                <label for="proke">Program Keahlian</label>
                                                                                <input type="text" class="form-control" id="proke" name="proke" value="<?php echo $row['proke']; ?>">
                                                                            </div>
                                                                            <br>
                                                                            <div class="form-group">
                                                                                <label for="bidang">Bidang Keahlian</label>
                                                                                <input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $row['bidang']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="IDkelas" name="IDkelas" value="<?php echo $row['IDkelas']; ?>">
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

                                            <a class="btn btn-sm btn-danger" href="../conf/hapus_kelas.php?id=<?= $row['IDkelas']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');">Hapus</a>
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