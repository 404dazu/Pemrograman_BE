<?php

class Animal{
    public $hewan;

    public function __construct(){
        $this->hewan = array();
    }

    public function index(){
        if(empty($this->hewan)){
            echo "Hewan tidak ada datanya! <br>";
        } else {
            echo "Data hewan: <br>";
            foreach ($this->hewan as $hewan){
                echo $hewan . "<br>";
            }
        }
    }

    public function store($new_hewan){
        $this->hewan[]= $new_hewan;
        echo "Hewan baru telah ditambahkan. <br>";
    }

    public function update($index, $update_hewan){
        if ($index < 0 || $index >= count ($this->hewan)){
            echo "Hewan tidak valid! <br>";
        }else{
            $this->hewan[$index] = $update_hewan;
            echo "Data hewan telah di perbaharui! <br>";
        }
    }

    public function destroy($index){
        if ($index <0 || $index >= count($this->hewan)){
            echo "Hewan tidak valid! <br>";
        }else{
            array_splice($this->hewan, $index, 1);
            echo "Data hewan telah berhasil dihapus! <br>";
        }
    }
}

$animal = new Animal([]);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('burung');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";