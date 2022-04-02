<?php

class Kalkulator{
    private $daya;

    public function __construct()
    {
        $this->daya = 0;
    }

    public function isiDaya(){
        $this->daya += 50;
    }

    private function kurangiDaya(){
        $this->daya -= 10
        ;
    }

    private function cekDaya(){
        if($this->daya < 10){
            return false;
        }
        return true;
    }

    public function penjumlahan($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu";
        }
        else{
            $this->kurangiDaya();
            return $angkaPertama+$angkaKedua;
        }
    }

    public function pengurangan($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu";
        }
        else{
            $this->kurangiDaya();
            return $angkaPertama-$angkaKedua;
        }
    }

    public function perkalian($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu";
        }
        else{
            $this->kurangiDaya();
            return $angkaPertama*$angkaKedua;
        }
    }

    public function pembagian($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu";
        }
        else{
            if($angkaKedua == 0){
                echo "Tidak bisa membagi dengan angka 0";
            }
            $this->kurangiDaya();
            return $angkaPertama*$angkaKedua;
        }
    }

    public function perpangkatan($angkaPertama, $angkaKedua){
        if($this->cekDaya()){
            echo "Kalkulator tidak bisa digunakan karena daya kalkulator kurang, silahkan isi daya terlebih dahulu";
        }
        else{
            $this->kurangiDaya();
            if( $angkaPertama**$angkaKedua > 1000000 ){
                echo "Nilai diluar batas yang ditentukan";
            }
            return $angkaPertama**$angkaKedua;
        }
    }

}

