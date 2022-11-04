<?php
$this->title = 'Спасибо за ваш отзыв, но появится на сайте после проверки';
?>

<h1><?= $this->title ?></h1>
<p>Вы автоматечески вернётесь в раздел «Отзывы» через <span id="countdown">6</span> секунды</p>

<!-- JavaScript part -->
<script type="text/javascript">

    // Total seconds to wait
    var seconds = 5;

    function countdown() {
        seconds = seconds - 1;
        if (seconds < 0) {
            // Chnage your redirection link here
            window.location = "/reviews";
        } else {
            // Update remaining seconds
            document.getElementById("countdown").innerHTML = seconds;
            // Count down using javascript
            window.setTimeout("countdown()", 1000);
        }
    }

    // Run countdown function
    countdown();

</script>