<?php
namespace HmuCore\Options;

use NDSAPADMIN\Classes\Options;

class Index implements OptionsInterface
{
    /**
     * @var array
     */
    public $options = array(
        'dashboard' => array(
            OptionsInterface::DASHBOARD_OPTION => [
                OptionsInterface::USERNAME,
                OptionsInterface::PASSWORD
            ]
        ),
        'sub' => array(
            OptionsInterface::SUB_OPTION => [
                OptionsInterface::NAME,
                OptionsInterface::TIME
            ]
        )

    );
    /**
     * Options constructor.
     */
    public  function __construct()
    {
        foreach ($this->options as $key => $option){
            $this->_initOptions($option);
        }

    }

    /**
     * @param $optionArray
     */
    protected function _initOptions($optionArray)
    {
        foreach ($optionArray as $key => $options ){

            foreach ($options as $option){
                $this->$option = $this->getOption($key, $option);
            }
            $this->$key = $key;
        }
    }

    /**
     * @param $option
     * @param $name
     * @return string
     */
    public function getOption($option, $name)
    {
        $g_option = get_option($option);
        return !empty($g_option) && array_key_exists($name,$g_option)  ? $g_option[$name] : '';

    }
}