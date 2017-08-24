<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ebizinfosys\OfflineCC\Model;

use Magento\Payment\Observer\AbstractDataAssignObserver;

/**
 * Class Purchaseorder
 *
 * @method \Magento\Quote\Api\Data\PaymentMethodExtensionInterface getExtensionAttributes()
 */
class Creditcard extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_CREDITCARD_CODE = 'creditcard';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_CREDITCARD_CODE;

    /**
     * @var string
     */
    protected $_formBlockType = 'Ebizinfosys\OfflineCC\Block\Form\Creditcard';

    /**
     * @var string
     */
    protected $_infoBlockType = 'Ebizinfosys\OfflineCC\Block\Info\Creditcard';

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * Assign data to info model instance
     *
     * @param \Magento\Framework\Object|mixed $data
     * @return $this
     */
    public function assignData(\Magento\Framework\DataObject $data)
    {
        $this->_eventManager->dispatch(
            'payment_method_assign_data_' . $this->getCode(),
            [
                AbstractDataAssignObserver::METHOD_CODE => $this,
                AbstractDataAssignObserver::MODEL_CODE => $this->getInfoInstance(),
                AbstractDataAssignObserver::DATA_CODE => $data
            ]
        );

        $this->_eventManager->dispatch(
            'payment_method_assign_data',
            [
                AbstractDataAssignObserver::METHOD_CODE => $this,
                AbstractDataAssignObserver::MODEL_CODE => $this->getInfoInstance(),
                AbstractDataAssignObserver::DATA_CODE => $data
            ]
        );

        return $this;
    }
}
