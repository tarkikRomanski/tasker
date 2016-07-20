<?php
header('Content-Type: text/html; charset=utf-8');
class Task
{
    protected $pdo;
    public function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'tasks';

        $dsn = "mysql:host=$host;dbname=$db;";
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $this->pdo = new PDO($dsn, $user, $pass, $opt);
    }

    public function newTask($text)
    {
        $query = "INSERT INTO tasks (text, status) VALUES (?, 1)";
        $result = $this->pdo->prepare($query);
        $result->execute([$text]);
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

    public function getAllTask()
    {
        $query = "SELECT * FROM tasks";
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

    public function getTodayTasks()
    {
        $today = date('Y-m-d');
        $query = "SELECT * FROM tasks WHERE `date` LIKE '%". $today . "%' OR `status` = 1";
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