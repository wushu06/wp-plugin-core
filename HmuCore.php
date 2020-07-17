<?php
/*
Plugin Name: Hmu Core
Description: Hmu Core
Author: Nour
Version: 1.0
*/

require "vendor/autoload.php";
use HmuCore\Setup\Install;
use HmuCore\Menu;
use HmuCore\Enqueue;
use HmuCore\Request\Api;
use HmuCore\Console\Command;

if (!class_exists('HmuCore')) {
    /**
     * Class Init
     */
    class HmuCore
    {
        /**
         * Init constructor.
         */
        public function __construct()
        {
            $this->initPaths();
            $this->initInstall();
            $this->initMenu();
            $this->initEnqueue();
            $this->initApi();
            $this->initCommand();
        }

        /**
         * @return void
         */
        protected function initPaths()
        {
            defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
            define('HmuCore_PATH', realpath(dirname(__FILE__)));
            define('HmuCore_VIEW', realpath(dirname(__FILE__)) . '/view');
            define('HmuCore_URL', plugin_dir_url(__FILE__));
            define('HmuCore_ASSETS', HmuCore_URL. '/view/backend/assets');
            define('HmuCore_ASSETS_FRONT', HmuCore_URL . '/view/frontend/assets');
        }

        /**
         * @return void | Install
         */
        protected function initInstall()
        {
            if (!class_exists('Install')) {
                new Install(__FILE__);
            }
        }

        /**
         * @return Menu | void
         */
        protected function initMenu()
        {
            if (!class_exists('Menu')) {
                new Menu();
            }
        }

        /**
         * @return Enqueue | void
         */
        protected function initEnqueue()
        {
            if (!class_exists('Enqueue')) {
                new Enqueue();
            }
        }

        protected function initApi()
        {
            if (!class_exists('Api')) {
                new Api();
            }
        }

        protected function initCommand()
        {
            if (!class_exists('Command')) {

                if (  ( defined( 'WP_CLI' ) && WP_CLI ) ) {
                    $console = new Command();
                    WP_CLI::add_command('hmu-core', $console);
                }
            }
        }
    }

    new HmuCore();
}
