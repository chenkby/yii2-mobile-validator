# yii2-mobile-validator
Yii2 手机号码验证器

## 安装

添加到你的composer.json文件

```
"chenkby/yii2-mobile-validator": "*"
```
   或  
```
composer require "chenkby/yii2-mobile-validator:*"
```

## 使用

在model的rule中：
```php
    public function rules()
    {
        ...
        ['mobile', \chenkby\mobileValidator\MobilePhoneValidator::className()],
        ...
    }
```

## 属性

**注意：本验证器默认使用宽松正则(/^1[1234567890]\d{9}$/)**  

$serviceRegex: 服务器端正则表达式  

$clientRegex: 客户端正则表达式

```php
    public function rules()
    {
        ...
        ['mobile', \chenkby\mobileValidator\MobilePhoneValidator::className(), 'serverRegex' => "/^1[1234567890]\d{9}$/", 'clientRegex' => "/^1[1234567890]\d{9}$/"],
        ...
    }
```