<?php include "../conf/veriflogin.php"; ?>
<?php
include "../conf/conn.php";
// Display selected user data based on id
// Getting id from url
$id = $_GET['IDdatasiswa'];

// Fetech user data based on id
$query = mysqli_query($link, "SELECT * FROM datasiswa WHERE IDdatasiswa=$id");

while ($row = mysqli_fetch_array($query)) {
    $nama = $row['nama'];
    $kelamin = $row['kelamin'];
    $tempatlahir = $row['tempatlahir'];
    $tanggallahir = $row['tanggallahir'];
    $nis = $row['nis'];
    $nisn = $row['nisn'];
    $tahunmasuk = $row['tahunmasuk'];
    $tanggalmasuk = $row['tanggalmasuk'];
    $kelas = $row['kelas'];
    $pendidikan = $row['pendidikan'];
    $namaayah = $row['namaayah'];
    $kerjaayah = $row['kerjaayah'];
    $namaibu = $row['namaibu'];
    $kerjaibu = $row['kerjaibu'];
    $nohp = $row['nohp'];
    $alamat = $row['alamat'];
    $nikktp = $row['nikktp'];
    $nikkk = $row['nikkk'];
    $status = $row['status'];
    $keterangan = $row['keterangan'];
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Profil Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Data Pokok</li>
            <li>Data Siswa</li>
            <li class="active">Profil</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs no-print">
                                <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
                                <li><a href="#ubahprofil" data-toggle="tab">Ubah Profil</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Lain-lain <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Hapus Siswa</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="profil">
                                    <!-- Main content -->

                                    <section class="invoice">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h2 class="page-header text-center">
                                                    <b>Identitas Peserta Didik</b>
                                                </h2>
                                            </div><!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                        <table class="table table-responsive" style="word-wrap: break-word;" width="70%">
                                            <tr>
                                                <td>Nama Peserta Didik</td>
                                                <td>: <b><?php echo $nama; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Induk Siswa Nasional</td>
                                                <td>: <?php echo $nisn; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Induk Sekolah</td>
                                                <td>: <?php echo $nis; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat, tanggal lahir</td>
                                                <td>: <?php echo ucfirst(strtolower($tempatlahir)) . ', ' . tgl_indo($tanggallahir); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis kelamin</td>
                                                <td>: <?php echo $kelamin; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>: Agama</td>
                                            </tr>
                                            <tr>
                                                <td>Pendidikan sebelumnya</td>
                                                <td>: <?php echo $pendidikan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat peserta didik</td>
                                                <td>: <?php echo $alamat; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Nama orang tua</td>
                                            </tr>
                                            <tr>
                                                <ul>
                                                    <td>
                                                        <li>Ayah</li>
                                                    </td>
                                                    <td>: <?php echo ucfirst(strtolower($namaayah)); ?></td>
                                                </ul>
                                            </tr>
                                            <tr>
                                                <ul>
                                                    <td>
                                                        <li>Ibu</li>
                                                    </td>
                                                    <td>: <?php echo ucfirst(strtolower($namaibu)); ?></td>
                                                </ul>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan orang tua</td>
                                            </tr>
                                            <tr>
                                                <ul>
                                                    <td>
                                                        <li>Ayah</li>
                                                    </td>
                                                    <td>: <?php echo $kerjaayah; ?></td>
                                                </ul>
                                            </tr>
                                            <tr>
                                                <ul>
                                                    <td>
                                                        <li>Ibu</li>
                                                    </td>
                                                    <td>: <?php echo $kerjaibu; ?></td>
                                                </ul>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Wali peserta didik</td>
                                            </tr>
                                            <tr>
                                                <ul>
                                                    <td>
                                                        <li>Nama</li>
                                                    </td>
                                                    <td>: Nama wali</td>
                                                </ul>
                                            </tr>
                                            <tr>
                                                <ul>
                                                    <td>
                                                        <li>Pekerjaan</li>
                                                    </td>
                                                    <td>: Pekerjaa wali</td>
                                                </ul>
                                            </tr>
                                            <tr>
                                                <ul>
                                                    <td>
                                                        <li>Alamat</li>
                                                    </td>
                                                    <td>: Alamat wali</td>
                                                </ul>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="pull-right">Mengetahui, <br>Kepala Sekolah
                                                    <br><br><br><br><br>
                                                    (..................................................)
                                                </td>
                                            </tr>

                                        </table>
                                    </section><!-- /.content -->
                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                        <div class="col-xs-12">
                                            <a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                        </div>
                                    </div>

                                </div><!-- /.tab-pane -->


                                <div class="tab-pane" id="ubahprofil">
                                    <form role="form" method="post" action="../conf/ubah-siswa.php">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="namasiswa">Nama Siswa</label>
                                                        <input type="text" class="form-control" id="namasiswa" name="namasiswa" required value="<?php echo $nama; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nisn">NISN</label>
                                                        <input type="text" class="form-control" id="nisn" name="nisn" maxlength="10" value="<?php echo $nisn;?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nis">NIS</label>
                                                        <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $nis; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kelamin">Jenis Kelamin</label>
                                                        <select class="form-control" id="kelamin" name="kelamin" required>
                                                            <option value="">PILIH:</option>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tempatlahir">Tempat Lahir</label>
                                                        <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggallahir">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kelas">Kelas</label>
                                                        <select class="form-control" id="kelas" name="kelas" required>
                                                            <option value="">PILIH KELAS:</option>
                                                            <?php
                                                            include "../conf/conn.php";
                                                            $query_kelas = mysqli_query($link, 'SELECT * FROM kelas;');
                                                            while ($row_kelas = mysqli_fetch_array($query_kelas)) { ?>
                                                                <option value="<?php echo $row_kelas['kelas']; ?>"><?php echo $row_kelas['kelas']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="IDdatasiswa" name="IDdatasiswa">
                                        </div><!-- /.box-body -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="add">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                    </div><!-- /.col -->
                </div> <!-- /.row -->
                <!-- END CUSTOM TABS -->

            </div><!--/.col (left) -->

        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->