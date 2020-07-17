<?php
$view = new \HmuCore\View();

?>
<div class="main main-wrapper">
    <h1>
        <?php esc_html_e('Sub', ''); ?>
    </h1>
    <div class="wrap">
        <?php  $view->subView(); ?>
    </div>
</div>



