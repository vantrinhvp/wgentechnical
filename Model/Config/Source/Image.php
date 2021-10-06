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

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Filesystem;
use Magento\Framework\UrlInterface;

/**
 * Class Image
 * @package Norsys\BannerSlider\Model\Config\Source
 */
class Image
{
    /**
     * Media sub folder
     *
     * @var string
     */
    public $subDir = 'norsys/bannerslider/banner';

    /**
     * URL builder
     *
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * File system model
     *
     * @var Filesystem
     */
    protected $fileSystem;

    /**
     * constructor
     *
     * @param UrlInterface $urlBuilder
     * @param Filesystem $fileSystem
     */
    public function __construct(UrlInterface $urlBuilder, Filesystem $fileSystem)
    {
        $this->urlBuilder = $urlBuilder;
        $this->fileSystem = $fileSystem;
    }

    /**
     * get images base url
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->urlBuilder->getBaseUrl(['_type' => UrlInterface::URL_TYPE_MEDIA]) . $this->subDir . '/image/';
    }

    /**
     * get base image dir
     *
     * @return string
     * @throws FileSystemException
     */
    public function getBaseDir()
    {
        return $this->fileSystem->getDirectoryWrite(DirectoryList::MEDIA)->getAbsolutePath($this->subDir . '/image/');
    }
}
