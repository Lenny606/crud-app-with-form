<?php

class Region 
{
    public $id = null;
    public $name = null;
    public $slug = null;

    public function insert()
    {
        DB::insert("INSERT INTO `regions2` (`name`, `slug`) VALUES (?,?)", [$this->name,$this->slug]);

        $this->id = DB::lastInsertId(); // if you want to work with the data after redirection you have to use this lastID
        
    }

    
    public function update()
    {
        if(!isset($this->id)){
           echo "false";
       }else{
        $query = "UPDATE `regions2` SET `name`='$this->name' WHERE `id`= $this->id"; /// value substituiton add
        DB::update($query);
       }
    }

    public function delete()
    {
        $query = "DELETE FROM `regions2` WHERE `id`= $this->id"; /// value substituiton add
        DB:: delete($query);
    }

    // public function save()
    // {
    //     if (isset($this->id)) {
    //         insert()
    //     } else {
    //         save()
    //     }
    // }

}