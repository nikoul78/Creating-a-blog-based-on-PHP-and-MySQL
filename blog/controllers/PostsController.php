<?php

class PostsController extends BaseController
{
    function onInit()
    {
        $this->authorize();
    }

    public function index()
    {
        $this->posts = $this->model->getAll();
    }

    public function create()
    {
        if ($this->isPost) {
            $title = $_POST['post_title'];
            if (strlen($title) < 1)
                $this->setValidationError("post_title", "Полето Заглавие е не може да бъде празно!");

            $content = $_POST['post_content'];
            if (strlen($content) < 1)
                $this->setValidationError("post_content", "Полето Съдържание не може да бъде празно!");

            if ($this->formValid()) {
                $userId = $_SESSION['user_id'];
                if ($this->model->create($title, $content, $userId)) {
                    $this->addInfoMessage("Публикацията е създадена.");
                    $this->redirect("posts");
                }
                else
                    $this->addErrorMessage("Грешка: публикацията не може да бъде създадена.");
            }
        }
    }

    public function edit(int $id)
    {
        if ($this->isPost) {
            $title = $_POST['post_title'];
            if (strlen($title) < 1)
                $this->setValidationError("post_title", "Полето Заглавие е не може да бъде празно!");

            $content = $_POST['post_content'];
            if (strlen($content) < 1)
                $this->setValidationError("post_content", "Полето Съдържание не може да бъде празно!");

            $date = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';
            if (!preg_match($dateRegex, $date))
                $this->setValidationError("post_date", "Невалидна дата!");

            $user_id = $_POST['user_id'];
            if ($user_id <= 0 || $user_id > 1000000)
                $this->setValidationError("user_id", "Невалиден идентификационен код на автора!");

            if ($this->formValid()) {
                $userId = $_SESSION['user_id'];
                if ($this->model->edit($id, $title, $content, $date, $user_id))
                    $this->addInfoMessage("Публикацията е редактирана.");
                else
                    $this->addErrorMessage("Грешка: публикацията не може да бъде редактирана.");
                $this->redirect("posts");
            }
        }
        $post = $this->model->getById($id);
        if (!$post) {
            $this->addErrorMessage("Грешка: публикацията не съществува.");
            $this->redirect("posts");
        }
        $this->post = $post;
    }

    public function delete(int $id)
    {
        if ($this->isPost) {
            if ($this->model->delete($id))
                $this->addInfoMessage("Публикацията е изтрита.");
            else
                $this->addErrorMessage("Грешка: публикацията не може да бъде изтрита.");
            $this->redirect("posts");
        }
        else {
            $post = $this->model->getById($id);
            if (!$post) {
                $this->addErrorMessage("Грешка: публикацията не съществува.");
                $this->redirect("posts");
            }
            $this->post = $post;
        }
    }
}