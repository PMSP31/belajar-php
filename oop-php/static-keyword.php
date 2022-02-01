<?php

// Static ~ pengaksesan property dan method dalam konteks class
class ContohStatic
{
    public static $angka = 1;

    public static function salam()
    {
        // jika menggunakan static, ganti this dengan self::
        return "halo " . self::$angka++ . "x. <br>";
    }
}

// pemanggilan property dan method static
echo ContohStatic::$angka;
echo "<br>";
echo ContohStatic::salam();
echo ContohStatic::salam();

/* 
   member yang terikat pada class bukan object
   nilai dari static akan tetap, meskipun telah di instansiasi object berulang kali
   membuat kode menjadi procedural 
*/