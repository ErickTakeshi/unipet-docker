<?php

namespace app\controllers;

use Yii;
// use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Cliente;
use app\models\Servico;
use app\models\Especie;
use app\models\Raca;
use app\models\Animal;
use yii\rest\ActiveController;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class SyncController extends ActiveController
{
    public $modelClass = 'app\models\Cliente';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'cliente' => ['POST', 'GET', 'DELETE', 'PUT'],
                ],
            ],
        ];
    }

    public function actionCliente($id = ''){
        $request = Yii::$app->request;
        if($request->isPost){
            $cliente = new Cliente();
            $cliente->nome     = $request->post('nome');
            $cliente->cpf      = $request->post('cpf');
            $cliente->email    = $request->post('email');
            $cliente->rg       = $request->post('rg');
            $cliente->datanasc = $request->post('datanasc');
            $cliente->sexo     = $request->post('sexo');
            $cliente->telefone = $request->post('telefone');

            if($cliente->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/cliente/index');
            }else{
                return $cliente->getErrors();
            }
        }else if($request->isPut){
            $cliente = Cliente::findOne($request->post('id'));
            $cliente->nome     = $request->post('nome');
            $cliente->cpf      = $request->post('cpf');
            $cliente->email    = $request->post('email');
            $cliente->rg       = $request->post('rg');
            $cliente->datanasc = $request->post('datanasc');
            $cliente->sexo     = $request->post('sexo');
            $cliente->telefone = $request->post('telefone');

            if($cliente->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/cliente/index');
            }else{
                return $cliente->getErrors();
            }
        }else if($request->isDelete){
            if(!$id){
                return 'Parâmetro id obrigatório.';
            }else{
                if(Cliente::findOne($id)->delete()){
                    return 'success';
                }else{
                    return 'error';
                }
            }
        }else if($request->isGet){
            if(!$id){
                $clientes = Cliente::find()->asArray()->all();
                return json_encode($clientes);
            }else{
                $cliente = Cliente::find()->where("id = $id")->asArray()->all();
                return json_encode($cliente);
            }
        }
    }

    public function actionServico($id = ''){
        $request = Yii::$app->request;
        if($request->isPost){
            $servico = new Servico();
            $servico->descricao  = $request->post('descricao');
            $servico->observacao = $request->post('observacao');
            $servico->ativo      = $request->post('ativo');

            if($servico->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/servico/index');
            }else{
                return $servico->getErrors();
            }
        }else if($request->isPut){
            $servico = Servico::findOne($request->post('id'));
            $servico->descricao  = $request->post('descricao');
            $servico->observacao = $request->post('observacao');
            $servico->ativo      = $request->post('ativo');

            if($servico->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/servico/index');
            }else{
                return $servico->getErrors();
            }
        }else if($request->isDelete){
            if(!$id){
                return 'Parâmetro id obrigatório.';
            }else{
                if(Servico::findOne($id)->delete()){
                    return 'success';
                }else{
                    return 'error';
                }
            }
        }else if($request->isGet){
            if(!$id){
                $servicos = Servico::find()->asArray()->all();
                return json_encode($servicos);
            }else{
                $servico = Servico::find()->where("id = $id")->asArray()->all();
                return json_encode($servico);
            }
        }
    }

    public function actionEspecie($id = ''){
        $request = Yii::$app->request;
        if($request->isPost){
            $especie = new Especie();
            $especie->descricao  = $request->post('descricao');
            $especie->observacao = $request->post('observacao');

            if($especie->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/especie/index');
            }else{
                return $especie->getErrors();
            }
        }else if($request->isPut){
            $especie = Especie::findOne($request->post('id'));
            $especie->descricao  = $request->post('descricao');
            $especie->observacao = $request->post('observacao');

            if($especie->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/especie/index');
            }else{
                return $especie->getErrors();
            }
        }else if($request->isDelete){
            if(!$id){
                return 'Parâmetro id obrigatório.';
            }else{
                if(Especie::findOne($id)->delete()){
                    return 'success';
                }else{
                    return 'error';
                }
            }
        }else if($request->isGet){
            if(!$id){
                $especies = Especie::find()->asArray()->all();
                return json_encode($especies);
            }else{
                $especie = Especie::find()->where("id = $id")->asArray()->all();
                return json_encode($especie);
            }
        }
    }

    public function actionRaca($id = ''){
        $request = Yii::$app->request;
        if($request->isPost){
            $raca = new Raca();
            $raca->descricao  = $request->post('descricao');
            $raca->observacao = $request->post('observacao');
            $raca->especie_id = $request->post('especie_id');

            if($raca->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/raca/index');
            }else{
                return $raca->getErrors();
            }
        }else if($request->isPut){
            $raca = Raca::findOne($request->post('id'));
            $raca->descricao  = $request->post('descricao');
            $raca->observacao = $request->post('observacao');
            $raca->especie_id = $request->post('especie_id');

            if($raca->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/raca/index');
            }else{
                return $raca->getErrors();
            }
        }else if($request->isDelete){
            if(!$id){
                return 'Parâmetro id obrigatório.';
            }else{
                if(Raca::findOne($id)->delete()){
                    return 'success';
                }else{
                    return 'error';
                }
            }
        }else if($request->isGet){
            if(!$id){
                $racas = Raca::find()->joinWith('especie')->asArray()->all();
                return json_encode($racas);
            }else{
                $raca = Raca::find()->where("id = $id")->asArray()->all();
                return json_encode($raca);
            }
        }
    }

        public function actionAnimal($id = ''){
        $request = Yii::$app->request;
        if($request->isPost){
            $animal = new Animal();
            $animal->nome       = $request->post('nome');
            $animal->sexo       = $request->post('sexo');
            $animal->raca_id    = $request->post('raca_id');
            $animal->cliente_id = $request->post('cliente_id');

            if($animal->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/animal/index');
            }else{
                return $animal->getErrors();
            }
        }else if($request->isPut){
            $animal = Animal::findOne($request->post('id'));
            $animal->nome       = $request->post('nome');
            $animal->sexo       = $request->post('sexo');
            $animal->raca_id    = $request->post('raca_id');
            $animal->cliente_id = $request->post('cliente_id');

            if($animal->save()){
                return $this->redirect('http://localhost/unipet-client/index.php/animal/index');
            }else{
                return $animal->getErrors();
            }
        }else if($request->isDelete){
            if(!$id){
                return 'Parâmetro id obrigatório.';
            }else{
                if(Animal::findOne($id)->delete()){
                    return 'success';
                }else{
                    return 'error';
                }
            }
        }else if($request->isGet){
            if(!$id){
                $animais = Animal::find()->joinWith('cliente')->joinWith('raca')->asArray()->all();
                return json_encode($animais);
            }else{
                $animal = Animal::find()->where("id = $id")->asArray()->all();
                return json_encode($animal);
            }
        }
    }
}
