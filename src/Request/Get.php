<?php
namespace HmuCore\Controller;
use Leafo\ScssPhp\Block;
use HmuCore\Model\Egift;
use HmuCore\Block\Main;
/**
 * Class Save
 * @package HmuCore\Controller
 */
class Get extends Egift
{

    /**
     * @return false|int|string
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return array
     */
    public function execute()
    {
        $block = new Main(new Request());
        $post_per_page = $block::POSTS_PER_PAGE;
        $page = $block->getCurrentPage();
        $offset = ( $page * $post_per_page ) - $post_per_page;
        return $this->getAll($post_per_page, $offset);
    }
}