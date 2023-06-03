<?php
    function lang($phrase){
        static $trlang = array(
            'MASSEGE' => "Merhaba",
            'ADMIN' => "admins"
        );
        return $trlang[$phrase];
    };


?>