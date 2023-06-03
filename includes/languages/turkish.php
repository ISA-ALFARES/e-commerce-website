<?php
    function lang($phrase){
        static $trlang = array(
//           Start  NavbarPages
            'HOME'          => "HOME",
            'LOGIN'         => "Giriş" ,
            'MEMBERS'       => "Üyeler" ,
            'CATIGORIES'    => "Katigoriler",
            'DASHBOARD'     => "Gösterge Paneli" ,
            'ACCOUNT'          => "Hesabım",
            'EDIT'      => "Profili Düzenle",
            'ADDMEMBER'      => " Üye Ekle" ,
            'EditMemper'     => "Üye Düzenle",
            'INSERTMEMBER'   => "Insert page" ,
            'MANAGEMEMBER'   => "Üyeleri Yönet" ,
            'DELETEMEMBER'   => "Üyeleri Sil" ,
            'UPDATE-MEMBER'   => "Üyeleri Güncelle" ,
            'SITTING'    => "Sittings",
            'LOGOUT'     => "Çıkış Yap" ,

            //End  NavbarPages

            //Start Member titles....
        );
        return $trlang[$phrase];
    };


?>