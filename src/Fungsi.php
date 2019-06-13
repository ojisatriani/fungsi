<?php

namespace OjiSatriani;

class Fungsi
{
    private static $tanggal;

    public function __construct($tgl = null)
    {
       self::$tanggal = $tgl == null ? date('Y-m-d'):date('Y-m-d',strtotime($tgl));
    }

    public function __toString(){
        return $this->error;
    }

    public function tanggalSekarang()
    {
        return self::$tanggal;
    }

    public static function setTanggal($tgl = NULL){
       //self::$tanggal = date('Y-m-d',strtotime($tgl));
       return new static($tgl);
    }

    public function tanggalIndonesia()
    {
        return substr(self::$tanggal, 8, 2).' '.$this->getBulan().' '.substr(self::$tanggal, 0, 4);
    }

    public function tanggalIndonesiaSingkat()
    {
        return substr(self::$tanggal, 8, 2).' '.substr($this->getBulan(), 0, 3).' '.substr(self::$tanggal, 0, 4);
    }

    public function namaBulan()
    {
        return $this->getBulan();
    }

    public function namaTahun()
    {
        return date("Y", strtotime(self::$tanggal));
    }

    public function bulanTahun($singkat = false)
    {
        return $singkat == false ? $this->namaBulan() . ' ' . $this->namaTahun():$this->namaBulanSingkat() . ' ' . $this->namaTahun();
    }

    public function namaBulanSingkat()
    {
        return substr($this->getBulan(), 0, 3);
    }

