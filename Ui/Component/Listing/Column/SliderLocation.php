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

use Magento\Ui\Component\Listing\Columns\Column;
use Norsys\BannerSlider\Model\Config\Source\Location;

/**
 * Class CommentContent
 * @package Norsys\Blog\Ui\Component\Listing\Columns
 */
class SliderLocation extends Column
{
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
                if (isset($item[$this->getData('name')])) {
                    $data = $this->getLocation($item[$this->getData('name')]);
                    $type = array_unique($data['type']);
                    $item[$this->getData('name')] = '<b>' . implode(', ', $type) . '</b></br>';
                }
            }
        }

        return $dataSource;
    }

    /**
     * @param $data
     *
     * @return array
     */
    public function getLocation($data)
    {
        $location = [];
        $data = explode(',', $data);
        foreach ($data as $item) {
            switch ($item) {
                case Location::ALLPAGE_CONTENT_TOP:
                    $location['type'][] = __('All Page');
                    break;
                case Location::ALLPAGE_CONTENT_BOTTOM:
                    $location['type'][] = __('All Page');
                    break;
                case Location::ALLPAGE_PAGE_TOP:
                    $location['type'][] = __('All Page');
                    break;
                case Location::ALLPAGE_PAGE_BOTTOM:
                    $location['type'][] = __('All Page');
                    break;
                case Location::HOMEPAGE_CONTENT_TOP:
                    $location['type'][] = __('Home Page');
                    break;
                case Location::HOMEPAGE_CONTENT_BOTTOM:
                    $location['type'][] = __('Home Page');
                    break;
                case Location::HOMEPAGE_PAGE_TOP:
                    $location['type'][] = __('Home Page');
                    break;
                case Location::HOMEPAGE_PAGE_BOTTOM:
                    $location['type'][] = __('Home Page');
                    break;
                case Location::CATEGORY_CONTENT_TOP:
                    $location['type'][] = __('Category Page');
                    break;
                case Location::CATEGORY_CONTENT_BOTTOM:
                    $location['type'][] = __('Category Page');
                    break;
                case Location::CATEGORY_PAGE_TOP:
                    $location['type'][] = __('Category Page');
                    break;
                case Location::CATEGORY_PAGE_BOTTOM:
                    $location['type'][] = __('Category Page');
                    break;
                case Location::CATEGORY_SIDEBAR_TOP:
                    $location['type'][] = __('Category Page');
                    break;
                case Location::CATEGORY_SIDEBAR_BOTTOM:
                    $location['type'][] = __('Category Page');
                    break;
                case Location::PRODUCT_CONTENT_TOP:
                    $location['type'][] = __('Product Page');
                    break;
                case Location::PRODUCT_CONTENT_BOTTOM:
                    $location['type'][] = __('Product Page');
                    break;
                case Location::PRODUCT_PAGE_TOP:
                    $location['type'][] = __('Product Page');
                    break;
                case Location::PRODUCT_PAGE_BOTTOM:
                    $location['type'][] = __('Product Page');
                    break;
                case Location::USING_SNIPPET_CODE:
                    $location['type'][] = __('Custom');
                    break;
            }
        }

        return $location;
    }
}
