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

namespace Norsys\BannerSlider\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Norsys\BannerSlider\Model\SliderFactory;

/**
 * Class Slider
 * @package Norsys\BannerSlider\Controller\Adminhtml
 */
abstract class Slider extends Action
{
    /**
     * Slider Factory
     *
     * @var SliderFactory
     */
    protected $sliderFactory;

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * Slider constructor.
     *
     * @param SliderFactory $sliderFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        SliderFactory $sliderFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->sliderFactory = $sliderFactory;
        $this->coreRegistry = $coreRegistry;

        parent::__construct($context);
    }

    /**
     * Init Slider
     *
     * @return \Norsys\BannerSlider\Model\Slider
     * @throws LocalizedException
     */
    protected function initSlider()
    {
        $sliderId = (int)$this->getRequest()->getParam('slider_id');
        /** @var \Norsys\BannerSlider\Model\Slider $slider */
        $slider = $this->sliderFactory->create();
        if ($sliderId) {
            $slider->load($sliderId);
            if (!$slider->getId()) {
                throw new LocalizedException(__('The wrong slider is specified.'));
            }
        }
        $this->coreRegistry->register('mpbannerslider_slider', $slider);

        return $slider;
    }
}
