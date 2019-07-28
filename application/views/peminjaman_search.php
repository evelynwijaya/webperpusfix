<?php if (sizeof($databuku) > 0) { ?>
    <br/><br/>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Kode Buku</td>
            <td>Judul Buku</td>
            <td>Pengarang</td>
            <td></td>
        </tr>
        </thead>
        <?php foreach ($databuku as $data): ?>
            <tr>
                <td><?php echo $data['id_buku']; ?></td>
                <td><?php echo $data['judul_buku']; ?></td>
                <td><?php echo $data['pengarang']; ?></td>
                <td><a href="#" class="tambah"
                       kode="<?php echo $data['id_buku']; ?>"
                       judul="<?php echo $data['judul_buku']; ?>"
                       jumlah_buku="<?php echo $data['jumlah_buku']; ?>"
                       pengarang="<?php echo $data['pengarang']; ?>"><i
                                class="icon-plus"</i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } else { ?>
    <br/>
    <strong>Book Not Found</strong>

<?php } ?>