<?php
// @author by Lugi
http://fb.com/www.Lugi23 //

function bacaHTML($url){
         // inisialisasi CURL
         $data = curl_init();
         // setting CURL
         curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($data, CURLOPT_URL, $url);
         // menjalankan CURL untuk membaca isi file
         $hasil = curl_exec($data);
         curl_close($data);
         return $hasil;
    }

    // Grabbing from Mediafire.com
    $mediafire_HTML =  bacaHTML('https://www.mediafire.com/file/1kwoat566i8f52f/Sub_Urban_-_Cradles.mp3'); // url content
    
    // Mengambil direct link download
    $mediafire_geturl = explode('                        href="', $mediafire_HTML); // tag awal
    $mediafire_getlink = explode('">', $mediafire_geturl[1]); // akhir tag 
   
    // Mengambil judul file 
    $mediafire_judul = explode('                            <div class="filename">' , $mediafire_HTML); // tag awal
    $mediafire_getjudul = explode('</div>' , $mediafire_judul[1]); //akhir tag   

    // Menampilkan hasil
    echo'Judul : '.$mediafire_getjudul[0].' </br>';
    echo'Link : '.$mediafire_getlink[0].' </br>';
?>
