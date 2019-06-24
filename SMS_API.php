<?php
sleep(3);
$banner = "\e[36;1m                                                                                 
     >
       >
         >
           >
         >
       >
     >   -------------
                              
                                                                                 
[#] Mr. Jhon[#]    
                                   
Author : Jhonhilman12\n\n\e[0;1m";
echo $banner;




echo "masukan nama pengirim :\n";
$nama = trim(fgets(STDIN));
echo "maskan nomer tujuan : \n";
$nomer = trim(fgets(STDIN));
echo "amasukan Pesan :\n";
$pesan = trim(fgets(STDIN));


$data = array( "nama" => $nama,
               "tlp" => $nomer,
               "pesan" => $pesan,
               "submit" => "kirim"
           );


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://smsgratis2019.000webhostapp.com/header.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_HEADER,1);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: smsgratis2019.000webhostapp.com,
// User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:65.0) Gecko/20100101 Firefox/65.0,
// Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8,
// Accept-Language: en-US,en;q=0.5,
// Accept-Encoding: gzip, deflate, br,
// Referer: https://smsgratis2019.000webhostapp.com/,
// Content-Type: application/x-www-form-urlencoded,
// Content-Length: 59,
// Connection: keep-alive,
// Cookie: _ga=GA1.2.547387571.1548337890; _omappvp=KfOIEbd745gMmyhQczIwp9PIWcPdxGzjffzbZ0jHuDdhP0x7WIthXv25hjFwaB9UC5MJseZQ3rmaxtVgT1qFS6ScNF9gpVFj,
// Upgrade-Insecure-Requests: 1,
// TE: Trailers"));

$hasil = curl_exec($ch);

if(preg_match("/SUKSESS/", $hasil)){
	echo date("[d-m-y")."] Sms Sukses Dikirim !";
}else{
	echo date("[d-m-y")."] Gagal Dikirim !";
}
?>
