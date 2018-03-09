<?php

namespace ojisatriani\fungsi;

class fungsi
{
    private $tanggal;

    public function __construct()
    {
        $this->setTanggal(date('Y-m-d'));
    }

    public function tanggalSekarang()
    {
        return $this->tanggal;
    }

    public function setTanggal($tanggal){
        $this->tanggal = $tanggal;
    }

    public function tanggalIndonesia()
    {
        return substr($this->tanggal, 8, 2).' '.$this->getBulan().' '.substr($this->tanggal, 0, 4);
    }

    public function tanggalIndonesiaSingkat()
    {
        return substr($this->tanggal, 8, 2).' '.substr($this->getBulan(), 0, 3).' '.substr($this->tanggal, 0, 4);
    }

    public function namaBulan()
    {
        return $this->getBulan();
    }

    public function namaBulanSingkat()
    {
        return substr($this->getBulan(), 0, 3);
    }

    public function getHari()
    {
        $hari = date('N', strtotime($this->tanggal));
        switch ($hari) {
                    case 0:
                        return "Minggu";
                        break;
                    case 1:
                        return "Senin";
                        break;
                    case 2:
                        return "Selasa";
                        break;
                    case 3:
                        return "Rabu";
                        break;
                    case 4:
                        return "Kamis";
                        break;
                    case 5:
                        return "Jum'at";
                        break;
                    case 6:
                        return "Sabtu";
                        break;
                    default:
                        return "Minggu";
                        break;
                } //end switch case
    }

    public function getBulan()
    {
        $bulan = substr($this->tanggal, 5, 2);
        switch ($bulan) {
                    case 1:
                        return "Januari";
                        break;
                    case 2:
                        return "Februari";
                        break;
                    case 3:
                        return "Maret";
                        break;
                    case 4:
                        return "April";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Juni";
                        break;
                    case 7:
                        return "Juli";
                        break;
                    case 8:
                        return "Agustus";
                        break;
                    case 9:
                        return "September";
                        break;
                    case 10:
                        return "Oktober";
                        break;
                    case 11:
                        return "November";
                        break;
                    case 12:
                        return "Desember";
                        break;
                } //end switch case
    } //end getBulan

    public function arrayHari()
    {
        for ($i=1; $i<=31; $i++) {
            $nilai = strlen($i) == 1 ? '0' . $i:$i;
            $tgl[$i] = $nilai;
        }
        return $tgl;
    }

    public function arrayBulan()
    {
        return array("01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni","07"=>"July","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November","12"=>"Desember");
    }

    public function arrayTahun($mulai=1970, $habis = null)
    {
        $to =$end == null ? date("Y"):$habis;
        for ($a=$to;$a>=$mulai;$a--) {
            $tahun[$a] =$a;
        }
        return $tahun;
    }

    function romawi($integer)
    {
        //http://www.hashbangcode.com/blog/php-function-turn-integer-roman-numerals
        // Convert the integer into an integer (just to make sure)
        $integer    = intval($integer);
        $result     = '';

        // Create a lookup array that contains all of the Roman numerals.
        $lookup = array('M'     => 1000,
                        'CM'    => 900,
                        'D'     => 500,
                        'CD'    => 400,
                        'C'     => 100,
                        'XC'    => 90,
                        'L'     => 50,
                        'XL'    => 40,
                        'X'     => 10,
                        'IX'    => 9,
                        'V'     => 5,
                        'IV'    => 4,
                        'I'     => 1);

        foreach($lookup as $roman => $value){
            // Determine the number of matches
            $matches = intval($integer/$value);

            // Add the same number of characters to the string
            $result .= str_repeat($roman,$matches);

            // Set the integer to be the remainder of the integer and the value
            $integer = $integer % $value;
        }

        // The Roman numeral should be built, return it
        return $result;
    }

    public function autolink($str)
    {
        $str = preg_replace("/([[:space:]])((f|ht)tps?:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)/", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $str); //http
        $str = preg_replace("/([[:space:]])(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)/", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $str); // www.
        $str = preg_replace("/([[:space:]])([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/", "\\1<a href=\"mailto:\\2\">\\2</a>", $str); // mail
        $str = preg_replace("/^((f|ht)tp:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)/", "<a href=\"\\1\" target=\"_blank\">\\1</a>", $str); //http
        $str = preg_replace("/^(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)/", "<a href=\"http://\\1\" target=\"_blank\">\\1</a>", $str); // www.
        $str = preg_replace("/^([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/", "<a href=\"mailto:\\1\">\\1</a>", $str); // mail
        return $str;
    }

    public function terbilang($x)
    {
        $tbl = "";
        $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12) {
            $tbl.= " " . $abil[$x];
        } elseif ($x < 20) {
            $tbl.= $this->Terbilang($x - 10) . "belas";
        } elseif ($x < 100) {
            $tbl.= $this->Terbilang($x / 10) . " puluh" . $this->Terbilang($x % 10);
        } elseif ($x < 200) {
            $tbl.= " seratus" . $this->Terbilang($x - 100);
        } elseif ($x < 1000) {
            $tbl.= $this->Terbilang($x / 100) . " ratus" . $this->Terbilang($x % 100);
        } elseif ($x < 2000) {
            $tbl.= " seribu" . $this->Terbilang($x - 1000);
        } elseif ($x < 1000000) {
            $tbl.= $this->Terbilang($x / 1000) . " ribu" . $this->Terbilang($x % 1000);
        } elseif ($x < 1000000000) {
            $tbl.= $this->Terbilang($x / 1000000) . " juta" . $this->Terbilang($x % 1000000);
        }

        return $tbl;
    }

    function slug($title, $separator = '-')
	{
        $title = ascii($title);
        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';
        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);
        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));
        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);
        return trim($title, $separator);
    }
    
    public function namaBaru($lama, $baru)
    {
        return slug($baru).".".strtolower(substr(strrchr($lama, '.'), 1));
    }

    public function hapusFile($path, $namaFile)
    {
        $path = $path .'/';
        if (!empty($namaFile)) {
            if (file_exists($path . $namaFile)) {
                unlink($path . $namaFile);
            }
            $tipe = array("kecil", "thumb", "empatEnam", "sedang", "wide", "slide", "banner","avatar");
            foreach ($tipe as $gbr) {
                if (file_exists($path . $gbr .'-'. $namaFile)) {
                    unlink($path . $gbr .'-'. $namaFile);
                }
            }
        }
    }

    public function hapusFileSatu($path, $namaFile)
    {
        $path = $path .'/';
        if (!empty($namaFile)) {
            if (file_exists($path . $namaFile)) {
                unlink($path . $namaFile);
            }
        }
    }

    public function alamatIp()
    {
        $ipaddress = '';
        //($_SERVER['SERVER_NAME'])
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }
}
