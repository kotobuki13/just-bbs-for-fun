<?php

namespace MyApp\Controller;

class Index extends \MyApp\Controller
{
    public function run()
    {
        $messagesModel = new \MyApp\Model\Message();
        $this->setValues('messages', $messagesModel->findAllMessage());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->postMessage();
        }
    }

    private function postMessage()
    {
        $messageModel = new \MyApp\Model\Message();
        $messageModel->create([
        'u_name' => $_POST['u_name'],
        'content' => $_POST['content']
      ]);

        header('Location: ' . SITE_URL);
        exit;
    }
}
