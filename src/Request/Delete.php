<?php
namespace HmuCore\Controller;
use HmuCore\Model\Egift;

/**
 * Class Delete
 * @package HmuCore\Controller
 */
class Delete extends Egift
{


    /**
     * @return false|int|string
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * @return false|int
     * @throHmuCore \Exception
     */
    public function execute()
    {
        if(!isset($_POST['delete'])){
            throw new \Exception('Bad request');
        };
        return $this->remove((int)$_POST['id']);

    }
}