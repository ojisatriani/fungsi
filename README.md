## Fungsi oji Satriani
fungsi oji

Instalation
----

Manual composer.json in require section:
```
"require": {
    "ojisatriani/fungsi": "dev-master", // <- this line
}
```

Basic Usage:
----

```$php
use ojisatriani\fungsi\fungsi;

$fungsi     = new fungsi;
$tanggal    = $fungsi->tanggalSekarang(); // 2018-03-09
$fungsi->setTanggal($tanggal);
$fungsi->tanggalIndonesia(); // 09 Maret 2018
$fungsi->tanggalIndonesiaSingkat(); // 09 Mar 2018
$fungsi->namaBulan(); // Maret
$fungsi->namaBulanSingkat(); // Mar
$fungsi->getHari(); // Jum'at
$fungsi->getBulan(); // Maret
$fungsi->arrayHari(); // array(01-31)
$fungsi->arrayBulan(); // array('Januari'-'Desember')
$fungsi->arrayTahun(1970,2018); // array(1970 -2018)
$fungsi->romawi(25); // XXV
$fungsi->autolink('ini ada link http://www.google.com'); // ini adalah link <a href="http://www.google.com">http://www.google.com</a>
$fungsi->terbilang(50000); // Lima Puluh Ribu
$fungsi->slug('ini adalah permalink','-'); // ini-adalah-permalink
$fungsi->alamatIp(); // 192.168.1.5
```