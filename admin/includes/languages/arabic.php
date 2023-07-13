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
        'DELETEMEMBER'    => "حذف ألاعضاء" ,
        'UPDATE-MEMBER'   => "تحديث  بيانات الأعضاء" ,
        'SITTING'         => "ألأعدادات",
        'LOGOUT'          => "تسجيل خروج" ,

        //Start  NavbarPages Page   //
        'LANGUAGE'       => "اللغات" ,
        'ITEMS'         => " المنتجات" ,
        'COMMENTS'         => "التعليقات" ,
        'VISIT_SHOP'      => "اذهب للمتجر",
        'EN' => "الانجليزية" ,
        'AR' => "العربية" ,
        'TR' => "التركية" ,
        //END  NavbarPages Page   //
        //Start  Memper Pages Page   //
        'ADD_ITEMS'   =>  "اضف منتح" ,
        'MANAGECOMMENTS'   =>  "ادارة التعليقات" ,
        'MANAGE_ITEMS'   =>  "ادارة السلع" ,
        'EDIT_COMMENT'   =>  "تعديل التعليق" ,
        'EDIT_ITEMS'   =>  "تعديل المنتج" ,

        //table
        'ID'               => 'الرقم',
        'Photo'               => 'الصورة',
        'Username'               => 'اسم المستخدم',
        'Email'               => 'البريد الاكتروني',
        'Fullname'               => 'الاسم كامل',
        'Date'               => 'التاريخ',
        'Control'               => 'أدارة',
        'Edit'               => 'تعديل',
        'Delete'               => 'حذف',
        'Activate'               => 'تفعيل',
        'Add Member'               => 'أضف عضو',
        //table
        //Messages
        'Sorry This page is empty, there is nothing to display...!'               => 'عذرا لا يوخد شيء لعرضه في هذه الصفحة...!',
        '    Enter the username...! ' =>   '    أضف اسم المستخدم...! '  ,
        '    Type Your a Password... ' =>   '    أضف كلمة السر...!'  ,
        '      Please Type a valid email' =>   '      أَضف عنوان البريد الاكتروني.!'  ,
        '      Type your fullname... ' =>   '     أضف الاسم كاملا...! '  ,
        'Save' =>   'Save'  ,
        'Username Cant Be <strong>Empty</strong>..!' =>   'Kullanıcı Adı <strong>Boş</strong> Olamaz..!'  ,
        'Username Nust  be Lareger Than <strong>3</strong> Characters..!' =>   'Kullanıcı Adı <strong>3</strong> Karakterden Uzun Olmalıdır..!'  ,
        'cellnumper Nust be Larger Then <strong>2</strong> Numper..!' =>   'Kullanıcı Adı Karakterden <strong>2</strong>  Büyük Olmalıdır..!'  ,
        'The image format is invalid' =>   'Resim Uzantısı geçersiz'  ,
        'Password Cant Be <strong>Empty</strong>..!' =>   'Şifre  <strong>Boş</strong>Olmamalıdır..!'  ,
        'Fullname Cant Be <strong>Empty</strong>..!' =>   'Kullancı Soyadı <strong> Boş olamaz</strong>..!'  ,
        'Message Nust be Lareger Then  <strong> 1</strong> Characters..!' =>   'Kullanıcı adı  <strong> 1</strong> karakterden uzun olmalıdır..!'  ,
        'Avatar Cant Be <strong>Empty</strong>..!' =>   'Fotgrafın<strong>Boş olamaz</strong>..!'  ,
        'Image size cannot be greater than <strong>4MB </strong>..!' =>   'Resim boyutu   <strong>4</strong>MBı geçmemelidir..!'  ,
        'Record updated...' =>   'Başarıyla eklendi...'  ,
        'You will be redirected to the previous page after seconds ' =>   'Saniyeler sonra önceki sayfaya yönlendirileceksiniz '  ,
        '   Type Your New Password... ' =>   '   Yeni Şifre Yazın... '  ,
        'The deletion was completed successfully...!' =>   'Silme işlemi başarıyla tamamlandı...!'  ,
        'Activation completed successfully...!' =>   'Etkinleştirme başarıyla tamamlandı...!'  ,
        'We do not have this user in our records...!' =>   'Bu kullanıcı kayıtlarımızda yok...!'  ,
        '' =>   ''  ,
        '' =>   ''  ,
        '' =>   ''  ,
        '' =>   ''  ,
        '' =>   ''  ,
        '' =>   ''  ,
        //           END  Memper Pages Page   //
        //           Start  Dashboard Pages Page   //
        'Dashboard' =>   'لوحة التحكم'  ,
        'Latest' =>   'القائمة'  ,
        'Registerd Users' =>   'المستخدمين المسجلين'  ,
        'Total Comments' =>   'عدد التعليقات'  ,
        'Total Items' =>   'عدد المنتجات'  ,
        'Pending Members' =>   'المشركين في قائمة الانتظار'  ,
        'Total Members' =>   'عدد المستخدمين'  ,
        'Items' =>   'المنتجات'  ,
        'Comments' =>   'التعليقات'  ,
        'There\'s No Comment To Show' =>   'لا يوجد تعليقات'  ,

        //           End  Dashboard Pages Page   //
        //           Start  Categories Pages Page   //
        'Manage Categories' =>   'ادارة الاقسام'  ,
        'Ordering: [' =>   'ترتيب حسب: ['  ,
        'desc' =>   'من الاحدث'  ,
        'asc' =>   ' الاقدم'  ,
        'Ads Disabled' =>   'الاعلانات معطلة'  ,
        'Comment Disabled' =>   'التعليقات معطلة'  ,
        'Hidden' =>   'اخفاء'  ,
        'Ordering number' =>   'رقم الطلب'  ,
        'Ordering' =>   'ترتيب'  ,
        'Category name' =>   'اسم القسم '  ,
        'Add New Category' =>   'اضف قسم جديد'  ,
        'No' => 'Hayır' ,
        'Yes' => 'Evet' ,
        'Allow Ads' => 'فعل الاعلانات' ,
        'Allow Commenting' => 'اعط اذنا لاضافة التعليقات' ,
        'Visibility' => 'أظهار' ,
        '' => '' ,
        '' => '' ,
        '' => '' ,
        //           END  Categories Pages Page   //
        //           Start  Categories Pages Page   //
        'Name' => 'الاسم' ,
        'Description' => 'شرح' ,
        'Price' => 'السعر' ,
        'Adding Date' => 'تاريح الاضافة' ,
        'Catigore name' => 'اسم القسم ' ,
        'Approve' => 'تفعيل' ,
        '    Enter the Item Name...! ' => '    اضف اسم المنتح...! ' ,
        '   Description of The Item" ' => '   اضف شرح المنتح" ' ,
        '    Enter the Price...! ' => '       اضف سعر المنتح..! ' ,
        '    Enter the Country name...! ' => '    اضف اسم مدينة الصنع...! ' ,
        'Status' => 'الحالة' ,
        'New' => 'جديد' ,
        'Used' => 'مستخدم' ,
        'Like New' => 'يشبه الجديد' ,
        'Catigore' => 'القسم' ,
        'Member' => 'المستخدم' ,
        'Save Item' => 'اضف المنتح' ,
        'Update Item' => 'تحديث المنتج' ,
        //           End  Categories Pages Page   //
        //           Start  Comments Pages Page   //
        'Comment' => 'تعليق' ,
        'Item Name' => 'اسم المنتح' ,
        'User Name' => 'اسم المستخدم' ,
        'Comment_data' => 'تاريخ التعليق' ,
        'Name Can\'t be <sronge>Empty</sronge>' => 'Ad <strong>Boş</strong> olamaz' ,
        'Description Can\'t be <sronge>Empty</sronge>' => 'Açıklama <strong>Boş</strong> olamaz' ,
        'price Can\'t be <sronge>Empty</sronge>'  => 'fiyat <strong>Boş</strong> olamaz' ,
        'Status Can\'t be <sronge>Empty</sronge>'  => 'Durum <strong>Boş</strong> olamaz' ,
        'country Can\'t be <sronge>Empty</sronge>' => 'ülke <strong>Boş</strong> olamaz' ,
        'CAtigore Can\'t be <sronge>Empty</sronge>'  => 'Katıgori <strong>Boş</strong> olamaz' ,
        'memper Can\'t be <sronge>Empty</sronge>'  => 'üye  <strong>Boş</strong> olamaz' ,
        'We do not have this items in our records...!' => 'Kayıtlarımızda bu maddeler yok...!' ,
        'Approve completed successfully...!' => 'Onaylama başarıyla tamamlandı...!' ,
        'This user does not exist...!' => 'Böyle bir kullanıcı yoktur...!' ,

        //           End  Comments Pages Page   //
        //           End  login Pages Page   //
        'log in via' => 'aracılığıyla giriş yap' ,
        'Login' => 'تسجيل دخول' ,
        'Password' => 'كلمة المرور' ,
        'User name' => 'اسم المستخدم' ,
        '' => '' ,
        'CATIGORIES_CHILD' => 'Categories Child' ,
        'None' => 'None' ,
        //           END  Categories Pages Page   //
        //           Start  Categories Pages Page   //
        //           End  login Pages Page   //
        'Separate Tags With Comma' => 'Tags' ,
        '' => '' ,
        '' => '' ,
        '' => '' ,
        '' => '' ,
        '' => '' ,
        //End  NavbarPages

        //Start Member titles....
    );
    return $arlang[$phrase];
};


?>