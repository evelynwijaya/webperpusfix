<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>Kode Buku</td>
        <td>Judul Buku</td>
        <td>Pengarang</td>
        <td></td>
    </tr>
    </thead>
    <?php foreach($temp as $tmp):?>
        <tr>
            <td><?php echo $tmp->id_buku;?></td>
            <td><?php echo $tmp->judul_buku;?></td>
            <td><?php echo $tmp->pengarang;?></td>
            <td><a href="#" class="hapus" kode="<?php echo $tmp->id_buku;?>"><i class="icon-trash"></i></a></td>
        </tr>
    <?php endforeach;?>
    <tr>
        <td colspan="2">Total Buku</td>
        <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTemp;?>" class="form-control"></td>
    </tr>
</table>