# Telebot

Build a Telegram Bot.

<br>

## Clone from GitHub
```bash
git clone https://github.com/MSFPT/Telebot
```

<br>

## Get Started

```php
<?php
  
  require('Telebot/index.php');

  $TeleBot = new Telebot('TOKEN');

  $TeleBot->Bot(Method:String, Params:array));

?>
```

<br>

## Example

```php
<?php
  
  require('Telebot/index.php');
  
  $TeleBot = new Telebot('TOKEN');

  $Content = file_get_contents('php://input');

  $Data = json_decode($content, true);

  $ChatID = $data['message']['chat']['id'];
  $Name = $data['message']['chat']['first_name'];

  $inline_btn = array('inline_keyboard'=>array(
    array(
      array(
        'text'=> 'MSFPT' ,
        'callback_data'=> 'test_callback'
      )
    ),
    array(
      array(
        'text'=> 'Telegram' ,
        'url'=> 'https://t.me/+nF_ylRxXRKFiMDc0'
      ) ,
      array(
        'text'=> 'GitHub' ,
        'url'=> 'https://github.com/msfpt'
      )
    )
  ));

  $keyboard_btn = array(
    'resize_keyboard'=> true ,
    'keyboard'=> array(
        array(
          array(
            'text'=> ' Share Phone Number ' ,
            'request_contact'=>true
          )
        ) ,
        array(' Demo_1 ',' Demo_2 ')
  ));

  $TeleBot->Bot('sendMessage', array(
    'chat_id'=> $ChatID ,
    'text'=> "Hello [".$Name."](tg://user?id=".$ChatID.")" ,
    'parse_mode'=> 'Markdown' ,
    'reply_markup'=> $inline_btn
    )
  );

  $TeleBot->Bot('sendMessage', array(
    'chat_id'=> $ChatID ,
    'text'=> "Content : \n $Content" ,
    'reply_markup'=> $keyboard_btn
    )
  );

?>
```

<br>

[Telegram Bot API](https://core.telegram.org/bots/api)