<?php

namespace MyApp\Model;

class Message extends \MyApp\Model
{
    public function create($values)
    {
        $stmt = $this->db->prepare("insert into messages (u_name, content, created, modified)
         values (:u_name, :content, now(), now())");

        if ($values['u_name'] === "") {
            $values['u_name'] = "匿名希望";
        }
        $res = $stmt->execute([
          ':u_name' => $values['u_name'],
          ':content' => $values['content']
        ]);
    }
}
