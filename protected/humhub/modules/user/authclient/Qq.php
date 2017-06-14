<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\user\authclient;

/**
 * 
 */
class Qq extends \yii\authclient\clients\QqOAuth
{

    /**
     * @inheritdoc
     */
    protected function normalizeUserAttributes($attributes)
    {
        return parent::normalizeUserAttributes($attributes);
    }

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'cssIcon' => 'fa fa-qq',
            'buttonBackgroundColor' => '#4078C0',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'username' => 'login',
            'firstname' => function ($attributes) {
                if (!isset($attributes['nickname'])) {
                    return '';
                }
                $parts = mb_split(' ', $attributes['nickname'], 2);
                if (isset($parts[0])) {
                    return $parts[0];
                }
                return '';
            },
            'lastname' => function ($attributes) {
                if (!isset($attributes['nickname'])) {
                    return '';
                }
                $parts = mb_split(' ', $attributes['nickname'], 2);
                if (isset($parts[1])) {
                    return $parts[1];
                }
                return '';
            },
        ];
    }

}
