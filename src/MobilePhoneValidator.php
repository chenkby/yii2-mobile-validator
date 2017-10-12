<?php
/**
 * @link https://github.com/chenkby/yii2-image-uploader
 * @copyright Copyright (c) 2017 Chen GuanQun
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace chenkby\mobileValidator;

use yii\validators\Validator;

/**
 * 手机号码验证
 * @author Chen GuanQun <99912250@qq.com>
 */
class MobilePhoneValidator extends Validator
{
    /**
     * @var string message
     */
    public $message = '不是有效的手机号码！';

    /**
     * @var string 服务器端正则表达式
     */
    public $serverRegex = "/^1[1234567890]\d{9}$/";

    /**
     * @var string 客户端正则表达式
     */
    public $clientRegex = "/^1[1234567890]{1}\d{9}$/";

    /**
     * @param \yii\base\Model $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if (!preg_match($this->serverRegex, $value)) {
            $this->addError($model, $attribute, $this->message);
        }
    }

    /**
     * @param mixed $value
     * @return array|null
     */
    public function validateValue($value)
    {
        if (!preg_match($this->serverRegex, $value)) {
            return [$this->message, []];
        } else {
            return null;
        }
    }

    /**
     * client validate
     * @param \yii\base\Model $model
     * @param string $attribute
     * @param \yii\web\View $view
     * @return string
     */
    public function clientValidateAttribute($model, $attribute, $view)
    {
        $message = json_encode($this->message);
        return <<<JS
        if (!{$this->clientRegex}.test(value)) {
            messages.push($message);
        }
JS;
    }
}