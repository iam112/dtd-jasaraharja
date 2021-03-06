<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$konfigurasi->gambar) ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" media="print">
    </style>
</head>
<body onload="print()">
    <?php $no=1; foreach($datasemua as $datasemua) { ?>
    <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->gambar ) ?>" width="15%" height="15%">
    <div class="container">
        <center>
            <h4>
                LAPORAN HASIL KUNJUNGAN PERORANGAN/<br>
                DOOR TO DOOR (DTD)
            </h4>
        <hr style="
  border: 0.5px solid;">
        </center>
        <p style="font-size: 17px">
            <table>
                <tr>
                    <td>
                        Pada Tanggal <?php echo $datasemua->tanggal_pelaksanaan ?> Kami
                    </td>
                    <td>
                        :
                    </td>
                </tr>
                <tr>
                    <td>
                        Nama
                    </td>
                    <td>
                        : <?php echo $datasemua->nama ?>
                    </td>
                </tr>                
                <tr>
                    <td>
                        Jabatan
                    </td>
                    <td>
                        : <?php echo $datasemua->jabatan ?>
                    </td>
                </tr>
            </table>
            <br>
            Telah Mengunjungi Pengusaha / Pemilik Angkutan Kendaraan Bermotor :
            <br>
            <table>
                <tr>
                    <td>
                        Nopol
                    </td>
                    <td>
                        : <?php echo $datasemua->nopol ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nama Pemilik
                    </td>
                    <td>
                        : <?php echo $datasemua->pemilik ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat Pemilik
                    </td>
                    <td>
                        : <?php echo $datasemua->nopol ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Telepon
                    </td>
                    <td>
                        : <?php echo $datasemua->no_telpon ?>
                    </td>
                </tr>
            </table>
            <br>
            Hasil Kegiatan<br>
            1. Status Kendaraan : <b><?php echo $datasemua->kondisi ?></b><br>
            2. Tunggakan IWKBU periode <?php echo $datasemua->masa_awal ?> s/d <?php echo $datasemua->masa_akhir ?> Sebesar <?php $date = date("Y-m-d");
                        $akhir = $datasemua->masa_akhir;
                        $timeStart = strtotime("$akhir");
                        $timeEnd = strtotime("$date");
                        // Menambah bulan ini + semua bulan pada tahun sebelumnya
                        $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                        // menghitung selisih bulan
                        $numBulan += date("m",$timeEnd)-date("m",$timeStart);

                        $oustanding =  $datasemua->tarif * $numBulan;
                        echo "Rp.", number_format($oustanding,'0',',','.');
                    ?><br>
            3. Pemilik berjanji membayar tanggal : <?php echo $datasemua->janji_bayar ?><br>
            4. Keterangan : <?php echo $datasemua->keterangan ?><br>
            Demikian Laporan hasil kunjungan kepada Pengusaha / Pemilik Angkutan Kendaraan <br>
            Bermotor :
                <table class="table borderless">
                    <tr>
                        <td><center>
                                Pengusaha
                            </center>
                        </td>
                        <td></td>
                        <td>
                            <center>
                                Petugas Jasa Raharja
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <img src="<?php echo base_url('assets/upload/image/'.$datasemua->ttd) ?>" width="59px">
                            </center>
                        </td>
                        <td></td>
                        <td>
                            <center>
                                <img src="<?php echo base_url('assets/upload/image/'.$datasemua->userttd) ?>" width="59px">
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                (<?php echo $datasemua->pemilik ?>)
                            </center>
                        </td>
                        <td>
                        </td>
                        <td>
                            <center>
                                (<?php echo $datasemua->nama ?>)
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <center>
                                Mengetahui:<br>
                                <?php echo $kepalacabang->jabatan ?> <br>
                                <?php echo $kepalacabang->cabang ?>
                            </center>
                        </td>
                    </tr>
                    <?php if($kepalacabang->ttd == null) { ?>
                        <tr>
                            <td colspan="3">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                &nbsp;
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <center>
                                <?php
                                if($kepalacabang->ttd != null) { ?>
                                    <img src="<?php echo base_url('assets/upload/image/'.$kepalacabang->ttd) ?>" width="59px">
                                <?php } ?>
                            </center>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <center>
                                (<?php echo $kepalacabang->nama ?>)
                            </center>
                        </td>
                    </tr>
                </table>
        </p>
    </div>
    <?php if($kepalacabang->ttd == null) { ?>
        <br>
        <br>
        <br>
    <?php } ?>
    <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->gambar ) ?>" width="15%" height="15%"><br><br>
    <div class="container">
        <center>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">
                                <center><b>DOKUMENTASI KEGIATAN CRM DAN DTD</b></center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Hari / Tanggal
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo $datasemua->tanggal_pelaksanaan ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Lokasi
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo $datasemua->alamat ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Petugas
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo $datasemua->nama ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <center>
                                    <?php 
                                    $gambar = $this->data_model->gambar($datasemua->data_id);
                                    foreach($gambar as $gambar) { ?>
                                        <img src="<?php echo base_url('assets/upload/image/'.$gambar->foto) ?>" class="img img-responsive img-thumbnail" width="450px" height="450px"><br>
                                    <?php } ?>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </center>
    </div>
    <?php } ?>
</body>
</html>