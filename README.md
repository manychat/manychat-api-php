# ManyChat API PHP library

## Usage

* As an object:



    use ManyChat\ManyChat;
    
    $api = new ManyChat('1234567890123456:1234567890ABCDEFGHIJKLMNOPQRSTUV');
    $pageInfo = $api->fb->page->getInfo();



* As a singleton:



    use ManyChat\MC;
    
    MC::init('1234567890123456:1234567890ABCDEFGHIJKLMNOPQRSTUV');
    $pageInfo = MC::api()->fb->page->getInfo();


