<?php
namespace HmuCore\Controller;
use HmuCore\Model\Egift;

/**
 * Class Request
 * @package HmuCore\Controller
 */
class Request extends Egift
{
    /**
     * @var Save
     */
    private $save;
    /**
     * @var Delete
     */
    private $delete;

    /**
     * @var
     */
    private $_msg;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        parent::__construct();
        add_action('init', function () {
            if( ! session_id() ) {
                session_start();
            }
        });
    }


    /**
     * @return string|void|null
     */
    public function method()
    {
        switch ($_SERVER['REQUEST_METHOD']){
            case ('POST'):
                if(array_key_exists('save', $_POST)){
                    return $this->save();
                    break;
                }
                return $this->delete();
                break;
            case ('GET'):
                return $this->get();
                break;
            default:
                return $this->get();
        }

    }

    public function get()
    {
        return (new Get())->execute();
    }

    /**
     * @throHmuCore \Exception
     */
    public function save()
    {
        $save = (new Save())->execute();
        $this->_msg = $save ? 'item has been saved successfully' : 'Something went wrong!';
        return $this->redirect();
    }

    /**
     * @throHmuCore \Exception
     */
    public function delete()
    {
        $delete = (new Delete())->execute();
        $this->_msg = $delete ? 'item has been deleted successfully' : 'Something went wrong!';
        return $this->redirect();
    }

    /**
     *
     */
    public function redirect()
    {
        $this->message();
        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


    /**
     * @return mixed
     */
    protected function message()
    {
        return $_SESSION['message'] = $this->_msg;
    }

}