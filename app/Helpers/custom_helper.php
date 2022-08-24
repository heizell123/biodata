<?php

function rupiah($angka){
    
    $hasil_rupiah =  number_format($angka,3,'.',',');
    if(!empty($angka)){

        return $hasil_rupiah;
    }else{
        return null;
    } 
}
function replace_grade($angka){
    $angka = str_replace('0.00','',$angka);
    $angka = str_replace('.00','',$angka);
    return $angka;
}

function replace_index($str = NULL,$replace = NULL,$search = NULL){
    
    $hasil_replace =  str_replace($search,$replace,$str);
    return $hasil_replace;
 
}

function encrypt_url($string) {

    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */        
    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];

    // hash
    $key    = hash("sha256", $secret_key);

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv     = substr(hash("sha256", $secret_iv), 0, 16);

    //do the encryption given text/string/number
    $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($result);
    return $output;
}



function decrypt_url($string) {

    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */

    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];

    // hash
    $key    = hash("sha256", $secret_key);

    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv = substr(hash("sha256", $secret_iv), 0, 16);

    //do the decryption given text/string/number

    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}

function tanggal_indonesia($tanggal){

    $bulan = array (
        1 =>    'Januari',
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

        $var = explode('-', $tanggal);

        return $var[2] . ' ' . $bulan[ (int)$var[1] ] . ' ' . $var[0];
        
}

function viewDate($date = NULL)
{
    if(!empty($date)){
        return date('d/m/Y',strtotime($date));
    }else{
        return NULL;
    }
}

function numFormat($value='')
{
    if (!empty($value)) {
        return number_format($value , 0, ',', '.');   
    }else{
        return $value;
    }
}

function replaceDate($date='')
{   
    if(!empty($date)){
        $date            = str_replace('/', '-', $date);
        $date            = date('Y-m-d',strtotime($date));
    }
    return $date;
}