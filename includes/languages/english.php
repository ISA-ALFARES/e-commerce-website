<?php
    function lang($phrase){
        static $lang = array(
//           Start  NavbarPages
            'HOMEPAGE'          => "HomePage",
            'LOGIN'         => "Login" ,
            'MEMBERS'       => "Members" ,
            'LANGUAGE'       => "Language" ,
            'CATIGORIES'    => "Catigories",
            'DASHBOARD'     => "Dashboard" ,
            'ITEMS'         => "ITEMS" ,
            'COMMENTS'         => "Comments" ,
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
                    'MANAGE_ITEMS'   =>  "Manage items" ,
                    'ADD_ITEMS'   =>  "Add Items" ,
                    'EDIT_ITEMS'   =>  "Edit Items" ,
                     'MANAGECOMMENTS'   =>  "Manage Comments" ,
                    'EDIT_COMMENT'   =>  "Edit Comment" ,
                    'MY_ACCOUNT'   =>  "  My Account" ,
                    'LOGIN_SIGNUP'   =>  "Login|Signup" ,
                    'ADD_NEW_ITEM'   =>  "Add Item" ,
                    'MONY'   =>  "  $" ,
            'My Profile'   =>  "My Profile" ,
            'Add addres'   =>  "Add addres" ,
            'New Item'   =>  "New Item" ,
            'My Items'   =>  "My Items" ,
            'ADD_TO_CARD'   =>  "Add To Cart" ,
            'ADDADDRESS'   =>  "Adres Ekle" ,
            'INSERTADDRES'   =>  "Adres Ekle" ,
            'Save'   =>  "Save" ,
            'NOT APPROVE'   =>  "NOT APPROVE" ,

                //End  NavbarPages

            //Start Member titles....
        );
        return $lang[$phrase];
    }


