## Kapital Bank ECOM Merchant TXPG API

Kapital Bankın təqdim etdiyi ECOM xidməti üçün olan yeni TXPG APİ kitabxanası. Bu kitabxana vasitəsi ilə saytınızda
KapitalBank üzərindən ödəniş qəbul edə bilərsiniz.

## Quraşdırılma

Paketi Composer üzərindən quraşdıra bilərsiniz. [Composer](http://getcomposer.org/).

Bunun üçün aşağıdakı komandanı terminalınıza daxil edin:

    composer require faganchalabizada/kapital-merchant-txpg

## İstifadə

Nümünə ödəniş yaradılma səhifəsi:

```php

use FaganChalabizada\KapitalMerchantTXPG\Merchant;
use FaganChalabizada\KapitalMerchantTXPG\OrderType;
use FaganChalabizada\KapitalMerchantTXPG\Exception\OrderException;

//İstifadə üçün ilk olaraq Merchant classını çağırmaq lazımdır.
$merchant = new Merchant();

try {

//ödəniş sorğusunu yaradırıq 
$create_order = $merchant->createOrder(OrderType::PURCHASE, 1, "AZN", "az", "https://SİZİN_ÖDƏNİŞİ_YOXLAMAQ_ÜÇÜN_OLAN_LİNKİNİZ.COM/checkPayment");

//qaytarılan $order_id dəyişkənini Məlumat Bazasında saxlamaq lazımdır. 
$order_id = $create_order->getId();

//$full_url dəyişkəni isə ödəniş səhifəsinin linkidir. İstifadəçını həmin linkə yönləndirmək lazımdır.
$full_url = $create_order->getFullRedirectUrl();

//yönləndiririk
header('Location: '.$full_url);

} catch (OrderException $e) {
    //burada ödəniş sorğusu yaradılan zaman hər hansı səhv baş verirsə əks olunacaq.
    echo $e->getMessage();
}
```

Ödənişdən sonra ödənişin statusunun yoxlanılma nümunəsi:


```php
use FaganChalabizada\KapitalMerchantTXPG\Merchant;
use FaganChalabizada\KapitalMerchantTXPG\PaymentStatuses;

$merchant = new Merchant();

$id = intval($_GET['ID']); //order ID

$res = $merchant->getOrderStatus($id);//Ödənişi yoxlayırıq

if ($res->getStatus() == PaymentStatuses::FULLY_PAID) {//Ödəniş uğurludur

    $order_id = $res->getId();//order ID. Məlumat bazasından tapmaq üçün
    $amount = $res->getAmount();//Ödənilən məbləğ təkrar yoxlanış üçün.

    echo "Ödəniş uğurludur.<br/>";
    echo "Order ID: " . $order_id . "<br/>";
    echo "Məbləğ: " . $amount . "<br/>";

} else {

    echo "Ödəniş uğursuzdur.<br/>";
    echo "Order ID: " . $order_id . "<br/>";
    echo "Məbləğ: " . $amount . "<br/>";

    echo "Ətraflı: " . PaymentStatuses::getDescription($res->getStatus());//Ödənişin hal hazırki statusu.
}
```


Bu formada test etdikdən sonra, real rejimə keçmək üçün, $merchant = new Merchant(); dan dərhal sonra aşağıdakı kodu əlavə etmək lazımdır:
```php
$merchant->setAuth("BANKIN_VERDIYI_USERNAME", "BANKIN_VERDIYI_PASSWORD");
```

## License

The Kapital Bank ECOM Merchant TXPG API is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).