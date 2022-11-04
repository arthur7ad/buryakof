<?php

namespace app\modules\menu\models;

use app\modules\article\models\Article;
use Yii;
use yii\bootstrap\Html;
use app\modules\category\models\Category;
use app\modules\page\models\Page;

class Menu extends \app\models\Menu {

    public $type = [
        1 => 'Верхнее меню',
        2 => 'Меню в футере 1',
        3 => 'Меню в футере 2',
    ];

    public static function getType() {

        $model = new self;
        return $model->type;
    }

    public static function getTopMenu() {

        $model = self::find()->where([
                            'is_enable' => 1,
                            'parent_id' => [NULL, 0],
                            'menu_type' => 1,
                        ])
//                ->andWhere()
                        ->orderBy(['order' => SORT_DESC])->all();


        $result = [];

        foreach ($model as $item):

            $items = [];

            $parents = self::find()->where([
                                'is_enable' => 1,
                                'parent_id' => $item->id,
                            ])
                            ->orderBy(['order' => SORT_DESC])->all();
            if ($parents)
                foreach ($parents as $par)
                    if (Yii::$app->request->url == $par->url)
                        $items[] = ['label' => $par->name, 'url' => 'javascript:void(0);', 'options' => ['class' => 'active']];
                    else
                        $items[] = ['label' => $par->name, 'url' => $par->url ? $par->url : 'javascript:void(0);'];

            if (Yii::$app->request->url == $item->url)
                $result[] = [
                    'label' => $item->name, 'url' => 'javascript:void(0);', 'options' => ['class' => 'active',],
                    'items' => $items,
                ];
            else
                $result[] = [
                    'label' => $item->name, 'url' => $item->url ? ['/' . $item->url] : 'javascript:void(0);', 'items' => $items,
                ];

        endforeach;

//        Yii::error($result);

        return $result;
    }

    public static function getMainMenu() {

        $model = Page::find()->where([
                            'is_enable' => 1,
                            'parent_id' => 0,
                        ])
//                ->andWhere()
                        ->orderBy(['order' => SORT_DESC])->all();


        $result = [];

        foreach ($model as $item):

            if ($item->id == 1)
                continue;

            $items = [];

            $parents = Page::find()->where([
                                'is_enable' => 1,
                                'parent_id' => $item->id,
                            ])
                            ->orderBy(['order' => SORT_DESC])->all();
            if ($parents)
                foreach ($parents as $par)
                    if (Yii::$app->request->url == $par->url->url)
                        $items[] = ['label' => $par->header, 'url' => $par->url->url, 'options' => ['class' => 'active',]];
                    else
                        $items[] = ['label' => $par->header, 'url' => $par->url->url];

            if (Yii::$app->request->url == $item->url->url)
                $result[] = [
                    'label' => $item->header, 'url' => 'javascript:void(0);', 'options' => ['class' => 'active',],
                    'items' => $items,
                ];
            else
                $result[] = [
                    'label' => $item->header, 'url' => ['/' . $item->url->url], 'items' => $items,
                ];

        endforeach;

//        Yii::error($result);

        return $result;
    }

    /**
     * TODO refactor then
     * @param $id
     * @return string
     */
    public static function getFooterItems($id) {

        $model = self::find()->where(['menu_type' => $id, 'is_enable' => 1])
                        ->orderBy(['order' => SORT_DESC])->all();

        $result = '';

        foreach ($model as $item):

            if($item->name == 'Статьи')
            {
               $count = Article::find()
                    ->andWhere('city LIKE "'.Yii::$app->city->id.'" OR  city LIKE "'.Yii::$app->city->id.',%" OR city LIKE "%,'.Yii::$app->city->id . '" OR city LIKE "%,'.Yii::$app->city->id.',%"')
                    ->count();

               if($count) $result .= Html::tag('li', Html::a($item->name, [$item->url]));
            }else{
                $result .= Html::tag('li', Html::a($item->name, [$item->url]));
            }

        endforeach;

        return $result;
    }

    public function getParent() {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    public function getChilds() {

        return self::findAll([
                    'parent_id' => $this->id,
                    'is_enable' => 1,
        ]);
    }

}
