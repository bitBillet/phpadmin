<?php
namespace src\Modules\Script\Application\Command;

use src\Core\Domain\Entity\EntityInterface;
use src\Modules\Script\Domain\Service\DrawTableService;
use src\Modules\Script\Domain\Service\SqlHandlerServiceInterface;

class SqlHandlerCommand
{
    private $sendService;
    private $entity;
    public function __construct(SqlHandlerServiceInterface $sendService)
    {
        $this->sendService = $sendService;
    }
    public function execute($fullRequest)
    {
        $this->sendService->oldConstructor($fullRequest);
        $sendResult = $this->sendService->send();
        $this->entity->addRecord();
        if ($sendResult[0] === 'select') {
            return DrawTableService::drawSelectTable($sendResult);
        }
        else {
            return $sendResult;
        }
    }
}