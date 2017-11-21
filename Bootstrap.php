<?php

namespace dersonsena\cadimowebgii;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        if ($app->hasModule('gii')) {
            if (!isset($app->getModule('gii')->generators['cadimoweb-gii'])) {
                $app->getModule('gii')->generators['cadimoweb-gii-model'] = 'dersonsena\cadimowebgii\model\Generator';
                $app->getModule('gii')->generators['cadimoweb-gii-crud']['class'] = 'dersonsena\cadimowebgii\crud\Generator';
            }
        }
    }
}
