<?php

use yii\db\Migration;

/**
 * Class m201216_064944_insert_counters_in_indo
 */
class m201216_064944_insert_counters_in_indo extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->insert('info', [
            'name' => 'counter_landing',
            'label' => 'Счётчики лэндинга',
            'value' => '<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(70519099, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/70519099" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        echo "m201216_064944_insert_counters_in_indo cannot be reverted.\n";

        return false;
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m201216_064944_insert_counters_in_indo cannot be reverted.\n";

      return false;
      }
     */
}
