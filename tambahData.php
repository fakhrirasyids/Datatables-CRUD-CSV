<?php
$nama = '';
$kategori = '';
$jumlah = '';
$tanggal='';

function clean_text($string) {
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["submit"])) {
    if(isset($_POST["nama"])){
        $nama = clean_text($_POST["nama"]);
    }
    if(isset($_POST["kategori"])){
        $kategori = clean_text($_POST["kategori"]);
    }
    if(isset($_POST["jumlah"])){
        $jumlah = clean_text($_POST["jumlah"]);
    }
    if(isset($_POST["tanggal"])){
        $tanggal = clean_text($_POST["tanggal"]);
    }

    $file_open = fopen("databuku/data.csv", "a");
    $form_data = array(
        'nama'  => $nama,
        'kategori'  => $kategori,
        'jumlah' => $jumlah,
        'tanggal' => $tanggal,
    );

    fputcsv($file_open, $form_data);
    $nama = '';
    $kategori = '';
    $jumlah = '';
    $tanggal = '';
}


echo "<meta http-equiv=refresh content=0.1;URL='index.php'>";
?>