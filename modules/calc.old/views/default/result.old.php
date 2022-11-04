<?php ?>

<div class="result_window" id="result_window">
    <p>Данные расчета:</p>

    <hr>

    <table class="table table-striped">
        <tbody><tr>
                <td>
                    Тип ТС:
                </td>
                <td>
                    <span id="TSreuslt"><?= $model->_type_tc[$model->type_tc] ?></span>
                </td>
            </tr>

            <tr>
                <td>
                    Тип загрузки:
                </td>
                <td>
                    <span id="TZreuslt"><?= $model->_type_load[$model->type_load] ?></span>
                </td>
            </tr>

            <tr>
                <td>
                    Тоннаж:
                </td>
                <td>
                    <span id="TNreuslt"><?= $model->_tonnazh[$model->tonnazh] ?></span>
                </td>
            </tr>

            <tr>
                <td>
                    Примечание:
                </td>
                <td>
                    <span id="prresult"><?= $model->_prim[$model->prim] ?></span>
                </td>
            </tr>

            <tr class="hidden">
                <td>
                    Отправление:
                </td>
                <td>
                    <span id="fromresult"><?= $model->from ?></span>
                </td>
            </tr>

            <tr class="hidden">
                <td>
                    Прибытие:
                </td>
                <td>
                    <span id="toresult"><?= $model->to ?></span>
                </td>
            </tr>

        </tbody></table>

    <hr>

    <table>
        <tbody><tr>
                <td>
                    Расстояние:
                </td>
                <td>
                    <span id="DistResult"><?= $model->rast ?> км</span>
                </td>
            </tr>
        </tbody></table>

    <hr>

    <table>
        <tbody><tr>
                <td>
                    Итого:
                </td>
                <td>
                    <span id="CenaResult">
                        <?= Yii::$app->formatter->asCurrency($model->summ) ?>
                    </span>
                </td>
            </tr>
        </tbody></table>

</div>