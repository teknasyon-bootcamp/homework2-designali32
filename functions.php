<?php

/**
 * functions.php
 *
 * Direk olarak çalıştırılmasını istemediğimiz betik dosyasıdır.
 * Bu dosya başka bir yerde dahil edilmediyse çalıştırılmasını engellemek istiyoruz.
 * Örneğin, `http://localhost/functions.php` adresiyle ziyaret etmek istediğimizde,
 * bir hata mesajı verip betiğin sonlanmasını istiyoruz.
 *
 * > Betiği herhangi bir yerde sonlandırmak için `exit`
 * > (https://www.php.net/manual/en/function.exit.php) veya `die` kullanabilirsiniz.
 *
 * Bu dosyada tanımlanan fonksiyonları diğer iki betik dosyasında kullanmanızı
 * istiyoruz. Ek olarak, `getRandomPostCount` isminde bir fonksiyon tanımlamanızı
 * bekliyoruz. Bununla ilgili detaylı bilgi diğer betiklerde yer alıyor.
 */

/*basename($_SERVER['PHP_SELF']) dosyanın serverdaki yolu ve adı, basename(__FILE__) ise şu anki bu kodun olduğu dosya adı
Bu iki dosya adı aynı olur ise yani bu sayfa direk çalıştırılmak istenirse uyarı verip betiği bitirecek.
Bu dosyayı farklı bir sayfaya include edersek o zaman __FILE__ kısmı function.php dosyası olmayacağı için çalıştırılacak.
Aksi takdir de hata verecektir.*/
if(basename($_SERVER['PHP_SELF'])==basename(__FILE__)){
    exit("Bu sayfa tek başına çalıştırılamaz!");
}
function getLatestPosts($count = 5)
{
    $posts = [];
    $postTypes = ["urgent", "warning", "normal"];

    for($i=1; $i<=$count; $i++) {
        do {
            $id = rand(1, 1000);
        } while (array_key_exists($id, $posts));

        $type = $postTypes[rand(0, count($postTypes)-1)];

        //id değişkenini ekrana yazdırmak istediğimiz için posts dizisine id anahtarınıda ekledim
        $posts[$id] = [
            "id" => $id,
            "title" => "Yazı " . $i,
            "type" => $type
        ];
    }

    return $posts;
}

function getPostDetails($id, $title)
{
    echo "<h1>".$title." (#".$id.")</h1>";
    echo <<<EOT
<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a iaculis justo, ac molestie justo. Integer semper nibh non imperdiet blandit. Integer nec diam eget sapien viverra rutrum ut eu justo. Suspendisse efficitur pretium eleifend. Vivamus ex nibh, euismod eget massa ut, accumsan ullamcorper nisi. Phasellus tristique magna et nibh dictum rhoncus. Phasellus at metus quis mi egestas blandit. Vestibulum lacinia ut tortor nec consectetur. Nulla sed risus ut est imperdiet vulputate ac non quam. Aliquam viverra erat vitae diam commodo, et molestie metus ultricies. Praesent rutrum urna a nisi egestas aliquam sit amet eu eros.
</p>
EOT;
}

// Aşağıya fonksiyonu tanımlayabilirsiniz.


//getRandomPostCount min max değerleri ile random sayı üreten fonksiyon
function getRandomPostCount($min,$max){
    return rand($min,$max);
}
//type değişkeninden gelen değere göre, renk ataması yapmak için getBackgroundColor fonsiyonunu tanımladık.
function getBackgroundColor($type){
    if($type=="urgent"){
        return "red";
    }
    elseif($type=="warning"){
        return "yellow";
    }
    elseif($type=="normal"){
        return "none";
    }
}