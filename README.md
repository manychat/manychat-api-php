# ManyChat API PHP library

## Installation

To install the library using [Composer](https://getcomposer.org/) run this command in your command line:

    composer require manychat/manychat-api

or edit your project's `composer.json` file to require `manychat/manychat-api`:

    {
        ...
        "require": {
            ...
            "manychat/manychat-api": "*"
        }
    }

and run `composer update` in your command line.

## Usage

After installing the library, you need to get the ManyChat API token in the API tab of the settings of your page at manychat.com.
Here are some examples of the library usage with `1234567890123456:1234567890ABCDEFGHIJKLMNOPQRSTUV` API token:

As an instance:

    use ManyChat\ManyChat;
    
    $api = new ManyChat('1234567890123456:1234567890ABCDEFGHIJKLMNOPQRSTUV');
    $pageInfo = $api->fb->page->getInfo();

As a singleton:

    use ManyChat\ManyChat;
    
    ManyChat::fbInit('1234567890123456:1234567890ABCDEFGHIJKLMNOPQRSTUV');
    $pageInfo = ManyChat::fbApi()->fb->page->getInfo();

## Documentation

List of available ManyChat API methods you can get at the [ManyChat API homepage](https://api.manychat.com/).

List of implemented in this library methods you can get at the [ManyChat API PHP library documentation](https://manychat.github.io/manychat-api-php):
* [ManyChat's API /fb/ namespace wrapper](https://manychat.github.io/manychat-api-php/namespace-ManyChat.Structure.Fb.html);
* [ManyChat's API /fb/page/ namespace wrapper](https://manychat.github.io/manychat-api-php/class-ManyChat.Structure.Fb.Page.html);
* [ManyChat's API /fb/sending/ namespace wrapper](https://manychat.github.io/manychat-api-php/class-ManyChat.Structure.Fb.Sending.html);
* [ManyChat's API /fb/subscriber/ namespace wrapper](https://manychat.github.io/manychat-api-php/class-ManyChat.Structure.Fb.Subscriber.html).
