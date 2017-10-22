<?php
/**
 * Created by WhiteApp.
 * User: jose@white-app.com
 * Web : white-app.com
 * Date: 21/10/2017
 * Time: 10:03
 */

namespace App\Controller;

use Aura\Intl\Exception;
use Cake\Network\Exception\BadRequestException;

class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
    }


    public function index()
    {

    }

    public function feed()
    {
        $this->autoRender = false;
        $articles         = $this->Articles->find();
        $response         = $this->response;

        $response->withType('application/json\'');
        $response->withStringBody(json_encode($articles));

        echo json_encode($articles);
        exit;
    }

    public function article()
    {
        $this->autoRender = false;
        $response = $this->response;

        $response->withType('application/json');
        $response->withCharset('UTF-8');

        preg_match(
            '/\/articles\/article\/([0-9]+$)/',
            $this->request->getUri()->getPath(),
            $matches
        );

        $badRequest = true;
        if (true === isset($matches[1])) {
            $articleId = (int) $matches[1];
            if (true === is_integer($articleId)) {
                try {
                    $article = $this->Articles->get($articleId);
                    echo json_encode($article);
                    $badRequest = false;
                } catch (\Exception $exception){
                    $badRequest = true;
                }
            }
        }

        if (true === $badRequest) {
            $response = $this->sendBadRequest(
                'Must provide article id existent in order to delete it.'
            );
        }

        return $response;
    }

    public function add()
    {
        $this->request->allowMethod(['post']);
        $this->autoRender = false;

        $response = $this->response;
        $this->response->withType('application/json');
        $this->response->withCharset('UTF-8');

        $article = $this->Articles->newEntity();

        if ($this->request->is('post')) {
            $data = $this->prepareDataToSave($this->request->getData());
            if (null !== $data) {
                $data['id'] = 12;

                $article = $this->Articles->patchEntity($article, $data);

                if (true === is_object($this->Articles->save($article))) {
                    echo json_encode(
                        array(
                            'success' => 'entity was created'
                        )
                    );
                }
            }
            else {
                echo "lol";die();
                $response = $this->sendBadRequest(
                    'Must article entity in payload in order to create ti'
                );
            }
        }

        return $response;
    }


    public function edit()
    {
        $this->request->allowMethod(['put']);
        $this->autoRender = false;

        $response = $this->response;

        $response->withType('application/json');
        $response->withCharset('UTF-8');

        if ($this->request->is('put')) {
            $errorReport = $this->checkRequest();

            if (null === $errorReport) {
                $data      = $this->request->getData();;
                $articleId = $data['id'];
                $article   = $this->Articles->get($articleId);
                $article   = $this->Articles->patchEntity($article, $this->prepareData($article, $data));

                if (true === is_object($this->Articles->save($article))) {
                    echo json_encode(
                        array(
                            'success' => 'entity was edited'
                        )
                    );
                }
            }
            else {
                $response = $this->sendBadRequest($errorReport);

            }
        }
        return $response;
    }

    public function delete()
    {
        $this->autoRender = false;
        $this->request->allowMethod('delete');
        $response = $this->response;

        $response->withType('application/json');
        $response->withCharset('UTF-8');

        preg_match(
            '/\/articles\/delete\/([0-9]+$)/',
            $this->request->getUri()->getPath(),
            $matches
        );

        $badRequest = true;
        if (true === isset($matches[1])) {
            $articleId = (int) $matches[1];
            if (true === is_integer($articleId)) {
                try {
                    $article = $this->Articles->get($articleId);
                    $this->Articles->delete($article);
                    echo json_encode(
                        array(
                            'success' => 'entity was deleted'
                        )
                    );
                    $badRequest = false;
                } catch (\Exception $exception){
                    $badRequest = true;
                }
            }
        }

        if (true === $badRequest) {
            $response = $this->sendBadRequest(
                'Must provide article id existent in order to delete it.'
            );
        }

        return $response;

    }

    private function checkRequest()
    {
        $requestData = $this->request->getData();
        $errorReport = null;

        if (true === empty($requestData)) {
            $errorReport .= "Empty payload.\n";
        }
        elseif (false === isset($requestData['id']) || true === empty($requestData['id'])) {
            $errorReport .= "Must provide article identifier in order to update it.\n";
        }
        else {
            unset($requestData['id']);

            foreach ($requestData as $attribute => $value) {
                if (false === in_array($attribute, $this->Articles->jsonAllowedFields)) {
                    $errorReport .= "Cannot process this attribute {$attribute}.\n";
                    break;
                }
            }
        }

        return $errorReport;
    }

    private function prepareData($article, $data)
    {
        unset($data['id']);
        foreach ($data as $attribute => $value) {
            $article->data[$attribute] = $value;
        }

        return array(
            'data' => $article->data
        );
    }

    private function sendBadRequest($message) : \Cake\Http\Response
    {
        $response = $this->response->withStatus(400, 'Bad Request');

        echo json_encode(
            array('error' => $message)
        );

        return $response;
    }

    private function prepareDataToSave($requestData)
    {
        $errorReport = null;

        foreach ($this->Articles->jsonAllowedFields as $attribute => $value) {
            if (false === in_array($attribute, $requestData)) {
                $requestData = null;
                break;
            }
        }

        return array(
            'data' => $requestData
        );
    }

}
