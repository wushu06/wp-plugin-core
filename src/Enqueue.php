<?php
namespace HmuCore;
use HmuCore\Options\OptionsInterface;
/**
 * Class Enqueue
 * @package HmuCore\Backend
 */
class Enqueue extends Helper  implements OptionsInterface
{

    protected $optionsInterface;

    /**
     * Enqueue constructor.
     */
    public function __construct()
    {
         add_action('admin_enqueue_scripts',  array($this, 'HmuCoreEnqueueStyle'));
    }

    /**
     * @param $hook
     */
    public function HmuCoreEnqueueStyle($hook){

        wp_enqueue_script( OptionsInterface::MENU_SLUG, HmuCore_ASSETS. "/app.js", false );
        if ($hook != 'toplevel_page_'.OptionsInterface::MENU_SLUG &&
            $hook != OptionsInterface::MENU_SLUG.'_page_'.OptionsInterface::MENU_SUB_SLUG) {
            return;
        }
        wp_enqueue_style( 'font',   "https://fonts.googleapis.com/css?family=Libre+Barcode+128&display=swap");
        wp_enqueue_style( OptionsInterface::MENU_SLUG,  HmuCore_ASSETS . "/style.css");
    }

}