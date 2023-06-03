<?php
    function lang($phrase){
        static $lang = array(
            'HOME' => "HOME",
            'GATIGORIES' => "GATIGORIES",
            'ADMIN'      => "PROFILE",
            'EDIT'       => "Edit Profaile",
            'SITTING'    => "Sittings",
            'LOGOUT'     => "Logout" ,
            //Start Page titles....
            'LOGIN'          => "Login" ,
            'LOGOUT'         => "Logout" ,
            'DASHBORD'       => "Dashbord" ,
            'EDITPROFILE'    => "EditProfile" ,
            'ADDMEMBER'      => "Add page" ,
            'INSERTMEMBER'   => "Insert page" ,
            'MANAGEMEMBER'   => "Manage Members" ,
            'DELETEMEMBER'   => "Delete PAge" ,
            //End Page titles....
            //Start Member titles....
            'MEMPERS'    => "Members" ,
            'EditMemper' => "Edit Member",
            //Start Member titles....
        );
        return $lang[$phrase];
    };


?>