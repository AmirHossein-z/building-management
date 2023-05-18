<?php

class Policy extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function is_login(string $path): bool
    {
        if (isset($_SESSION) && isset($_SESSION['id'])) {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    public function is_not_login(string $path):bool {
        if(!(isset($_SESSION) && isset($_SESSION['id']))) {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    public function is_manager(string $path): bool
    {
        if (isset($_SESSION['id']) && $_SESSION['type'] === 'role-manager') {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    public function not_manager(string $path):bool {
        if (!(isset($_SESSION['id']) && $_SESSION['type'] === 'role-manager')) {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    public function is_member(string $path): bool
    {
        if (isset($_SESSION['id']) && $_SESSION['type'] === 'role-member') {
            $this->redirect($path);
            return true;
        }
        return false;
    }

    public function not_member(string $path): bool
    {
        if (!(isset($_SESSION['id']) && $_SESSION['type'] === 'role-member')) {
            $this->redirect($path);
            return true;
        }
        return false;
    }
}
