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
        $stmt->execute([
          ':u_name' => $values['u_name'],
          ':content' => $values['content']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("delete from messages where id = :id");
        $stmt->execute([
            ':id' => $id
        ]);
    }

    public function findAllMessage()
    {
        $stmt = $this->db->query("select * from messages order by id desc");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
        return $stmt->fetchAll();
    }
}
