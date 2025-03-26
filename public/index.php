<?php
session_start();
require_once '../config/database.php';
require_once '../controllers/StudentController.php';
require_once '../controllers/CourseController.php';
require_once '../controllers/AuthController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

switch ($controller) {
    case 'student':
        $controller = new StudentController();
        break;
    case 'course':
        $controller = new CourseController();
        break;
    case 'auth':
        $controller = new AuthController();
        break;
    default:
        $controller = new AuthController();
        $action = 'login';
}

if (method_exists($controller, $action)) {
    if (in_array($action, ['edit', 'delete', 'detail']) && isset($_GET['id'])) {
        $controller->$action($_GET['id']);
    } else {
        $controller->$action();
    }
} else {
    echo "Action không tồn tại!";
}
?>