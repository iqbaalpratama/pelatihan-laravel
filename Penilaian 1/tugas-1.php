<?php

class Kalkulator{
    protected $daya;

    public function __construct()
    {
        $this->daya = 0;
    }

    public function isiDaya(){
        $this->daya += 30;
        echo "Daya Kalkulator anda sekarang ".$this->daya.'<br>';
    }

    protected function kurangiDaya(){
        $this->daya -= 10;
    }

    protected function cekDaya(){
        if($this->daya < 10){
            return true;
        }
        return false;
    }

    public function penjumlahan($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu <br>";
            return;
        }
        else{
            $this->kurangiDaya();
            echo $angkaPertama+$angkaKedua.'<br>';
        }
    }

    public function pengurangan($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu <br>";
            return;
        }
        else{
            $this->kurangiDaya();
            echo $angkaPertama-$angkaKedua.'<br>';
        }
    }

    public function perkalian($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu <br>";
            return;
        }
        else{
            $this->kurangiDaya();
            echo $angkaPertama*$angkaKedua.'<br>';
        }
    }

    public function pembagian($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu <br>";
            return;
        }
        else{
            if($angkaKedua == 0){
                echo "Tidak bisa membagi dengan angka 0! <br>";
                return;
            }
            $this->kurangiDaya();
            echo $angkaPertama/$angkaKedua.'<br>';
        }
    }

    public function perpangkatan($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu <br>";
            return;
        }
        else{
            if( $angkaPertama**$angkaKedua > 1000000 ){
                echo "Nilai diluar batas yang ditentukan <br>";
                return;
            }
            echo $angkaPertama**$angkaKedua.'<br>';
        }
    }

}


class KalkulatorHemat extends Kalkulator{
    protected function kurangiDaya(){
        $this->daya -= 5;
    }

    protected function cekDaya(){
        if($this->daya < 5){
            return true;
        }
        return false;
    }
}
// $kalkulator = new KalkulatorHemat();
// $kalkulator->isiDaya();
// $kalkulator->perkalian(12,13);
// $kalkulator->pembagian(12,0);
// $kalkulator->perkalian(1,25);
// // $kalkulator->perpangkatan(10,7);
// $kalkulator->penjumlahan(1,4);
// $kalkulator->pembagian(12,5);
// $kalkulator->penjumlahan(15,4);
// $kalkulator->perkalian(15,4);
// $kalkulator->pengurangan(1,1);
?>