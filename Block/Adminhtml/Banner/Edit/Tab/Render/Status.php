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

namespace Norsys\BannerSlider\Block\Adminhtml\Banner\Edit\Tab\Render;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;

/**
 * Class Status
 * @package Norsys\BannerSlider\Block\Adminhtml\Banner\Edit\Tab\Render
 */
class Status extends AbstractRenderer
{
    /**
     * Render Banner status
     *
     * @param DataObject $row
     *
     * @return string
     */
    public function render(DataObject $row)
    {
        $status = $row->getData($this->getColumn()->getIndex());

        return $status === '1' ? 'Enable' : 'Disable';
    }
}
