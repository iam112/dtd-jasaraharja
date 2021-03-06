<?php
//Error Upload
if(isset($error)){
    echo'<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}


// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open_multipart(base_url('staff/belum_diproses/edit/'.$belum_diproses->id), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Nomor Polisi</label>
    <div class="col-md-5">
        <input type="text" name="nopol" class="form-control" placeholder="Nomor Polisi" value="<?php echo $belum_diproses->nopol ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Pemilik</label>
    <div class="col-md-5">
        <input type="text" name="pemilik" class="form-control" placeholder="Pemilik" value="<?php echo $belum_diproses->pemilik ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">alamat</label>
    <div class="col-md-5">
        <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $belum_diproses->alamat ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Nomor Telpon</label>
    <div class="col-md-5">
        <input type="text" name="no_telpon" class="form-control" placeholder="Nomor Telpon" value="<?php echo $belum_diproses->no_telpon ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kondisi</label>
    <div class="col-md-5">
        <input type="text" name="kondisi" class="form-control" placeholder="Kondisi" value="<?php echo $belum_diproses->kondisi ?>" required>
    </div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-md-2 control-label">Status</label>
  <div class="col-md-5">
    <select name="status" class="form-control">
        <option value="Selesai">Selesai</option>
        <option value="Belum Diproses" <?php if($belum_diproses->status=="Belum Diproses") { echo "selected"; } ?> >Belum Diproses</option>
    </select>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Masa Berlaku Awal</label>
    <div class="col-md-5">
        <input type="date" name="masa_awal" class="form-control" placeholder="Masa Berlaku Awal" value="<?php echo $belum_diproses->masa_awal ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Masa Berlaku Akhir</label>
    <div class="col-md-5">
        <input type="date" name="masa_akhir" class="form-control" placeholder="Masa Berlaku Akhir" value="<?php echo $belum_diproses->masa_akhir ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tarif</label>
    <div class="col-md-5">
        <input type="number" name="tarif" class="form-control" placeholder="Tarif" value="<?php echo $belum_diproses->tarif ?>" required>
    </div>
</div>


<div class="form-group">
  <label for="inputEmail3" class="col-md-2 control-label">Regional</label>
  <div class="col-md-5">
    <select name="regional" class="form-control">
        <?php foreach($regional as $regional):?>
            <option value="<?= $regional->regional?>"
                <?php if ($regional->regional == $belum_diproses->regional) : ?> selected<?php endif; ?>
            >
                <?= $regional->nama_regional?>
            </option>
        <?php endforeach; ?>
      </select>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</div>

<?php echo form_close(); ?>