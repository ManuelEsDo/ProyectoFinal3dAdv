<?php
namespace TresdTech\FinalProject\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomerLogin implements ObserverInterface

{
    protected $messageManager;

    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->messageManager = $messageManager;
    }
    
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $this->messageManager->addSuccess(
            __("Bienvenido ".$customer->getName())
        );
        return $observer;
    }
}