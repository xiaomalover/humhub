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
class Sina extends \yii\authclient\clients\SinaOAuth
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
            'cssIcon' => 'fa fa-weibo',
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
                if (!isset($attributes['name'])) {
                    return '';
                }
                $parts = mb_split(' ', $attributes['name'], 2);
                if (isset($parts[0])) {
                    return $parts[0];
                }
                return '';
            },
            'lastname' => function ($attributes) {
                if (!isset($attributes['name'])) {
                    return '';
                }
                $parts = mb_split(' ', $attributes['name'], 2);
                if (isset($parts[1])) {
                    return $parts[1];
                }
                return '';
            },
        ];
    }

}
