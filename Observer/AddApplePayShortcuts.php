<?php
namespace Magento\Braintree\Observer;

use Magento\Braintree\Block\ApplePay\Shortcut\Button;
use Magento\Catalog\Block\ShortcutButtons;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class AddApplePayShortcuts
 * @package Magento\Braintree\Observer
 * @author Aidan Threadgold <aidan@gene.co.uk>
 */
class AddApplePayShortcuts implements ObserverInterface
{
    /**
     * Add apple pay shortcut button
     *
     * @param Observer $observer
     * @return void
     * @throws LocalizedException
     */
    public function execute(Observer $observer)
    {
        // Remove button from catalog pages
        if ($observer->getData('is_catalog_product')) {
            return;
        }

        /** @var ShortcutButtons $shortcutButtons */
        $shortcutButtons = $observer->getEvent()->getContainer();
        $shortcut = $shortcutButtons->getLayout()->createBlock(Button::class);
        $shortcutButtons->addShortcut($shortcut);
    }
}
