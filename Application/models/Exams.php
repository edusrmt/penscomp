<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Exams {
    public static function loadExam () {
        $tasksContent = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/public/assets/json/tasks.json");
        $tasks = json_decode($tasksContent, true);

        return $tasks;
    }
}
