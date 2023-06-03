<?php
    function lang($phrase){
        static $lang = array(
//           Start  NavbarPages
            'HOME'          => "HOME",
            'LOGIN'         => "Login" ,
            'MEMBERS'       => "Members" ,
            'LANGUAGE'       => "Language" ,
            'CATIGORIES'    => "Catigories",
            'DASHBOARD'     => "Dashboard" ,
            'ACCOUNT'          => "my account",
                'EDIT'      => "Edit Profile",
                    'ADDMEMBER'      => "Add page" ,
                    'EditMemper'     => "Edit Member",
                    'INSERTMEMBER'   => "Insert page" ,
                    'MANAGEMEMBER'   => "Manage Members" ,
                    'DELETEMEMBER'   => "Delete Membber" ,
                    'UPDATE-MEMBER'   => "Update Member" ,
                'SITTING'    => "Sittings",
                'LOGOUT'     => "Logout" ,

                //End  NavbarPages

            //Start Member titles....
        );
        return $lang[$phrase];
    }


