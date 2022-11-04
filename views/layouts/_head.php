<?php

use yii\bootstrap\Html;
?>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="120x120" href="/favicon-120x120.png">
    <script type="application/ld+json">
        {
            "@context": "https: //schema.org",
            "@type": "Organization",
            "url": "https: //buryakof.ru/",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "<?= strip_tags(Yii::$app->info::get('meta_tel')); ?>",
                "contactType": "Контактный номер"}],
            "logo": "https: //buryakof.ru/image/logo.png"}
    </script>
    <?php echo $model->render('_header_meta') ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($model->title) ?></title>
    <link href="/css/site.css?2021" rel="stylesheet">
<?php $model->head() ?>
</head>
