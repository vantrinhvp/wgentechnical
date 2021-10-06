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

namespace Norsys\BannerSlider\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Norsys\BannerSlider\Helper\Data as bannerHelper;

/**
 * Class Banners
 * @package Norsys\BannerSlider\Ui\Component\Listing\Column
 */
class Banners extends Column
{
    /**
     * @var bannerHelper
     */
    protected $helperData;

    /**
     * Banners constructor.
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param bannerHelper $helperData
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        bannerHelper $helperData,
        array $components = [],
        array $data = []
    ) {
        $this->helperData = $helperData;

        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['slider_id'])) {
                    $id = $item['slider_id'];
                    $data = $this->helperData->getBannerCollection($id)->getSize();
                    $item[$this->getData('name')] = ($data > 0) ? $data . '<span> banners </span>' : '<b>' . __("No banner added") . '</b>';
                }
            }
        }

        return $dataSource;
    }
}
