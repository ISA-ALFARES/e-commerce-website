<?php
    function lang($phrase){
        static $arlang = array(
//           Start  NavbarPages
            'HOME'            => "لوغو",
            'LOGIN'           => "تسجيل الدخول" ,
            'MEMBERS'         => "ألأعضاء" ,
            'CATIGORIES'      => "الاصناف",
            'DASHBOARD'       => "لوحة التحكم" ,
            'ACCOUNT'            => "حسابي",
            'EDIT'            => "تعديل صفحتي",
            'ADDMEMBER'       => "أضف مستخدم" ,
            'EditMemper'      => "تعديل بيانات المستخدم",
            'INSERTMEMBER'    => "Insert page" ,
            'MANAGEMEMBER'    => "أدارة ألاعضاء" ,
            'DELETEMEMBER'    => "جذف ألاعضاء" ,
            'UPDATE-MEMBER'   => "تحديث  بيانات الأعضاء" ,
            'SITTING'         => "ألأعدادات",
            'LOGOUT'          => "تسجيل خروج" ,

            //End  NavbarPages

            //Start Member titles....
        );
        return $arlang[$phrase];
    };


?>