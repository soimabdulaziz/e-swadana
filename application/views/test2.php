<?php
    function recurring($arr){
        $count = 0;
        foreach ($arr){
            $count ++
        }
        for($i=0; $i<=$count; $i++) {
            $j = $i+1;
            if($arr[$i] == $arr[$j]) {
                $recurring = $arr[$i];
            }
            endif;
        }
        return $recurring;
    }

?>