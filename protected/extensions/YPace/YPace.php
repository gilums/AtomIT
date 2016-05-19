<?php

/*
 * YPace - Automatic web page progress ba (Pace) for Yii Framework
 * 
 * author       Dida Nurwanda
 * blog         didanurwanda.blogspot.com
 * email        didanurwanda@gmail.com
 */

class YPace extends CWidget {

    public $theme = 'other';

    public function run() {
        $baseUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/assets', false, 1, YII_DEBUG);
        $pace = YII_DEBUG ? '/pace.js' : '/pace.min.js';
        Yii::app()->clientScript->registerCssFile($baseUrl . '/themes/pace-theme-' . $this->theme . '.css');
        Yii::app()->clientScript->registerScriptFile($baseUrl . $pace, CClientScript::POS_HEAD);
    }

}