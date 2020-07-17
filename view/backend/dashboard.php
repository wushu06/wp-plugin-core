<?php
$view = new \HmuCore\View();
$api = new \HmuCore\Request\Api();
?>
<div class="main main-wrapper">
    <h1>
        <?php esc_html_e('Dashboard', ''); ?>
    </h1>
    <div class="wrap">
        <?php  $view->dashboardView(); ?>
    </div>
    <div>
        <?php
            echo $api->get();
        ?>

    </div>
</div>