    public function getHari()
    {
        $hari = date('N', strtotime(self::$tanggal));
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
        $bulan = substr(self::$tanggal, 5, 2);
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

    public function arrayBulan($nol = true)
    {
        if($nol == true){
            return array("01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni","07"=>"July","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November","12"=>"Desember");
        } else {
            return array(1=>"Januari",2=>"Februari",3=>"Maret",4=>"April",5=>"Mei",6=>"Juni",7=>"July",8=>"Agustus",9=>"September",10=>"Oktober",11=>"November",12=>"Desember");
        }
    }

    public function arrayTahun($mulai=1970, $habis = null)
    {
        $to =$habis == null ? date("Y"):$habis;
        for ($a=$to;$a>=$mulai;$a--) {
            $tahun[$a] =$a;
        }
        return $tahun;
    }

    public function arrayJam()
    {
        for ($i=0; $i<=23; $i++) {
            $nilai = strlen($i) == 1 ? '0' . $i:$i;
            $waktu[$i] = $nilai;
        }
        return $waktu;
    }

    public function arrayMenitDetik()
    {
        for ($i=0; $i<=60; $i++) {
            $nilai = strlen($i) == 1 ? '0' . $i:$i;
            $waktu[$i] = $nilai;
        }
        return $waktu;
    }

    public function arrayWaktu()
    {
        $waktu = [
            'tahun' => $this->arrayTahun(),
            'bulan' => $this->arrayBulan(),
            'hari'  => $this->arrayHari(),
            'jam'   => $this->arrayJam(),
            'menit' => $this->arrayMenitDetik(),
            'detik' => $this->arrayMenitDetik(),
        ];
        return $waktu;
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
        $title = $this->ascii($title);
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
        return $this->slug($baru).".".strtolower(substr(strrchr($lama, '.'), 1));
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

    public function ascii($value)
    {
        foreach ($this->charsArray() as $key => $val) {
            $value = str_replace($val, $key, $value);
        }
        return preg_replace('/[^\x20-\x7E]/u', '', $value);
    }

    public function charsArray()
    {
        /**
         * Returns the replacements for the ascii method.
         *
         * Note: Adapted from Stringy\Stringy.
         *
         * @see https://github.com/danielstjules/Stringy/blob/2.3.1/LICENSE.txt
         *
         * @return array
         */
        static $charsArray;
        if (isset($charsArray)) {
            return $charsArray;
        }
        return $charsArray = [
            '0'    => ['°', '₀', '۰'],
            '1'    => ['¹', '₁', '۱'],
            '2'    => ['²', '₂', '۲'],
            '3'    => ['³', '₃', '۳'],
            '4'    => ['⁴', '₄', '۴', '٤'],
            '5'    => ['⁵', '₅', '۵', '٥'],
            '6'    => ['⁶', '₆', '۶', '٦'],
            '7'    => ['⁷', '₇', '۷'],
            '8'    => ['⁸', '₈', '۸'],
            '9'    => ['⁹', '₉', '۹'],
            'a'    => ['à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ā', 'ą', 'å', 'α', 'ά', 'ἀ', 'ἁ', 'ἂ', 'ἃ', 'ἄ', 'ἅ', 'ἆ', 'ἇ', 'ᾀ', 'ᾁ', 'ᾂ', 'ᾃ', 'ᾄ', 'ᾅ', 'ᾆ', 'ᾇ', 'ὰ', 'ά', 'ᾰ', 'ᾱ', 'ᾲ', 'ᾳ', 'ᾴ', 'ᾶ', 'ᾷ', 'а', 'أ', 'အ', 'ာ', 'ါ', 'ǻ', 'ǎ', 'ª', 'ა', 'अ', 'ا'],
            'b'    => ['б', 'β', 'Ъ', 'Ь', 'ب', 'ဗ', 'ბ'],
            'c'    => ['ç', 'ć', 'č', 'ĉ', 'ċ'],
            'd'    => ['ď', 'ð', 'đ', 'ƌ', 'ȡ', 'ɖ', 'ɗ', 'ᵭ', 'ᶁ', 'ᶑ', 'д', 'δ', 'د', 'ض', 'ဍ', 'ဒ', 'დ'],
            'e'    => ['é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'ë', 'ē', 'ę', 'ě', 'ĕ', 'ė', 'ε', 'έ', 'ἐ', 'ἑ', 'ἒ', 'ἓ', 'ἔ', 'ἕ', 'ὲ', 'έ', 'е', 'ё', 'э', 'є', 'ə', 'ဧ', 'ေ', 'ဲ', 'ე', 'ए', 'إ', 'ئ'],
            'f'    => ['ф', 'φ', 'ف', 'ƒ', 'ფ'],
            'g'    => ['ĝ', 'ğ', 'ġ', 'ģ', 'г', 'ґ', 'γ', 'ဂ', 'გ', 'گ'],
            'h'    => ['ĥ', 'ħ', 'η', 'ή', 'ح', 'ه', 'ဟ', 'ှ', 'ჰ'],
            'i'    => ['í', 'ì', 'ỉ', 'ĩ', 'ị', 'î', 'ï', 'ī', 'ĭ', 'į', 'ı', 'ι', 'ί', 'ϊ', 'ΐ', 'ἰ', 'ἱ', 'ἲ', 'ἳ', 'ἴ', 'ἵ', 'ἶ', 'ἷ', 'ὶ', 'ί', 'ῐ', 'ῑ', 'ῒ', 'ΐ', 'ῖ', 'ῗ', 'і', 'ї', 'и', 'ဣ', 'ိ', 'ီ', 'ည်', 'ǐ', 'ი', 'इ'],
            'j'    => ['ĵ', 'ј', 'Ј', 'ჯ', 'ج'],
            'k'    => ['ķ', 'ĸ', 'к', 'κ', 'Ķ', 'ق', 'ك', 'က', 'კ', 'ქ', 'ک'],
            'l'    => ['ł', 'ľ', 'ĺ', 'ļ', 'ŀ', 'л', 'λ', 'ل', 'လ', 'ლ'],
            'm'    => ['м', 'μ', 'م', 'မ', 'მ'],
            'n'    => ['ñ', 'ń', 'ň', 'ņ', 'ŉ', 'ŋ', 'ν', 'н', 'ن', 'န', 'ნ'],
            'o'    => ['ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ø', 'ō', 'ő', 'ŏ', 'ο', 'ὀ', 'ὁ', 'ὂ', 'ὃ', 'ὄ', 'ὅ', 'ὸ', 'ό', 'о', 'و', 'θ', 'ို', 'ǒ', 'ǿ', 'º', 'ო', 'ओ'],
            'p'    => ['п', 'π', 'ပ', 'პ', 'پ'],
            'q'    => ['ყ'],
            'r'    => ['ŕ', 'ř', 'ŗ', 'р', 'ρ', 'ر', 'რ'],
            's'    => ['ś', 'š', 'ş', 'с', 'σ', 'ș', 'ς', 'س', 'ص', 'စ', 'ſ', 'ს'],
            't'    => ['ť', 'ţ', 'т', 'τ', 'ț', 'ت', 'ط', 'ဋ', 'တ', 'ŧ', 'თ', 'ტ'],
            'u'    => ['ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'û', 'ū', 'ů', 'ű', 'ŭ', 'ų', 'µ', 'у', 'ဉ', 'ု', 'ူ', 'ǔ', 'ǖ', 'ǘ', 'ǚ', 'ǜ', 'უ', 'उ'],
            'v'    => ['в', 'ვ', 'ϐ'],
            'w'    => ['ŵ', 'ω', 'ώ', 'ဝ', 'ွ'],
            'x'    => ['χ', 'ξ'],
            'y'    => ['ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'ÿ', 'ŷ', 'й', 'ы', 'υ', 'ϋ', 'ύ', 'ΰ', 'ي', 'ယ'],
            'z'    => ['ź', 'ž', 'ż', 'з', 'ζ', 'ز', 'ဇ', 'ზ'],
            'aa'   => ['ع', 'आ', 'آ'],
            'ae'   => ['ä', 'æ', 'ǽ'],
            'ai'   => ['ऐ'],
            'at'   => ['@'],
            'ch'   => ['ч', 'ჩ', 'ჭ', 'چ'],
            'dj'   => ['ђ', 'đ'],
            'dz'   => ['џ', 'ძ'],
            'ei'   => ['ऍ'],
            'gh'   => ['غ', 'ღ'],
            'ii'   => ['ई'],
            'ij'   => ['ĳ'],
            'kh'   => ['х', 'خ', 'ხ'],
            'lj'   => ['љ'],
            'nj'   => ['њ'],
            'oe'   => ['ö', 'œ', 'ؤ'],
            'oi'   => ['ऑ'],
            'oii'  => ['ऒ'],
            'ps'   => ['ψ'],
            'sh'   => ['ш', 'შ', 'ش'],
            'shch' => ['щ'],
            'ss'   => ['ß'],
            'sx'   => ['ŝ'],
            'th'   => ['þ', 'ϑ', 'ث', 'ذ', 'ظ'],
            'ts'   => ['ц', 'ც', 'წ'],
            'ue'   => ['ü'],
            'uu'   => ['ऊ'],
            'ya'   => ['я'],
            'yu'   => ['ю'],
            'zh'   => ['ж', 'ჟ', 'ژ'],
            '(c)'  => ['©'],
            'A'    => ['Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Å', 'Ā', 'Ą', 'Α', 'Ά', 'Ἀ', 'Ἁ', 'Ἂ', 'Ἃ', 'Ἄ', 'Ἅ', 'Ἆ', 'Ἇ', 'ᾈ', 'ᾉ', 'ᾊ', 'ᾋ', 'ᾌ', 'ᾍ', 'ᾎ', 'ᾏ', 'Ᾰ', 'Ᾱ', 'Ὰ', 'Ά', 'ᾼ', 'А', 'Ǻ', 'Ǎ'],
            'B'    => ['Б', 'Β', 'ब'],
            'C'    => ['Ç', 'Ć', 'Č', 'Ĉ', 'Ċ'],
            'D'    => ['Ď', 'Ð', 'Đ', 'Ɖ', 'Ɗ', 'Ƌ', 'ᴅ', 'ᴆ', 'Д', 'Δ'],
            'E'    => ['É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'Ë', 'Ē', 'Ę', 'Ě', 'Ĕ', 'Ė', 'Ε', 'Έ', 'Ἐ', 'Ἑ', 'Ἒ', 'Ἓ', 'Ἔ', 'Ἕ', 'Έ', 'Ὲ', 'Е', 'Ё', 'Э', 'Є', 'Ə'],
            'F'    => ['Ф', 'Φ'],
            'G'    => ['Ğ', 'Ġ', 'Ģ', 'Г', 'Ґ', 'Γ'],
            'H'    => ['Η', 'Ή', 'Ħ'],
            'I'    => ['Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Î', 'Ï', 'Ī', 'Ĭ', 'Į', 'İ', 'Ι', 'Ί', 'Ϊ', 'Ἰ', 'Ἱ', 'Ἳ', 'Ἴ', 'Ἵ', 'Ἶ', 'Ἷ', 'Ῐ', 'Ῑ', 'Ὶ', 'Ί', 'И', 'І', 'Ї', 'Ǐ', 'ϒ'],
            'K'    => ['К', 'Κ'],
            'L'    => ['Ĺ', 'Ł', 'Л', 'Λ', 'Ļ', 'Ľ', 'Ŀ', 'ल'],
            'M'    => ['М', 'Μ'],
            'N'    => ['Ń', 'Ñ', 'Ň', 'Ņ', 'Ŋ', 'Н', 'Ν'],
            'O'    => ['Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ø', 'Ō', 'Ő', 'Ŏ', 'Ο', 'Ό', 'Ὀ', 'Ὁ', 'Ὂ', 'Ὃ', 'Ὄ', 'Ὅ', 'Ὸ', 'Ό', 'О', 'Θ', 'Ө', 'Ǒ', 'Ǿ'],
            'P'    => ['П', 'Π'],
            'R'    => ['Ř', 'Ŕ', 'Р', 'Ρ', 'Ŗ'],
            'S'    => ['Ş', 'Ŝ', 'Ș', 'Š', 'Ś', 'С', 'Σ'],
            'T'    => ['Ť', 'Ţ', 'Ŧ', 'Ț', 'Т', 'Τ'],
            'U'    => ['Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'Û', 'Ū', 'Ů', 'Ű', 'Ŭ', 'Ų', 'У', 'Ǔ', 'Ǖ', 'Ǘ', 'Ǚ', 'Ǜ'],
            'V'    => ['В'],
            'W'    => ['Ω', 'Ώ', 'Ŵ'],
            'X'    => ['Χ', 'Ξ'],
            'Y'    => ['Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Ÿ', 'Ῠ', 'Ῡ', 'Ὺ', 'Ύ', 'Ы', 'Й', 'Υ', 'Ϋ', 'Ŷ'],
            'Z'    => ['Ź', 'Ž', 'Ż', 'З', 'Ζ'],
            'AE'   => ['Ä', 'Æ', 'Ǽ'],
            'CH'   => ['Ч'],
            'DJ'   => ['Ђ'],
            'DZ'   => ['Џ'],
            'GX'   => ['Ĝ'],
            'HX'   => ['Ĥ'],
            'IJ'   => ['Ĳ'],
            'JX'   => ['Ĵ'],
            'KH'   => ['Х'],
            'LJ'   => ['Љ'],
            'NJ'   => ['Њ'],
            'OE'   => ['Ö', 'Œ'],
            'PS'   => ['Ψ'],
            'SH'   => ['Ш'],
            'SHCH' => ['Щ'],
            'SS'   => ['ẞ'],
            'TH'   => ['Þ'],
            'TS'   => ['Ц'],
            'UE'   => ['Ü'],
            'YA'   => ['Я'],
            'YU'   => ['Ю'],
            'ZH'   => ['Ж'],
            ' '    => ["\xC2\xA0", "\xE2\x80\x80", "\xE2\x80\x81", "\xE2\x80\x82", "\xE2\x80\x83", "\xE2\x80\x84", "\xE2\x80\x85", "\xE2\x80\x86", "\xE2\x80\x87", "\xE2\x80\x88", "\xE2\x80\x89", "\xE2\x80\x8A", "\xE2\x80\xAF", "\xE2\x81\x9F", "\xE3\x80\x80"],
        ];
    }
    
    //konversi Nomor Induk Pegawai
    public function nip($nip, $batas = " ") {
        $nip        = trim($nip," ");
        $panjang    = strlen($nip);
        
        if($panjang == 18) {
            $sub[]  = substr($nip, 0, 8); // tanggal lahir
            $sub[]  = substr($nip, 8, 6); // tanggal pengangkatan
            $sub[]  = substr($nip, 14, 1); // jenis kelamin
            $sub[]  = substr($nip, 15, 3); // nomor urut
            
            return $sub[0].$batas.$sub[1].$batas.$sub[2].$batas.$sub[3];
        } elseif($panjang == 15) {
            $sub[]  = substr($nip, 0, 8); // tanggal lahir
            $sub[]  = substr($nip, 8, 6); // tanggal pengangkatan
            $sub[]  = substr($nip, 14, 1); // jenis kelamin
            
            return $sub[0].$batas.$sub[1].$batas.$sub[2];
        } elseif($panjang == 9) {
            $sub    = str_split($nip,3);
            
            return $sub[0].$batas.$sub[1].$batas.$sub[2];
        } else {
            return $nip;
        }
    }
}
