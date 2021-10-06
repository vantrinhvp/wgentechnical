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

namespace Norsys\BannerSlider\Block\Adminhtml\Config\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

/**
 * Class Responsive
 * @package Norsys\BannerSlider\Block\Adminhtml\Config\Field
 */
class Responsive extends AbstractFieldArray
{
    /**
     * @inheritdoc
     */
    protected function _prepareToRender()
    {
        $this->addColumn(
            'size',
            ['label' => __('Screen size from'), 'renderer' => false, 'class' => 'required-entry validate-digits']
        );
        $this->addColumn(
            'items',
            ['label' => __('Number of items'), 'renderer' => false, 'class' => 'required-entry validate-digits']
        );

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
}
