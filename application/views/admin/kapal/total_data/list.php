<p class="pull-right">
    <div class="btn-group ">
        <?php include('menu_cetak.php')?>
    </div>
</p>
<?php include('hapus_duplikat.php'); ?>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<div class="table-responsive">
    <table class="table table-bordered" id="example1">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA PERUSAHAAN</th>
                <th>PEMILIK</th>
                <th>ALAMAT</th>
                <th>NOMOR TELPON</th>
                <th>NAMA KAPAL</th>
                <th>KONDISI</th>
                <th>JUMLAH KAPAL</th>
                <th>STATUS</th>
                <th>MASA BERLAKU AWAL</th>
                <th>MASA BERLAKU AKHIR</th>
                <th>TARIF</th>
                <th>REGIONAL</th>
                <th>OUTSTANDING</th>
                <th>TANGGAL PELAKSANAAN</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($total_data as $total_data) { ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $total_data->nama_perusahaan ?></td>
                <td><?php echo $total_data->pemilik ?></td>
                <td><?php echo $total_data->alamat; 
                    if($total_data->alamat != null) { ?>
                        <a href="https://www.google.com/maps/search/<?php echo $total_data->alamat ?>" target="_blank" class="btn btn-info btn-xs" >
                        <i class="fa fa-map"></i> Lihat Alamat</a>
                    <?php }?>
                </td>
                <td><?php echo $total_data->no_telpon ?></td>
                <td><?php echo $total_data->nama_kapal ?></td>
                <td><?php echo $total_data->kondisi ?></td>
                <td><?php echo $total_data->jumlah_kapal ?></td>
                <td><?php echo $total_data->status ?></td>
                <td><?php echo $total_data->masa_awal ?></td>
                <td><?php echo $total_data->masa_akhir ?></td>
                <td><?php echo "Rp.", number_format($total_data->tarif ,'0',',','.'); ?></td>
                <td><?php echo $total_data->nama_regional ?></td>
                <td><?php $date = date("Y-m-d");
                        $akhir = $total_data->masa_akhir;
                        $timeStart = strtotime("$akhir");
                        $timeEnd = strtotime("$date");
                        // Menambah bulan ini + semua bulan pada tahun sebelumnya
                        $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
                        // menghitung selisih bulan
                        $numBulan += date("m",$timeEnd)-date("m",$timeStart);

                        $total =  $total_data->tarif * $numBulan;
                        $oustanding = $total_data->jumlah_kapal * $total;
                        echo "Rp.", number_format($oustanding,'0',',','.');
                    ?>
                </td>
                <td><?php echo $total_data->tanggal_pelaksanaan ?></td>
                <td><?php 
                        $gambar     = $this->datakapal_model->detail_delete_gambar($total_data->id);
                        if($total_data->ttd != null && $gambar != null) { ?>
                        <a href="<?php echo base_url('admin/kapal/total_data/cetak_data/'.$total_data->id) ?>" target="_blank" class="btn btn-info btn-sm" >
                        <i class="fa fa-print"></i> Cetak Data</a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>