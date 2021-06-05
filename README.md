# Timeline
cowitterを使って自家製タイムラインを作るよ。  
割と適当に作っているので、見る人からするとゴミみたいなコード書いてると思います。

# 使っているもの
## cowitter
https://github.com/mpyw/cowitter  
``` composer require mpyw/cowitter:^1.0 ```

## php
7.4.19

# Config

```php
<?php
class TwConfig{
/* Twitter API Config */
  static $API_Key = "Key";
  static $API_Secret_Key = "Key";
  static $API_Access_Token = "Token";
  static $API_Access_Token_Secret = "Token";

/* TimeLine Config*/
  static $count = 10; //タイムラインを表示する数

}
?>
```