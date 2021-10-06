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

use Magento\Backend\Block\Context;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;
use Norsys\BannerSlider\Model\Config\Source\Image as ImageModel;

/**
 * Class GridImage
 * @package Norsys\BannerSlider\Block\Adminhtml\Banner\Edit\Tab\Render
 */
class GridImage extends AbstractRenderer
{
    /**
     * @var ImageModel
     */
    protected $imageModel;

    /**
     * GridImage constructor.
     *
     * @param Context $context
     * @param ImageModel $imageModel
     * @param array $data
     */
    public function __construct(
        Context $context,
        ImageModel $imageModel,
        array $data = []
    ) {
        $this->imageModel = $imageModel;

        parent::__construct($context, $data);
    }

    /**
     * Render Banner Image
     *
     * @param DataObject $row
     *
     * @return string
     */
    public function render(DataObject $row)
    {
        if ($row->getData($this->getColumn()->getIndex())) {
            $imageUrl = $this->imageModel->getBaseUrl() . $row->getData($this->getColumn()->getIndex());

            return '<img src="' . $imageUrl . '" width=\'150\' class="admin__control-thumbnail"/>';
        }

        return '';
    }
}
