<?php
class RandomNumberGenerator {


    public static function generateRandomNumber($con) {
        $id = uniqid();
        $randomNumber = rand();
        $res = $con->query("INSERT INTO `generations` (`id`, `value`) VALUES('$id', '$randomNumber')");
        if($res)   
            return ['id' => $id, 'number' => $randomNumber];
        else
            return array("status"=>"error");
    }

    public static function getGeneratedNumber($con, $id) {
        $res = $con->query("SELECT * FROM `generations` WHERE `id` = '$id'");
        if($res && mysqli_num_rows($res)>0)
            return mysqli_fetch_assoc($res);
        else
            return array("status"=>"error");
        
    }
}

