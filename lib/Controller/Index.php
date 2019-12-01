<?php

namespace MyApp\Controller;

class Index extends \MyApp\Controller
{
    public function run()
    {
        $messagesModel = new \MyApp\Model\Message();  // テーブルから全件取得
        $this->setValues('messages', $messagesModel->findAllMessage());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // POSTされたか判断
            if (isset($_POST["add"])) { // 投稿処理
                $this->addMessage();
            } elseif (isset($_POST["remove"])) { // 削除処理
                $this->removeMessage($_POST["remove"]);
            }
        }
    }

    private function addMessage() // 投稿処理
    {
        $messageModel = new \MyApp\Model\Message();
        $messageModel->create([
        'u_name' => $_POST['u_name'],
        'content' => $_POST['content']
      ]);

        header('Location: ' . SITE_URL);
        exit;
    }
    
    private function removeMessage($id) // 削除処理
    {
        $messageModel = new \MyApp\Model\Message();
        $messageModel->delete($id);

        header('Location: ' . SITE_URL);
        exit;
    }
}
