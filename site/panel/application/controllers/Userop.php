<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 06.12.2018
 * Time: 14:14
 */

class Userop extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
    	parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("user_model");
    }

    public function login()
    {
        if (get_active_user())
            redirect(base_url());

        $viewData = new stdClass();

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        /** Load View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function do_login()
    {
        if (get_active_user())
            redirect(base_url());

        $this->load->library("form_validation");

        /** Validation Rules */
        $this->form_validation->set_rules("user_email", "ePosta", "trim|required|valid_email");
        $this->form_validation->set_rules("user_password", "Şifre", "trim|required");

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz...",
                "valid_email" => "Lütfen geçerli bir ePosta adresi giriniz...",
            )
        );

        /** Run Form Validation */
        if ($this->form_validation->run() == false)
        {
            /** Reload View and Show Error Messages Below the Inputs */
            $viewData = new stdClass();

            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            /** Reload View */
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            $user = $this->user_model->get(
                array(
                    "email"     => $this->input->post("user_email"),
                    "password"  => md5($this->input->post("user_password")),
                    "isActive"  => 1
                )
            );

            if ($user)
            {
                /** Set the notification is Success */
                $alert = array(
                    "type"  => "success",
                    "title" => "Kullanıcı Girişi Başarılı",
                    "text"  => "Hoşgeldiniz <b>$user->full_name</b>"
                );

                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                /** Redirect to Dashboard Page */
                redirect(base_url());
            } else {
                /** Set the notification is Success */
                $alert = array(
                    "type"  => "error",
                    "title" => "Kullanıcı Girişi Başarısız",
                    "text"  => "Lütfen bilgileri kontrol ederek tekrar deneyin"
                );

                $this->session->set_flashdata("alert", $alert);

                /** Redirect to Dashboard Page */
                redirect(base_url("login"));
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("user");

        redirect(base_url("login"));
    }
}