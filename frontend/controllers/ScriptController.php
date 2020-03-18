<?php


namespace frontend\controllers;

use src\Modules\Script\Application\Command\ScriptHistoryCommand;
use Yii;
use yii\web\Controller;
use src\Modules\Script\Application\Command\ScriptHandlerCommand;

class ScriptController extends Controller
{
    private $scriptHandlerCommand;
    private $scriptHistoryCommand;

    public function __construct(
        $id,
        $module,
        ScriptHandlerCommand $scriptHandlerCommand,
        ScriptHistoryCommand $scriptHistoryCommand,
        $config = []
    ) {
        $this->scriptHandlerCommand = $scriptHandlerCommand;
        $this->scriptHistoryCommand = $scriptHistoryCommand;
        parent::__construct($id, $module, $config);
    }

    public function actionSqlScript()
    {
        $htmlResponse = null;
        if (Yii::$app->request->post()) {
            $record = Yii::$app->request->getBodyParams()['text'];
            $htmlResponse = $this->scriptHandlerCommand->execute($record);
        }
        return $this->render('sqlScript', ['data' => $htmlResponse]);
    }

    public function actionScriptHistory()
    {
        $scriptHistoryData = $this->scriptHistoryCommand->execute();
        return $this->render('scriptHistory', ['data' => $scriptHistoryData]);
    }
}