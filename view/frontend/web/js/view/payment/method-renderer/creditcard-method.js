/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*browser:true*/
/*global define*/
define(
    [
        'Magento_Checkout/js/view/payment/default',
        'jquery',
        "mage/validation"
    ],
    function (Component, $) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Ebizinfosys_OfflineCC/payment/creditcard-form',
                purchaseOrderNumber: ''
            },
            initObservable: function () {
                this._super()
                    .observe(['CreditCardName','CreditCardNumber','CreditCardExpiry','CreditCardCvv']);
                return this;
            },
            getData: function () {
                return {
                    "method": this.item.method,
                    "additional_data": {
                    	"cc_name": this.CreditCardName(),
	                    "cc_number": this.CreditCardNumber(),
	                    "cc_expiry": this.CreditCardExpiry(),
	                    "cc_cvv": this.CreditCardCvv(),
                    }
                };

            },
            validate: function () {
                var form = 'form[data-role=creditcard-form]';
                return $(form).validation() && $(form).validation('isValid');
            }
        });
    }
);
