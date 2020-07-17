<?php
namespace HmuCore\Setup;

/**
 * Class Install
 * @package HmuCore\Setup
 */
class Install implements \HmuCore\Setup\ActivitiesInterface
{

    /**
     * Install constructor.
     * @param $file
     */
    public function __construct($file)
    {
        register_activation_hook($file, array($this, 'activitiesTable'));
    }

    /**
     * @return \wpdb::query
     */
    public function activitiesTable()
    {
        global $table_prefix, $wpdb;

        $table_name = ActivitiesInterface::TABLE;
        $wp_track_table = $table_prefix . "$table_name ";

        #Check to see if the table exists already, if not, then create it
        if ($wpdb->get_var("show tables like '$wp_track_table'") != $wp_track_table) {
            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE $table_name (
            ActivitiesInterface::ID mediumint(9) NOT NULL AUTO_INCREMENT,
            ActivitiesInterface::TIME datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            ActivitiesInterface::NAME tinytext NOT NULL,           
            ActivitiesInterface::TYPE varchar(55) DEFAULT '' NOT NULL,
            PRIMARY KEY  (ActivitiesInterface::ID)
            ) $charset_collate";

            $wpdb->query($sql);
        }
    }
}
