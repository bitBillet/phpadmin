<?php


namespace src\Modules\Script\Domain\Service;


interface SqlHandlerServiceInterface
{
    public function send();

    public function oldConstructor($fullRequest);
}