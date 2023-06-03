<?php
    function lang($phrase){
        static $arlang = array(
            'MASSEGE' => "اهلا",
            'ADMIN' => "مشرف"
        );
        return $arlang[$phrase];
    };


?>