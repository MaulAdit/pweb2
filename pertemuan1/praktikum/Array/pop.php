<?php
$siswa = ["Tian", "Asep", "Salman", "Cipe"];

//menambah array awal 
echo "Array awal : <br>";
print_r($siswa);

//menghapus elemen terakhir dri array
$orang_terakhir = array_pop($siswa);

//menampilkan Elemen terakhir yang dihapus
echo "<br>Elemen yang akan dihapus : $orang_terakhir \n";

//menampilkan array setelah penghapusan
echo "<br>Array setelah penghapusan : <br>";
print_r($siswa);
?>