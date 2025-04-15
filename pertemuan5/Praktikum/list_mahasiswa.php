<?php
 require 'dbkoneksi.php';

 // 4) definisikan query
 $sql = "SELECT * FROM mahasiswa ORDER BY thn_masuk DESC";
 // 5) jalankan query
 $rs = $dbh->query($sql);
// 6) tampilkan hasil query
foreach($rs as $row){
    echo "<br>".$row->nim.'_'.$row->nama;
}
?>