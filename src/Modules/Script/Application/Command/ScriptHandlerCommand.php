<?php
namespace src\Modules\Script\Application\Command;

use src\Core\Application\CommandInterface;
use src\Modules\Script\Domain\Repository\ScriptHistoryRepository;
use src\Modules\Script\Domain\Service\ScriptResponseService;
use src\Modules\Script\Domain\Service\ScriptHandlerService;

class ScriptHandlerCommand implements CommandInterface
{
    private $scriptHistoryRepository;
    private $scriptHandlerService;

    public function __construct(
        ScriptHandlerService $scriptHandlerService,
        ScriptHistoryRepository $scriptHistoryRepository
    ) {
        $this->scriptHistoryRepository = $scriptHistoryRepository;
        $this->scriptHandlerService = $scriptHandlerService;
    }

    public function execute(string $record)
    {
        $recordData = $this->scriptHandlerService->send($record);
        $this->scriptHistoryRepository->addRecordToTable($record);
        return $recordData;
    }
}