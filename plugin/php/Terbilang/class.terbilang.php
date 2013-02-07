<?

/*
 *
 * Class : Terbilang
 * Spell quantity numbers in Indonesian or Malay Language
 *
 *
 * author: huda m elmatsani
 * 21 September 2004
 * freeware
 *
 * example:
 * $bilangan = new Terbilang;
 * echo $bilangan -> eja(12415);
 * result: dua belas ribu empat ratus lima belas
 *
 *
 */

Class Terbilang {

    private function kekata($x) {
        $x = abs($x);
        $angka = array("", "satu", "dua", "tiga", "empat", "lima",
            "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($x < 12) {
            $temp = " " . $angka[$x];
        } else if ($x < 20) {
            $temp = $this->kekata($x - 10) . " belas";
        } else if ($x < 100) {
            $temp = $this->kekata($x / 10) . " puluh" . $this->kekata($x % 10);
        } else if ($x < 200) {
            $temp = " seratus" . $this->kekata($x - 100);
        } else if ($x < 1000) {
            $temp = $this->kekata($x / 100) . " ratus" . $this->kekata($x % 100);
        } else if ($x < 2000) {
            $temp = " seribu" . $this->kekata($x - 1000);
        } else if ($x < 1000000) {
            $temp = $this->kekata($x / 1000) . " ribu" . $this->kekata($x % 1000);
        } else if ($x < 1000000000) {
            $temp = $this->kekata($x / 1000000) . " juta" . $this->kekata($x % 1000000);
        } else if ($x < 1000000000000) {
            $temp = $this->kekata($x / 1000000000) . " milyar" . $this->kekata(fmod($x, 1000000000));
        } else if ($x < 1000000000000000) {
            $temp = $this->kekata($x / 1000000000000) . " trilyun" . $this->kekata(fmod($x, 1000000000000));
        }
        return $temp;
    }

    private function tkoma($x) {
        $x = stristr($x, '.');
        $angka = array("nol", "satu", "dua", "tiga", "empat", "lima",
            "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = '';
        $length = strlen($x);
        $pos = 1;

        while ($pos < $length) {
            $char = substr($x, $pos, 1);
            $pos++;
            $temp .= ' ' . $angka[$char];
        }
        return $temp;
    }

    public function eja($x) {
        if ($x < 0) {
            $hasil = "minus " . trim($this->kekata($x));
        } else {
            $hasil = trim($this->kekata($x));
            $poin = trim($this->tkoma($x));
            if ($poin) {
                $hasil .= ' koma ' . $poin;
            }
        }
        return $hasil;
    }

}
?>
