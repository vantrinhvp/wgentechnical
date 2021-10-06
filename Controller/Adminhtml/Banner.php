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
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\Registry;
use Norsys\BannerSlider\Model\BannerFactory;

/**
 * Class Banner
 * @package Norsys\BannerSlider\Controller\Adminhtml
 */
abstract class Banner extends Action
{
    /**
     * Banner Factory
     *
     * @var BannerFactory
     */
    protected $bannerFactory;

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * Result redirect factory
     *
     * @var RedirectFactory
     */

    /**
     * constructor
     *
     * @param BannerFactory $bannerFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        BannerFactory $bannerFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->bannerFactory = $bannerFactory;
        $this->coreRegistry = $coreRegistry;

        parent::__construct($context);
    }

    /**
     * Init Banner
     *
     * @return \Norsys\BannerSlider\Model\Banner
     */
    protected function initBanner()
    {
        $bannerId = (int)$this->getRequest()->getParam('banner_id');
        /** @var \Norsys\BannerSlider\Model\Banner $banner */
        $banner = $this->bannerFactory->create();
        if ($bannerId) {
            $banner->load($bannerId);
        }
        $this->coreRegistry->register('mpbannerslider_banner', $banner);

        return $banner;
    }
}
