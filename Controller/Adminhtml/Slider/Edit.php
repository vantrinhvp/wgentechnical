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
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Norsys\BannerSlider\Controller\Adminhtml\Slider;
use Norsys\BannerSlider\Model\SliderFactory;

/**
 * Class Edit
 * @package Norsys\BannerSlider\Controller\Adminhtml\Slider
 */
class Edit extends Slider
{
    const ADMIN_RESOURCE = 'Norsys_BannerSlider::slider';

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
     * @param SliderFactory $sliderFactory
     * @param Registry $registry
     * @param Context $context
     */
    public function __construct(
        PageFactory $resultPageFactory,
        SliderFactory $sliderFactory,
        Registry $registry,
        Context $context
    ) {
        $this->resultPageFactory = $resultPageFactory;

        parent::__construct($sliderFactory, $registry, $context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|ResponseInterface|Redirect|ResultInterface|Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('slider_id');
        /** @var \Norsys\BannerSlider\Model\Slider $slider */
        $slider = $this->initSlider();

        if ($id) {
            $slider->load($id);
            if (!$slider->getId()) {
                $this->messageManager->addError(__('This Slider no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath(
                    'mpbannerslider/*/edit',
                    [
                        'slider_id' => $id,
                        '_current' => true
                    ]
                );

                return $resultRedirect;
            }
        }

        $data = $this->_session->getData('mpbannerslider_slider_data', true);
        if (!empty($data)) {
            $slider->setData($data);
        }

        /** @var \Magento\Backend\Model\View\Result\Page|Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Norsys_BannerSlider::slider');
        $resultPage->getConfig()->getTitle()
            ->set(__('Sliders'))
            ->prepend($slider->getId() ? $slider->getName() : __('New Slider'));

        return $resultPage;
    }
}
