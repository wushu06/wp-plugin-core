<?php
namespace HmuCore\Options;

/**
 * Interface OptionsInterface
 * @package HmuCore
 */
interface OptionsInterface
{
    /**
     *
     */
    const DASHBOARD_OPTION = 'hmu_dashboard';
    /**
     *
     */
    const DASHBOARD_OPTION_GROUP = self::DASHBOARD_OPTION.'_group';
    /**
     *
     */
    const SUB_OPTION = 'hmu_sub';
    /**
     *
     */
    const SUB_OPTION_GROUP = self::SUB_OPTION.'_group';
    /**
     *
     */
    const MENU_SLUG = 'hmu-core';
    /**
     *
     */
    const MENU_TITLE = 'Hmu Core';
    /**
     *
     */
    const MENU_SUB_SLUG = 'hmu-core-sub';
    /**
     *
     */
    const MENU_SUB_TITLE = 'Hmu Sub';

    /**
     *
     */
    const USERNAME = 'username';
    /**
     *
     */
    const PASSWORD = 'password';
    /**
     *
     */
    const NAME = 'name';
    /**
     *
     */
    const TIME = 'time';
}