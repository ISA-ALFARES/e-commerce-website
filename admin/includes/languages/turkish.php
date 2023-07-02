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
            //Start  NavbarPages Page   //
            'LANGUAGE'       => "Language" ,
            'ITEMS'         => " Ürünler" ,
            'COMMENTS'         => "Yorumlar" ,
            'VISIT_SHOP'      => "Mağazayi  Git",
            'EN' => "Ingilizce" ,
            'AR' => "Arapça" ,
            'TR' => "Türkçe" ,
            //END  NavbarPages Page   //
            //Start  Memper Pages Page   //
            'ADD_ITEMS'   =>  "Add Items" ,
            'MANAGECOMMENTS'   =>  "Yorumları Yönet" ,
            'MANAGE_ITEMS'   =>  "Ürünleri Yönet" ,
            'EDIT_COMMENT'   =>  "Yorum Düzenle" ,
            'EDIT_ITEMS'   =>  "Ürün Düzenle" ,

            //table
            'ID'               => 'TC',
            'Photo'               => 'Fotograf',
            'Username'               => 'Kullancı Adı',
            'Email'               => 'e-posta',
            'Fullname'               => 'Kullancı Soyadı',
            'Date'               => 'Tarih',
            'Control'               => 'Kontrol',
            'Edit'               => 'Düzenle',
            'Delete'               => 'Sil',
            'Activate'               => 'aktivasyon',
            'Add Member'               => 'Üye ekle',
            //table
            //Messages
            'Sorry This page is empty, there is nothing to display...!'               => 'Üzür Dileriz, bu sayfa boş, görüntülenecek bir şey yok...!',
            '    Enter the username...! ' =>   '    Kullanıcı adını giriniz...! '  ,
            '    Type Your a Password... ' =>   '    Şifreniz  Giriniz.!'  ,
            '      Please Type a valid email' =>   '      Lütfen geçerli bir e-posta yazınız.!'  ,
            '      Type your fullname... ' =>   '      Kullancı Soyadı Giriniz... '  ,
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
            'Dashboard' =>   'Kontrol Paneli'  ,
            'Latest' =>   'Liste'  ,
            'Registerd Users' =>   'kayıtlı kullanıcılar'  ,
            'Total Comments' =>   'Toplam Yorum'  ,
            'Total Items' =>   'Toplam Ürüunler'  ,
            'Pending Members' =>   'Bekleyen üyeler'  ,
            'Total Members' =>   'Toplam Üyeler'  ,
            'Items' =>   'Ürünler'  ,
            'Comments' =>   'Yorumlar'  ,
            'There\'s No Comment To Show' =>   'Gösterilecek Yorum Yok'  ,

            //           End  Dashboard Pages Page   //
            //           Start  Categories Pages Page   //
            'Manage Categories' =>   'Kategorileri Yönet'  ,
            'Ordering: [' =>   'sıralama: ['  ,
            'desc' =>   'Azalan'  ,
            'asc' =>   'artan'  ,
            'Ads Disabled' =>   'Reklamlar Devre Dışı'  ,
            'Comment Disabled' =>   'Yorum Devre Dışı Bırakıldı'  ,
            'Hidden' =>   'Gizlenmiş'  ,
            'Ordering number' =>   'sipariş numarası'  ,
            'Ordering' =>   'ٍSıralama'  ,
            'Category name' =>   'Kategori adı'  ,
            'Add New Category' =>   'Yeni Kategori Ekleyin'  ,
            'No' => 'Hayır' ,
            'Yes' => 'Evet' ,
            'Allow Ads' => 'Reklamlara izin ver' ,
            'Allow Commenting' => 'Yorum yapmaya izin ver' ,
            'Visibility' => 'Görünürlük' ,
            '' => '' ,
            '' => '' ,
            '' => '' ,
            //           END  Categories Pages Page   //
            //           Start  Categories Pages Page   //
            'Name' => 'AD' ,
            'Description' => 'Tanım' ,
            'Price' => 'Fiyat' ,
            'Adding Date' => 'tarih ekleme' ,
            'Catigore name' => 'Kategori AD' ,
            'Approve' => 'Onaylamak' ,
            '    Enter the Item Name...! ' => '    Ürün Adını Giriniz...! ' ,
            '   Description of The Item" ' => '   Ürün Tanıtım Giriniz" ' ,
            '    Enter the Price...! ' => '       Fiyatı girin...! ' ,
            '    Enter the Country name...! ' => '    Ülke adını girin...! ' ,
            'Status' => 'Durum' ,
            'New' => 'Yeni' ,
            'Used' => 'Kullanılmış' ,
            'Like New' => 'Yeni gibi' ,
            'Catigore' => 'Katigore' ,
            'Member' => 'Üyeler' ,
            'Save Item' => 'Ürün Kaydet' ,
            'Update Item' => 'Ürün Güncelleme' ,
            //           End  Categories Pages Page   //
            //           Start  Comments Pages Page   //
            'Comment' => 'Yorum' ,
            'Item Name' => 'Ürün İsmi' ,
            'User Name' => 'Kullanıcı adı' ,
            'Comment_data' => 'Yorum Tarihleri' ,
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
            'Login' => 'Giriş yap' ,
            'Password' => 'Şifre' ,
            'User name' => 'Kullanıcı adı' ,
            '' => '' ,
            //           End  login Pages Page   //
            //End  NavbarPages

            //Start Member titles....
        );
        return $trlang[$phrase];
    };


?>