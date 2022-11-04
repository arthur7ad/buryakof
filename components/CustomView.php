<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\bootstrap\Html;
use Yii;

/**
 * Description of CustomView
 *
 * @author smol
 */
class CustomView extends \yii\web\View {

    public $content_seo_1, $content_seo_2, $page_id = false;

    public function beforeRender($viewFile, $params) {

//        Yii::error($viewFile);

        if (basename($viewFile) == '_head.php') {

            if (!$this->title) {

                $url = \app\modules\url\models\Url::findOne(['url' => Yii::$app->request->url]);

//                Yii::error($url->url);
//                Yii::error($url->title);
//                Yii::error($url->description);

                if ($url) {


                    $url->replaceSeo();
                    $this->title = $url->title;
                    $this->registerMetaTag(['name' => 'description', 'content' => $url->description]);
                }
            }
        }

        return parent::beforeRender($viewFile, $params);
    }

//    public $slideImage, $slideTitle, $slideDescription, $preemImage, $showMap, $contentBottom, $slideBtnText, $adv_template;
//    protected function renderHeadHtml() {
//        $lines = [];
//        if (!empty($this->metaTags)) {
//            $lines[] = implode("\n", $this->metaTags);
//        }
//
//        if (!empty($this->linkTags)) {
//            $lines[] = implode("\n", $this->linkTags);
//        }
//
//
//
//        return empty($lines) ? '' : implode("\n", $lines);
//    }
//
//    protected function renderBodyEndHtml($ajaxMode) {
//        $lines = [];
//
//        if (!empty($this->jsFiles[self::POS_HEAD])) {
//            $lines[] = implode("\n", $this->jsFiles[self::POS_HEAD]);
//        }
//        if (!empty($this->js[self::POS_HEAD])) {
//            $lines[] = Html::script(implode("\n", $this->js[self::POS_HEAD]), ['type' => 'text/javascript']);
//        }
//
//        if (!empty($this->jsFiles[self::POS_END])) {
//            $lines[] = implode("\n", $this->jsFiles[self::POS_END]);
//        }
//
//        if (!empty($this->cssFiles)) {
//            $lines[] = implode("\n", $this->cssFiles);
//        }
//        if (!empty($this->css)) {
//            $lines[] = implode("\n", $this->css);
//        }
//
//        if ($ajaxMode) {
//            $scripts = [];
//            if (!empty($this->js[self::POS_END])) {
//                $scripts[] = implode("\n", $this->js[self::POS_END]);
//            }
//            if (!empty($this->js[self::POS_READY])) {
//                $scripts[] = implode("\n", $this->js[self::POS_READY]);
//            }
//            if (!empty($this->js[self::POS_LOAD])) {
//                $scripts[] = implode("\n", $this->js[self::POS_LOAD]);
//            }
//            if (!empty($scripts)) {
//                $lines[] = Html::script(implode("\n", $scripts), ['type' => 'text/javascript']);
//            }
//        } else {
//            if (!empty($this->js[self::POS_END])) {
//                $lines[] = Html::script(implode("\n", $this->js[self::POS_END]), ['type' => 'text/javascript']);
//            }
//            if (!empty($this->js[self::POS_READY])) {
//                $js = "jQuery(function ($) {\n" . implode("\n", $this->js[self::POS_READY]) . "\n});";
//                $lines[] = Html::script($js, ['type' => 'text/javascript']);
//            }
//            if (!empty($this->js[self::POS_LOAD])) {
//                $js = "jQuery(window).on('load', function () {\n" . implode("\n", $this->js[self::POS_LOAD]) . "\n});";
//                $lines[] = Html::script($js, ['type' => 'text/javascript']);
//            }
//        }
//
//        return empty($lines) ? '' : implode("\n", $lines);
//    }
}
