<?php
/**
 * Norsys
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Norsys.com license that is
 * available through the world-wide-web at this URL:
 * https://www.Norsys.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Norsys
 * @package     Norsys_BannerSlider
 * @copyright   Copyright (c) Norsys (https://www.Norsys.com/)
 * @license     https://www.Norsys.com/LICENSE.txt
 */

namespace Norsys\BannerSlider\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Class Banner
 * @package Norsys\BannerSlider\Block\Adminhtml
 */
class Banner extends Container
{
    /**
     * constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_banner';
        $this->_blockGroup = 'Norsys_BannerSlider';
        $this->_headerText = __('Banners');
        $this->_addButtonLabel = __('Create New Banner');

        parent::_construct();
    }
}
