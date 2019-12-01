<?php

namespace MyApp\Controller;

class Index extends \MyApp\Controller
{
    public function run()
    {
        $messagesModel = new \MyApp\Model\Message();
        $this->setValues('messages', $messagesModel->findAllMessage());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["add"])) {
                $this->addMessage();
            } elseif (isset($_POST["remove"])) {
                $this->removeMessage($_POST["remove"]);
            }
        }
    }

    private function addMessage()
    {
        $messageModel = new \MyApp\Model\Message();
        $messageModel->create([
        'u_name' => $_POST['u_name'],
        'content' => $_POST['content']
      ]);

        header('Location: ' . SITE_URL);
        exit;
    }
    
    private function removeMessage($id)
    {
        $messageModel = new \MyApp\Model\Message();
        $messageModel->delete($id);

        header('Location: ' . SITE_URL);
        exit;
    }
}
