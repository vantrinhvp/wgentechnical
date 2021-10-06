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

namespace Norsys\BannerSlider\Controller\Adminhtml\Slider;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Layout;
use Magento\Framework\View\Result\LayoutFactory;
use Norsys\BannerSlider\Block\Adminhtml\Slider\Edit\Tab\Banner;
use Norsys\BannerSlider\Controller\Adminhtml\Slider;
use Norsys\BannerSlider\Model\SliderFactory;

/**
 * Class Banners
 * @package Norsys\BannerSlider\Controller\Adminhtml\Slider
 */
class Banners extends Slider
{
    /**
     * Result layout factory
     *
     * @var LayoutFactory
     */
    protected $resultLayoutFactory;

    /**
     * Banners constructor.
     *
     * @param LayoutFactory $resultLayoutFactory
     * @param SliderFactory $bannerFactory
     * @param Registry $registry
     * @param Context $context
     */
    public function __construct(
        LayoutFactory $resultLayoutFactory,
        SliderFactory $bannerFactory,
        Registry $registry,
        Context $context
    ) {
        $this->resultLayoutFactory = $resultLayoutFactory;

        parent::__construct($bannerFactory, $registry, $context);
    }

    /**
     * @return Layout
     */
    public function execute()
    {
        $this->initSlider();
        $resultLayout = $this->resultLayoutFactory->create();
        /** @var Banner $bannersBlock */
        $bannersBlock = $resultLayout->getLayout()->getBlock('slider.edit.tab.banner');
        if ($bannersBlock) {
            $bannersBlock->setSliderBanners($this->getRequest()->getPost('slider_banners', null));
        }

        return $resultLayout;
    }
}
