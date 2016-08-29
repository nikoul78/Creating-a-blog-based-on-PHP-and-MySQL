<?php

class UsersController extends BaseController
{
    public function register()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            if (strlen($username) < 2 || strlen($username) > 50) {
                $this->setValidationError("username", "Invalid username");
            }
            $password = $_POST['password'];
            //$confirm_password = $_POST['password'];
            $uppercase = preg_match('#[A-Z]#', $password);
            $lowercase = preg_match('#[a-z]#', $password);
            $number    = preg_match('#[0-9]#', $password);

            if(!$uppercase || !$lowercase || !$number ||
                (strlen($password) < 3 || strlen($password) > 50)) {
                $this->setValidationError("password", "Invalid password! Your password must 
                be 3 characters, including at least 1 uppercase letter, 1 lowercase letter, 
                and 1 digit!");
            }

            $full_name = $_POST['full_name'];
            if (strlen($full_name)  > 200) {
                $this->setValidationError("full_name", "Invalid full name");
            }
            if($this->formValid()){
                $userId = $this->model->register($username, $password, $full_name);
                if($userId){
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $userId;
                    $this->addInfoMessage("Registration successful.");
                    $this->redirect("posts");
                }else{
                    $this->addErrorMessage("Error: User registration failed! Please, check your data 
                                            and try again.");
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
                $this->addInfoMessage("Login successful.");
                return $this->redirect("posts");
            } else {
                $this->addErrorMessage("Error: Login failed! Please, go to register.");
            }
        }
    }


    public function logout()
    {
        session_destroy();
        $this->addInfoMessage("Logout successful");
        $this->redirect("");
    }

    public function index()
    {
        $this->authorize();
        $this->users = $this->model->getAll();
    }
}