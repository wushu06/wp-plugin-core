<?php
namespace HmuCore;

/**
 * Class View
 * @package HmuCore
 */
class View extends Options\Index
{
    /**
     *
     */
    public function dashboardView()
    {
        ?>
        <form method="post" action="options.php">
            <?php settings_fields(self::DASHBOARD_OPTION_GROUP); ?>
            <?php do_settings_sections(self::DASHBOARD_OPTION_GROUP); ?>
            <h2>General</h2>
            <table class="form-table">
                <?php
                foreach ($this->options['dashboard'] as $key=>$option){
                    $this->generateInput($key, $option[0]);
                    $this->generateInput($key, $option[1], 'password');
                } ?>
            </table>
            <?php submit_button(); ?>
        </form>
        <?php


    }

    /**
     *
     */
    public function subView()
    {
        ?>
         <form method="post" action="options.php">
            <?php settings_fields(self::SUB_OPTION_GROUP); ?>
            <?php do_settings_sections(self::SUB_OPTION_GROUP); ?>
            <h2>General</h2>
             <table class="form-table">
                    <?php
                foreach ($this->options['sub'] as $key=>$option){
                    $this->generateInput($key, $option[0]);
                    $this->generateSelector($key, $option[1]);
                } ?>
             </table>
             <?php submit_button(); ?>
         </form>
        <?php

        }

    /**
     * @param $key
     * @param $option
     * @param $type
     */
    public function generateInput($key, $option, $type = 'text')
    {
        ?>
        <tr valign="top">
            <th scope="row"><?= _e(strtoupper($option)) ?></th>
            <td>
                <input
                    type="<?= $type ?>"
                    name="<?= $key ?>[<?= $option ?>]"
                    value="<?= esc_attr(  $this->$option  ); ?>"
                />
            </td>
        </tr>
        <?php
    }

    /**
     * @param $key
     * @param $option
     */
    public function generateSelector($key, $option)
    {
        ?>
        <tr valign="top">
            <th scope="row">Cron schedule</th>
            <td>
                <select name="<?= $key ?>[<?= $option ?>]">
                    <option value="<?= esc_attr(  $this->$option  ); ?>"><?php echo esc_attr(  $this->$option   ?: 'Pick option'  ); ?></option>
                    <option value="every_one_minute">1 min</option>
                    <option value="every_two_minutes">2 min</option>
                    <option value="every_five_minutes">5 min</option>
                    <option value="every_ten_minutes">10 min</option>
                    <option value="every_fifteen_minutes">15 min</option>
                    <option value="every_thirty_minutes">30 min</option>
                    <option value="hourly">hourly</option>
                    <option value="twicedaily">twicedaily</option>
                    <option value="daily">Daily</option>
                </select>
            </td>
        </tr>
        <?php
    }
}