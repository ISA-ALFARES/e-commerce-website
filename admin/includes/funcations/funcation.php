<?php

    function get_title(){//Bu işlev sayfaları adlandırmak için kullanılır

              global $page_title ;

              if(isset($page_title)){

                echo lang($page_title);

              }else{

                echo 'Default';
              }
    }
    /*
    ** anasayfa Yönlendirme fonksiyonu
    ** Bu fonksiyon Parametreleri Kabul Etmektedir
    ** $theMsg = Mesajı  [ Hata | Başarı |  ]
    ** $page_address = Yönlendirmek istediğiniz adres
    ** $saniye = Yeniden Yönlendirmeden Önceki Saniye
    */
    function redirect_home($themesg , $secends =3,$page_adress = 'index.php' ){

        echo  $themesg;

        echo '<div class="alert alert-info"> '. lang('You will be redirected to the previous page after seconds ') . $secends.'</div>';

        header("refresh:$secends;url=$page_adress");

        exit();
    }

/*
    ** urunler Kontrol Et fonksiyonu
    ** Veritabanındaki urun Kontrol Etme fonksiyonu [ İşlev Parametreleri Kabul Et ]
    ** $select = Seçilecek Öğe [ Örnek: kullanıcı, öğe, kategori ]
    ** $from = Seçilecek Tablo [ Örnek: kullanıcılar, öğeler, kategoriler ]
    ** $where_value = Seçimin Değeri [ Örnek: isa, Box, ]
    */
    function chekitem($select,$from,$where_value) {

      global $connection ;

      $statement = $connection->prepare("SELECT $select FROM $from  WHERE $select = ? ");

      $statement->execute(array($where_value));

      return $statement->rowCount();
    }

/*
   ** urunler Kontrol Et İşlevi
   ** Veritabanındaki Öğeyi Kontrol Etme fonksiyonu [ fonksiyon Parametreleri Kabul Et ]
   ** $select = Seçilecek urun [ Örnek: bilgisayar, telefon ]
   ** $from = Seçilecek Tablo [ Örnek: users, items, kategoriler ]
   ** $where_value = Seçimin Değeri [ Örnek: isa, Box ]
   */
    function count_items( $item , $table ,$condition = '' ){

      global $connection ;

      $statement = $connection->prepare("SELECT COUNT($item) FROM $table $condition ");

      $statement->execute();

      return $statement->fetchColumn();
    }
    /*
        ** En Son Kayıtları Alma İşlevi v1.0
        ** Veritabanından En Son Öğeleri Alma fonksiyonu [ Kullanıcılar, Öğeler, Yorumlar ]
        ** $select = Seçilecek Alan
        ** $tablo = Seçim Yapılacak Tablo
        ** $order = order by
        ** $limit = Alınacak Kayıt Sayısı
        */
    function getLatest($select , $table , $order , $limit = 5 ){

        global $connection ;

        $statement=$connection->prepare("SELECT  $select  FROM $table ORDER BY  $order desc LIMIT $limit    ");

        $statement->execute();

        return $statement->fetchAll();
    }


    function getCount($column , $table){

        global $connection ;

        $statement = $connection->prepare("SELECT $column AS number FROM $table");
        $statement->execute();
        $result = $statement->fetch();
        if ($result) {
            echo $result['number'];
        } else {
            echo "No data found.";
        }

    }

