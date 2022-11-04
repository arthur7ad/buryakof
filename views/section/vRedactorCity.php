<?php

use dosamigos\tinymce\TinyMce;
?>

<?=

$form->field($model, $name)->widget(TinyMce::className(), [
    'options' => ['rows' => 20, 'value' => $data,],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste image"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        'external_filemanager_path' => '/plugins/responsive_filemanager/filemanager/',
        'filemanager_title' => 'Responsive Filemanager',
        'external_plugins' => [
            //Иконка/кнопка загрузки файла в диалоге вставки изображения.
            'filemanager' => '/plugins/responsive_filemanager/filemanager/plugin.min.js',
            //Иконка/кнопка загрузки файла в панеле иснструментов.
            'responsivefilemanager' => '/plugins/responsive_filemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
//                'relative_urls' => false,
        ],
        'relative_urls' => false,
    ]
]);
?>

