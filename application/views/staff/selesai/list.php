<p class="pull-right">
    <div class="btn-group ">
        <?php include('menu_cetak.php')?>
    </div>
</p>

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
                <th>REGIONAL</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>KOTA PEKANBARU</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/pekanbaru') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KOTA DUMAI</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/dumai') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KABUPATEN SIAK</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/siak') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KABUPATEN ROKAN HULU</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/rohul') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KABUPATEN ROKAN HILIR</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/rohIl') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KABUPATEN PELALAWAN</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/pelalawan') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KABUPATEN KUANTAN SINGIGI</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/kuansing') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KABUPATEN KAMPAR</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/kampar') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KABUPATEN INDRAGIRI HULU</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/inhu') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KABUPATEN INDRAGIRI HILIR</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/inhil') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>KABUPATEN BENGKALIS</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/bengkalis') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <tr>
                <td>TOTAL SELESAI</td>
                <td>
                    <a href="<?php echo base_url('staff/selesai/total_selesai') ?>" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>