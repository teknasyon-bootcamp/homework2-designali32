<?php

/**
 * post.php
 *
 * Bu betik direk olarak erişilebilir. functions.php'de yaptığınız gibi bir
 * kontrol eklemenize gerek yok.
 *
 * > Dikkat: Bu dosya hem direk çalıştırılabilir hem de `posts.php` dosyasında
 * > 1+ kez içe aktarılmış olabilir.
 *
 * Bu betik dosyası içerisinde functions.php'de yer alan fonksiyonları da kullanarak
 * aşağıdaki işlemleri gerçekleştirmenizi bekliyoruz.
 *
 * - $id değişkeni yoksa "1" değeri ile tanımlanmalı, daha önceden bu değişken
 * tanımlanmışsa değeri değiştirilmemeli. (Kontrol etmek için `isset`
 * (https://www.php.net/manual/en/function.isset.php) kullanılabilir.)
 * - $id için yapılan işlemin aynısı $title ve $type için de yapılmalı. (İstediğiniz
 * değerleri verebilirsiniz)
 * - Bir sonraki adımda ilgili içerik gösterilmeden önce bir div oluşturulmalı ve
 * bu div $type değerine göre arkaplan rengi almalıdır. (urgent=kırmızı,
 * warning=sarı, normal=arkaplan yok)
 * - `getPostDetails` fonksiyonu tetiklenerek ilgili içeriğin çıktısı gösterilmeli.
 */

//id, title, ve type değişkenlerinin daha önce tanımlanıp tanımlanmadığını !isset ile kontrol ettik.
//tanımlama yoksa bizim değerlerimiz ile ekrana basacağımız verileri belirledik.
if(!isset($id)){
    $id=1;
}
if(!isset($title)){
    $title="Başlık [post.php] dosyasındaki default başlık değeri";
}
if(!isset($type)){
    $type="urgent";
}
//type değerine göre divin arka planının ne olacağını $background_color değişkenine attık
//tanımlı fonksiyonları kullanmak için function.php dosyasını require ile içe aktardık.
require_once ("functions.php");
$background_color=getBackgroundColor($type);
//div'i oluşturup getPostDetails ile ekrana basıyoruz.
    echo "<div style=background:$background_color;>";
    echo getPostDetails($id,$title)."</div>";
