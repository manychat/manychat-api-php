# ManyChat API PHP library

## Usage

First of all, you need to get the ManyChat API token in the API tab of the settings of your page at manychat.com.
Here are some examples of the library usage with `1234567890123456:1234567890ABCDEFGHIJKLMNOPQRSTUV` API token:

As an instance:

    use ManyChat\ManyChat;
    
    $api = new ManyChat('1234567890123456:1234567890ABCDEFGHIJKLMNOPQRSTUV');
    $pageInfo = $api->fb->page->getInfo();

As a singleton:

    use ManyChat\ManyChat;
    
    ManyChat::fbInit('1234567890123456:1234567890ABCDEFGHIJKLMNOPQRSTUV');
    $pageInfo = ManyChat::fbApi()->fb->page->getInfo();


