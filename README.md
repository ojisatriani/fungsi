## Fungsi oji Satriani
fungsi oji

Instalation
----

Via composer:
```
composer require ojisatriani/fungsi
```

Manual composer.json in require section:
```
"require": {
    "ojisatriani/fungsi": "dev-master", // <- this line
}
```

Basic Usage:
----

```$php
use OjiSatriani\Fungsi;

//tanggal populer indonesia
$tanggal = Fungsi::setTanggal();
$tanggal->tanggalSekarang(); // 2018-03-09
$tanggal->tanggalIndonesia(); // 09 Maret 2018
$tanggal->setTanggal('2018-03-9');
$tanggal->tanggalIndonesia(); // 09 Maret 2018
$tanggal->tanggalIndonesiaSingkat(); // 09 Mar 2018
$tanggal->namaBulan(); // Maret
$tanggal->namaBulanSingkat();  // Mar
$tanggal->getHari(); // Jum'at
$tanggal->getBulan(); // Maret
$tanggal->arrayHari(); // array() [01] - [31]
$tanggal->arrayBulan(); // array() ['Januari'] - ['Desember']
$tanggal->arrayTahun(1970,2018); // array() [1970] - [2018]
$tanggal->waktu(); //return array() [tahun] [bulan] [hari] [jam] [menit] [detik]

//kebutuhan lainnya
$fungsi = new Fungsi;
$fungsi->romawi(25); // XXV
$fungsi->autolink('ini ada link http://www.google.com'); // ini adalah link <a href="http://www.google.com">http://www.google.com</a>
$fungsi->terbilang(50000); // Lima Puluh Ribu
$fungsi->slug('ini adalah permalink','-'); // ini-adalah-permalink
$fungsi->alamatIp(); // 192.168.1.5
```