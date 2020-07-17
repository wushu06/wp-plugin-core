<?php
namespace HmuCore\Console;
use WP_CLI;
use WP_CLI_Command;

/**
 * Class Command
 * @package HmuCore\Console
 */
class Command
{
    /**
     * Command constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        WP_CLI::success('starting...');
    }

    /**
     *
     */
    public function post()
    {
        WP_CLI::success('post data');
    }
}

