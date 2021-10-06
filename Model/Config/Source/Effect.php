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
 * Class Effect
 * @package Norsys\BannerSlider\Model\Config\Source
 */
class Effect implements ArrayInterface
{
    const SLIDER = 'slider';
    const FADE_OUT = 'fadeOut';
    const ROTATE_OUT = 'rotateOut';
    const FLIP_OUT = 'flipOutX';
    const ROLL_OUT = 'rollOut';
    const ZOOM_OUT = 'zoomOut';
    const SLIDER_OUT_LEFT = 'slideOutLeft';
    const SLIDER_OUT_RIGHT = 'slideOutRight';
    const LIGHT_SPEED_OUT = 'lightSpeedOut';

    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::SLIDER,
                'label' => __('No')
            ],
            [
                'value' => self::FADE_OUT,
                'label' => __('fadeOut')
            ],
            [
                'value' => self::ROTATE_OUT,
                'label' => __('rotateOut')
            ],
            [
                'value' => self::FLIP_OUT,
                'label' => __('flipOut')
            ],
            [
                'value' => self::ROLL_OUT,
                'label' => __('rollOut')
            ],
            [
                'value' => self::ZOOM_OUT,
                'label' => __('zoomOut')
            ],
            [
                'value' => self::SLIDER_OUT_LEFT,
                'label' => __('slideOutLeft')
            ],
            [
                'value' => self::SLIDER_OUT_RIGHT,
                'label' => __('slideOutRight')
            ],
            [
                'value' => self::LIGHT_SPEED_OUT,
                'label' => __('lightSpeedOut')
            ],
        ];

        return $options;
    }
}
