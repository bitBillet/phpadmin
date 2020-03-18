<?php


namespace src\Modules\Script\Application\Command;

use src\Core\Application\CommandInterface;
use src\Modules\Script\Domain\Repository\ScriptHistoryRepository;

class ScriptHistoryCommand implements CommandInterface
{
    private $scriptHistoryRepository;

    public function __construct(
        ScriptHistoryRepository $scriptHistoryRepository
    ) {
        $this->scriptHistoryRepository = $scriptHistoryRepository;
    }

    public function execute(string $record = null)
    {
        return $this->scriptHistoryRepository->getTableData();
    }
}