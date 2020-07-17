<?php
namespace HmuCore;
use HmuCore\Options\OptionsInterface;
/**
 * Class Menu
 * @package HmuCore\Backend
 */
class Menu extends Helper implements OptionsInterface
{
    /**
     * Menu constructor.
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'HmuCoreMenuPage'));
    }

    /**
     * @inheritDoc
     */
    public function HmuCoreMenuPage()
    {
        add_menu_page(
            OptionsInterface::MENU_TITLE,
            OptionsInterface::MENU_TITLE,
            'manage_options',
            OptionsInterface::MENU_SLUG,
            array($this, 'HmuCoreSettings')
        );

        // router
        add_submenu_page(
            OptionsInterface::MENU_SLUG,
            OptionsInterface::MENU_SUB_TITLE,
            OptionsInterface::MENU_SUB_TITLE,
            'manage_options',
            OptionsInterface::MENU_SUB_SLUG,
            array($this, 'HmuCoreSub')
        );

        //call register settings function
        add_action( 'admin_init', array($this,'wsMenuSettings') );
    }

    /**
     * @inheritDoc
     */
    public function wsMenuSettings()
    {
        register_setting( OptionsInterface::DASHBOARD_OPTION_GROUP, OptionsInterface::DASHBOARD_OPTION );
        register_setting( OptionsInterface::SUB_OPTION_GROUP, OptionsInterface::SUB_OPTION );
    }

    /**
     * @return string|void
     */
    public function hmuCoreSub()
    {
        require_once(HmuCore_VIEW . '/backend/sub.php');

    }

    /**
     * @return string|void
     */
    public function HmuCoreSettings()
    {
        require_once(HmuCore_VIEW . '/backend/dashboard.php');
    }

}