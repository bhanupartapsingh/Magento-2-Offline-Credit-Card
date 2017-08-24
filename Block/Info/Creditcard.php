<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ebizinfosys\OfflineCC\Block\Info;

class Creditcard extends \Magento\Payment\Block\Info
{
    /**
     * @var string
     */
    protected $_template = 'Ebizinfosys_OfflineCC::info/creditcard.phtml';

    /**
     * @return string
     */
    public function toPdf()
    {
        $this->setTemplate('Ebizinfosys_OfflineCC::info/pdf/creditcard.phtml');
        return $this->toHtml();
    }
}
