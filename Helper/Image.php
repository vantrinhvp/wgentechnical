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

namespace Norsys\BannerSlider\Helper;

use Norsys\Backend\Helper\Media;

/**
 * Class Image
 * @package Norsys\Blog\Helper
 */
class Image extends Media
{
    const TEMPLATE_MEDIA_PATH = 'norsys/bannerslider';
    const TEMPLATE_MEDIA_TYPE_BANNER = 'banner/image';
    const TEMPLATE_MEDIA_TYPE_SLIDER = 'slider/image';
}
