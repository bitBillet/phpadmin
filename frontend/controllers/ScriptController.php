<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use src\Modules\Script\Application\Command\SqlHandlerCommand;
use src\Modules\Script\Domain\Service\SqlHandlerService;
use src\Modules\Script\Domain\Entity\ScriptHistoryTableEntity;

class ScriptController extends Controller
{
    /** @var SqlHandlerCommand */
    private $sqlHandlerCommand;

    public function __construct($id, $module, SqlHandlerCommand $command,  $config = [])
    {
        $this->sqlHandlerCommand = $command;
        parent::__construct($id, $module, $config);
    }

    public function actionSqlScript()
    {
        $model = null;
        if (Yii::$app->request->post()) {
            $text = Yii::$app->request->getBodyParams()['text'];
            $service = new SqlHandlerService($text);
            $entity = new ScriptHistoryTableEntity($text);
            $request = new SqlHandlerCommand($service, $entity);
            $model = $request->execute();
        }
        return $this->render('sqlScript', ['model' => $model]);
    }

    public function actionScriptHistory()
    {
        $historyEntity = new ScriptHistoryTableEntity();
        $model = $historyEntity->getData();
        return $this->render('scriptHistory', ['model' => $model]);
    }
}