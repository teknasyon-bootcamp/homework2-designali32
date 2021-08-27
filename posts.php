<?php

/**
 * posts.php
 *
 * Bu betik direk olarak erişilebilir. functions.php'de yaptığınız gibi bir
 * kontrol eklemenize gerek yok.
 *
 * Bu betik dosyası içerisinde functions.php'de yer alan fonksiyonları da kullanarak
 * aşağıdaki işlemleri gerçekleştirmenizi bekliyoruz.
 *
 * - functions.php içerisinde oluşturacağınız `getRandomPostCount` fonksiyonunuza min
 * ve max değerleri gönderip bu fonksiyondan rastgele bir tam sayı elde etmeniz
 * gerekiyor. (min ve max için istediğiniz değerleri seçebilirsiniz. Random bir
 * tam sayı elde etmek için `rand` (https://www.php.net/manual/en/function.rand.php)
 * fonksiyonunu kullanabilirsiniz.)
 *
 * - Elde ettiğiniz bu sayıyı da kullanarak `getLatestPosts` fonksiyonunu
 * çalıştırmalısınız. Bu fonksiyondan aldığınız diziyi kullanarak `post.php` betik
 * dosyasını döngü içinde dahil etmeli ve her yazı için detayları göstermelisiniz.
 */

//getLatestPosts fonksiyonuna göndermek için count değişkenine random sayı gönderdik
require_once ("functions.php");
$count= getRandomPostCount(0,1000);
//getLatestPosts fonksiyonunu çalıştırarak rastgele üretilen postları alıyoruz.
$posts= getLatestPosts($count);
if(isset($posts)) {
    //post dizisi set edilmiş ise foreach ile postları döndürüp tek tek ekrana basıyoruz.
    foreach ($posts as $post_item) {
        $type = $post_item["type"];
        $title = $post_item["title"];
        $id = $post_item["id"];
        $background_color=getBackgroundColor($type);
        require ("post.php");
    }
}