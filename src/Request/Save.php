<?php
namespace HmuCore\Controller;
use HmuCore\Model\Egift;

/**
 * Class Save
 * @package HmuCore\Controller
 */
class Save extends Egift
{

     /**
     * @return false|int|string
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return int
     * @throHmuCore \Exception
     */
    public function execute($data = [])
    {
        if(!empty($data)){
            return $this->insert($data);
        }
        if(empty($_POST) || !isset($_POST['save'])) {
            throw new \Exception('Bad request');
        }
        $data = array(
            'email' => $_POST['email'],
            'date' => $_POST['date'], //date('Y-m-d', strtotime('2012-08-14')),
            'message' => $_POST['message'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'barcode' => $_POST['barcode'],
            'pin' => $_POST['pin']
        );

        return $this->insert($data);
    }
}