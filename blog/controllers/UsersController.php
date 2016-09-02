<?php

class UsersController extends BaseController
{
    public function register()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            if (strlen($username) < 2 || strlen($username) > 50) {
                $this->setValidationError("username", "Невалидно потребителско име!");
            }
            $password = $_POST['password'];
            //$confirm_password = $_POST['password'];
            $uppercase = preg_match('#[A-Z]#', $password);
            $lowercase = preg_match('#[a-z]#', $password);
            $number    = preg_match('#[0-9]#', $password);

            if(!$uppercase || !$lowercase || !$number ||
                (strlen($password) < 3 || strlen($password) > 50)) {
                $this->setValidationError("password", "Невалидна парола! Паролата трябва да съдържа поне
                 1 голяма и 1 една малка латинска буква и една цифра.");
            }

            $full_name = $_POST['full_name'];
            if (strlen($full_name)  > 100) {
                $this->setValidationError("full_name", "Невалидно поле Име и фамилия");
            }
            if($this->formValid()){
                $userId = $this->model->register($username, $password, $full_name);
                if($userId){
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $userId;
                    $this->addInfoMessage("Успешна регистрация.");
                    $this->redirect("posts");
                }else{
                    $this->addErrorMessage("Грешка: Неуспешна регистрация! Моля, проверете
                    въведените данни и опитайте отново.");
                }
            }
        }
    }

    public function login()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $loggedUserId = $this->model->login($username, $password);
            if ($loggedUserId) {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $loggedUserId;
                $this->addInfoMessage("Успешен вход в профила.");
                return $this->redirect("posts");
            } else {
                $this->addErrorMessage("Грешка: Неуспешен вход в профила!
                Моля, опитайте отново или се регистрирайте.");
            }
        }
    }


    public function logout()
    {
        session_destroy();
        $this->addInfoMessage("Успешен изход от профила!");
        $this->redirect("");
    }

    public function index()
    {
        $this->authorize();
        $this->users = $this->model->getAll();
    }
}