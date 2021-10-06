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

namespace Norsys\BannerSlider\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Norsys\BannerSlider\Controller\Adminhtml\Banner;
use Norsys\BannerSlider\Model\BannerFactory;

/**
 * Class Edit
 * @package Norsys\BannerSlider\Controller\Adminhtml\Banner
 */
class Edit extends Banner
{
    const ADMIN_RESOURCE = 'Norsys_BannerSlider::banner';

    /**
     * Page factory
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Edit constructor.
     *
     * @param PageFactory $resultPageFactory
     * @param BannerFactory $bannerFactory
     * @param Registry $registry
     * @param Context $context
     */
    public function __construct(
        PageFactory $resultPageFactory,
        BannerFactory $bannerFactory,
        Registry $registry,
        Context $context
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($bannerFactory, $registry, $context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|ResponseInterface|Redirect|ResultInterface|Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('banner_id');
        /** @var \Norsys\BannerSlider\Model\Banner $banner */
        $banner = $this->initBanner();

        if ($id) {
            $banner->load($id);
            if (!$banner->getId()) {
                $this->messageManager->addError(__('This Banner no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath(
                    'mpbannerslider/*/edit',
                    [
                        'banner_id' => $id,
                        '_current' => true
                    ]
                );

                return $resultRedirect;
            }
        }

        $data = $this->_session->getData('mpbannerslider_banner_data', true);
        if (!empty($data)) {
            $banner->setData($data);
        }

        /** @var \Magento\Backend\Model\View\Result\Page|Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Norsys_BannerSlider::banner');
        $resultPage->getConfig()->getTitle()
            ->set(__('Banners'))
            ->prepend($banner->getId() ? $banner->getName() : __('New Banner'));

        return $resultPage;
    }
}
