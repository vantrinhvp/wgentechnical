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

namespace Norsys\BannerSlider\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Type
 * @package Norsys\BannerSlider\Model\Config\Source
 */
class Type implements ArrayInterface
{
    const IMAGE = '0';
    const CONTENT = '1';

    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::IMAGE,
                'label' => __('Image')
            ],
            [
                'value' => self::CONTENT,
                'label' => __('Advanced')
            ]
        ];

        return $options;
    }
}
