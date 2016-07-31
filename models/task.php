<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'model.php';
class Task extends Model
{
    public function newTask($text, $owner)
    {
        $query = "INSERT INTO tasks (text, status, owner) VALUES (?, 1, ?)";
        $result = $this->pdo->prepare($query);
        $result->execute([$text, $owner]);
    }

    public function closeTask($id)
    {
        $query = "UPDATE tasks SET status = 0 WHERE id = ?";
        $result = $this->pdo->prepare($query);
        $result->execute([$id]);
    }

    public function openTask($id)
    {
        $query = "UPDATE tasks SET status = 1 WHERE id = ?";
        $result = $this->pdo->prepare($query);
        $result->execute([$id]);
    }

    public function getAllTask($owner)
    {
        $query = "SELECT * FROM tasks WHERE owner=$owner";
        $stmt = $this->pdo->query($query);
        $i = 0;
        while ($row = $stmt->fetch())
        {
            $resRow[$i] = $row;
            $i++;
        }
        return $resRow;
    }

    private function getOpensTask()
    {
        $query = "SELECT * FROM tasks WHERE status = 1";
        $stmt = $this->pdo->query($query);
        $i = 0;
        while ($row = $stmt->fetch())
        {
            $resRow[$i] = $row;
            $i++;
        }
        return $resRow;
    }

    public function getTodayTasks($owner)
    {
        $today = date('Y-m-d');
        $query = "SELECT * FROM tasks WHERE (`date` LIKE '%". $today . "%' OR `status` = 1) AND owner=$owner";
        $stmt = $this->pdo->query($query);
        $i = 0;
        while ($row = $stmt->fetch())
        {
            $resRow[$i] = $row;
            $i++;
        }
        return $resRow;
    }
}