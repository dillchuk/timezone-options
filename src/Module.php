<?php

namespace TimezoneOptions;

class Module {

    public function getAutoloaderConfig() {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__
                ],
            ],
        ];
    }

}
