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

use Exception;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Norsys\BannerSlider\Controller\Adminhtml\Banner;

/**
 * Class Delete
 * @package Norsys\BannerSlider\Controller\Adminhtml\Banner
 */
class Delete extends Banner
{
    /**
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            $this->bannerFactory->create()
                ->load($this->getRequest()->getParam('banner_id'))
                ->delete();
            $this->messageManager->addSuccess(__('The Banner has been deleted.'));
        } catch (Exception $e) {
            // display error message
            $this->messageManager->addErrorMessage($e->getMessage());
            // go back to edit form
            $resultRedirect->setPath(
                'mpbannerslider/*/edit',
                ['banner_id' => $this->getRequest()->getParam('banner_id')]
            );

            return $resultRedirect;
        }

        $resultRedirect->setPath('mpbannerslider/*/');

        return $resultRedirect;
    }
}
