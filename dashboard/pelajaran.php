<?php include "../conf/veriflogin.php"; ?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Mata Pelajaran</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Setup</li>
            <li class="active">Mata Pelajaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Data Pelajaran</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="../conf/proses-tambahpelajaran.php">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pelajaran">Mata Pelajaran</label>
                                        <input type="text" class="form-control" id="pelajaran" name="pelajaran">
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
                        <h3 class="box-title">Data Mata Pelajaran</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "../conf/conn.php";
                                $no = 0;
                                $query = mysqli_query($link, 'SELECT * FROM pelajaran ORDER BY IDpelajaran');
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['namapelajaran']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['IDpelajaran']; ?>">Ubah</a>
                                            <!-- MODAL POP UP -->
                                            <div class="modal fade" id="modal<?php echo $row['IDpelajaran']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Ubah Data</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" method="post" action="../conf/ubah-pelajaran.php">
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="pelajaran">Mata Pelajaran</label>
                                                                                <input type="text" class="form-control" id="pelajaran" name="namapelajaran" value="<?php echo $row['namapelajaran']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="IDpelajaran" name="IDpelajaran" value="<?php echo $row['IDpelajaran']; ?>">
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

                                            <a class="btn btn-sm btn-danger" href="../conf/hapus_pelajaran.php?id=<?= $row['IDpelajaran']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');">Hapus</a>
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