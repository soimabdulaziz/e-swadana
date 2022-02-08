<?php
    function second_large($arr){
        $count = 0;
        foreach ($arr){
            $count ++
        }
        for($i=0; $i<=$count; $i++) {
            $j = $i+1;
            if($arr[$i] >= $arr[$j]) {
                $first=$arr[$j]; 
            }
        }
        for($i=0; $i<=$count; $i++) {
            $n = $i+1;
            if($arr[$i] >= $arr[$n] && < $first){
                $second = $arr[$i];
            }
        }
        return $second;
    }

?>