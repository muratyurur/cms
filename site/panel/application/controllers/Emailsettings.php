<?php

class Emailsettings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "email_settings_v";

        if (!get_active_user())
            redirect(base_url("login"));

        /** Load Models */
        $this->load->model("email_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        /** Taking all data from the table */
        $items = $this->email_model->get_all(
            array()
        );

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        /** Load View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {
        $viewData = new stdClass();

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        /** Load View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        /** Load Form Validation Library */
        $this->load->library("form_validation");

        /** Validation Rules */
        $this->form_validation->set_rules("protocol", "Protokol", "trim|required");
        $this->form_validation->set_rules("host", "ePosta Sunucu (Host)", "trim|required");
        $this->form_validation->set_rules("port", "Port Numarası", "trim|required");
        $this->form_validation->set_rules("user_name", "Gönderici Adı", "trim|required");
        $this->form_validation->set_rules("password", "Sunucu Şifresi", "trim|required");
        $this->form_validation->set_rules("user", "Sunucu Kullanıcı Adı", "trim|required|valid_email");
        $this->form_validation->set_rules("from", "Kimden", "trim|required|valid_email");
        $this->form_validation->set_rules("to", "Kime", "trim|required|valid_email");

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz...",
                "valid_email" => "Lütfen geçerli bir ePosta adresi giriniz..."
            )
        );

        /** Run Form Validation */
        $validate = $this->form_validation->run();

        /** If Validation Successful */
        if ($validate) {
            /** Start Insert Statement */

            $insert = $this->email_model->add(
                array(
                    "protocol" => $this->input->post("protocol"),
                    "host" => $this->input->post("host"),
                    "port" => $this->input->post("port"),
                    "user_name" => $this->input->post("user_name"),
                    "user" => $this->input->post("user"),
                    "from" => $this->input->post("from"),
                    "to" => $this->input->post("to"),
                    "password" => $this->input->post("password"),
                    "isActive" => 1,
                    "createdAt" => date("Y-m-d H:i:s")
                )
            );

            /** If Insert Statement Succesful */
            if ($insert) {

                /** Set the notification is Success */
                $alert = array(
                    "type" => "success",
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi.."
                );

                /** If Insert Statement Unsuccessful */
            } else {

                /** Set the notification is Error */
                $alert = array(
                    "type" => "error",
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt işlemi esnasında bir sorun oluştu.."
                );

                $this->session->set_flashdata("alert", $alert);

                /** Redirect to Module's Add New Page */
                redirect(base_url("emailsettings/new_form"));

                die();

            }

            $this->session->set_flashdata("alert", $alert);

            /** Redirect to Module's List Page */
            redirect(base_url("emailsettings"));

            die();

            /** If Validation Unsuccessful */
        } else {
            /** Reload View and Show Error Messages Below the Inputs */
            $viewData = new stdClass();

            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            /** Reload View */
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id)
    {
        $viewData = new stdClass();

        /** Taking the specific row's data from the table */
        $item = $this->email_model->get(
            array(
                "id" => $id
            )
        );

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        /** Load View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        /** Load Form Validation Library */
        $this->load->library("form_validation");

        /** Validation Rules */
        $this->form_validation->set_rules("protocol", "Protokol", "trim|required");
        $this->form_validation->set_rules("host", "ePosta Sunucu (Host)", "trim|required");
        $this->form_validation->set_rules("port", "Port Numarası", "trim|required");
        $this->form_validation->set_rules("user_name", "Gönderici Adı", "trim|required");
        $this->form_validation->set_rules("password", "Sunucu Şifresi", "trim|required");
        $this->form_validation->set_rules("user", "Sunucu Kullanıcı Adı", "trim|required|valid_email");
        $this->form_validation->set_rules("from", "Kimden", "trim|required|valid_email");
        $this->form_validation->set_rules("to", "Kime", "trim|required|valid_email");

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz...",
                "valid_email" => "Lütfen geçerli bir ePosta adresi giriniz..."
            )
        );

        /** Run Form Validation */
        $validate = $this->form_validation->run();

        /** If Validation Successful */
        if ($validate) {

            /** Start Update Statement */

            $update = $this->email_model->update(
                array(
                    "id" => $id),
                array(
                    "protocol" => $this->input->post("protocol"),
                    "host" => $this->input->post("host"),
                    "port" => $this->input->post("port"),
                    "user_name" => $this->input->post("user_name"),
                    "user" => $this->input->post("user"),
                    "from" => $this->input->post("from"),
                    "to" => $this->input->post("to"),
                    "password" => $this->input->post("password")
                )
            );

            /** If Update Statement Succesful */
            if ($update) {

                /** Set the notification is Success */
                $alert = array(
                    "type" => "success",
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi.."
                );

                /** If Update Statement Unsuccessful */
            } else {

                /** Set the notification is Error */
                $alert = array(
                    "type" => "error",
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt güncelleme işlemi esnasında bir sorun oluştu.."
                );

            }

            $this->session->set_flashdata("alert", $alert);

            /** Redirect to Module's List Page */
            redirect(base_url("emailsettings"));

            /** If Validation Unsuccessful */

        } else {
            /** Reload View and Show Error Messages Below the Inputs */
            $viewData = new stdClass();

            /** Taking the specific row's data from the table */
            $item = $this->email_model->get(
                array(
                    "id" => $id
                )
            );

            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;

            /** Reload View */
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public
    function delete($id)
    {
        /** Starting Delete Statement */
        $delete = $this->email_model->delete(
            array(
                "id" => $id
            )
        );

        /** If Delete Statement is Succesful */
        if ($delete) {

            /** Set the notification is Success */
            $alert = array(
                "type" => "success",
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi.."
            );

            /** If Delete Statement is Unsuccessful */
        } else {

            /** Set the notification is Error */
            $alert = array(
                "type" => "error",
                "title" => "İşlem Başarısız",
                "text" => "Kayıt silme işlemi esnasında bir sorun oluştu.."
            );

        }

        $this->session->set_flashdata("alert", $alert);

        /** Redirect to Module's List Page */
        redirect(base_url("emailsettings"));

    }

    public
    function isActiveSetter($id)
    {
        /** If the posted data is true then set the isActive variable's value 1 else set 0 */
        $isActive = ($this->input->post("data") === "true") ? 1 : 0;

        /** Update the isActive column with isActive varible's value */
        $this->email_model->update(
            array(
                "id" => $id
            ),
            array(
                "isActive" => $isActive
            )
        );
    }

}