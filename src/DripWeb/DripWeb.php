<?php

namespace DripWeb;

use User;

class DripWeb
{
    protected $get;
    protected $post;

    public function __construct(array $get, array $post)
    {
        $this->get  = $get;
        $this->post = $post;
    }

    public function init()
    {
        try {
            if (isset($this->post)) {
                if (!isset($this->post['method'])) {
                    throw new ApiException("No method set", 400);
                }
                $this->magic($this->post['method']);
            }
        } catch (ApiException $e) {
            http_response_code($e->getCode());
            echo $e->getMessage();
        }
    }

    protected function magic($method)
    {
        if (!method_exists($this, $method)) {
            throw new ApiException("No method for `" . $method . "` found", 400);
        }
        $this->$method();
    }

    protected function newUser()
    {
        http_response_code(200);
        $user = new User();
        echo $user->getJson();
    }

    protected function message()
    {
        http_response_code(200);
        echo json_encode(["message" => "<li> User: " . $this->post['user'] .  ". Welcome to the game.</li>"]);
    }
}