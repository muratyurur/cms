<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v";

        if (!get_active_user())
            redirect(base_url("login"));

        /** Load Models */
        $this->load->model("user_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        /** Taking all data from the table */
        $items = $this->user_model->get_all(
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

        if ($_FILES["img_url"]["name"] == "") {
            /** Set the notification is Error */
            $alert = array(
                "type" => "error",
                "title" => "İşlem Başarısız",
                "text" => "Lütfen bir görsel seçiniz.."
            );

            $this->session->set_flashdata("alert", $alert);

            /** Redirect to Module's List Page */
            redirect(base_url("users/new_form"));

            die();
        }

        /** Validation Rules */
        $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "trim|required|is_unique[users.user_name]");
        $this->form_validation->set_rules("full_name", "Ad Soyad", "trim|required");
        $this->form_validation->set_rules("title", "Unvan", "trim|required");
        $this->form_validation->set_rules("email", "ePosta", "trim|required|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password", "Şifre", "trim|required|min_length[6]");
        $this->form_validation->set_rules("re-password", "Şifre Tekrar", "trim|required|matches[password]");

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz...",
                "valid_email" => "Lütfen geçerli bir ePosta adresi giriniz...",
                "is_unique" => "Bu <b>{field}</b> daha önceden kullanılmış...",
                "matches" => "Girmiş olduğunuz şifreler birbiriyle uyuşmamaktadır...",
                "min_length" => "<b>{field}</b> en az {param} karaketer içermelidir..."
            )
        );

        /** Run Form Validation */
        $validate = $this->form_validation->run();

        /** If Validation Successful */
        if ($validate) {
            /** Start Insert Statement */

            /** Taking the name of uploaded file */
            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            /** CodeIgniter 'Upload Library's configuration set */
            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"] = "uploads/{$this->viewFolder}/";
            $config["file_name"] = $file_name;

            /** Load CodeIgniter 'Upload Library' */
            $this->load->library("upload", $config);

            /** Doing upload by 'do_upload' method */
            $upload = $this->upload->do_upload("img_url");

            /** If Upload Process is Succesful */
            if ($upload) {
                /** Create a Variable and set with Uploaded File's name */
                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->user_model->add(
                    array(
                        "user_name" => $this->input->post("user_name"),
                        "full_name" => $this->input->post("full_name"),
                        "title" => $this->input->post("title"),
                        "email" => $this->input->post("email"),
                        "password" => md5($this->input->post("password")),
                        "img_url" => $uploaded_file,
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
                    redirect(base_url("users/new_form"));

                    die();

                }

                /** If Upload Process is Unsuccesful */
            } else {

                /** Set the notification is Error */
                $alert = array(
                    "type" => "error",
                    "title" => "İşlem Başarısız",
                    "text" => "Görsel yükleme esnasında bir sorun oluştu.."
                );

                $this->session->set_flashdata("alert", $alert);

                /** Redirect to Module's Add New Page */
                redirect(base_url("users/new_form"));
            }

            $this->session->set_flashdata("alert", $alert);

            /** Redirect to Module's List Page */
            redirect(base_url("users"));

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
        $item = $this->user_model->get(
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

        $old_user = $this->user_model->get(
            array(
                "id"    => $id
            )
        );

        if ($old_user->user_name != $this->input->post("user_name")){
            $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "trim|required|is_unique[users.user_name]");
        }
        if ($old_user->email != $this->input->post("email")){
            $this->form_validation->set_rules("email", "ePosta", "trim|required|valid_email|is_unique[users.email]");
        }

        /** Validation Rules */
        $this->form_validation->set_rules("full_name", "Ad Soyad", "trim|required");
        $this->form_validation->set_rules("title", "Unvan", "trim|required");

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz...",
                "valid_email" => "Lütfen geçerli bir ePosta adresi giriniz...",
                "is_unique" => "Bu <b>{field}</b> daha önceden kullanılmış...",
            )
        );

        /** Run Form Validation */
        $validate = $this->form_validation->run();

        /** If Validation Successful */
        if ($validate) {

            /** Start Update Statement */
            if ($_FILES["img_url"]["name"] !== "") {

                /** Taking the name of uploaded file */
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                /** CodeIgniter 'Upload Library's configuration set */
                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"] = "uploads/{$this->viewFolder}/";
                $config["file_name"] = $file_name;

                /** Load CodeIgniter 'Upload Library' */
                $this->load->library("upload", $config);

                /** Doing upload by 'do_upload' method */
                $upload = $this->upload->do_upload("img_url");

                /** If Upload Process is Succesful */
                if ($upload) {

                    $item = $this->user_model->get(
                        array(
                            "id"    => $id
                        )
                    );

                    /** Deleting the file physically from disk */
                    unlink("uploads/{$this->viewFolder}/$item->img_url");

                    /** Create a Variable and set with Uploaded File's name */
                    $uploaded_file = $this->upload->data("file_name");

                    $data = array(
                        "user_name" => $this->input->post("user_name"),
                        "full_name" => $this->input->post("full_name"),
                        "title"     => $this->input->post("title"),
                        "email"     => $this->input->post("email"),
                        "img_url"   => $uploaded_file
                    );

                    /** If Upload Process is Unsuccesful */
                } else {

                    /** Set the notification is Error */
                    $alert = array(
                        "type" => "error",
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yükleme esnasında bir sorun oluştu.."
                    );

                    $this->session->set_flashdata("alert", $alert);

                    /** Redirect to Module's List Page */
                    redirect(base_url("users/update_form/$id"));
                }
            } else {
                $data = array(
                    "user_name" => $this->input->post("user_name"),
                    "full_name" => $this->input->post("full_name"),
                    "title" => $this->input->post("title"),
                    "email" => $this->input->post("email")
                );
            }

            $update = $this->user_model->update(array("id" => $id), $data);

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
            redirect(base_url("users"));

            /** If Validation Unsuccessful */

        } else {
            /** Reload View and Show Error Messages Below the Inputs */
            $viewData = new stdClass();

            /** Taking the specific row's data from the table */
            $item = $this->user_model->get(
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

    public function delete($id)
{
    /** Taking the specific row's data from userss table */
    $item = $this->user_model->get(
        array(
            "id" => $id
        )
    );
    /** Starting Delete Statement */
    $delete = $this->user_model->delete(
        array(
            "id" => $id
        )
    );

    /** If Delete Statement is Succesful */
    if ($delete) {

        /** Deleting the file physically from disk */
        unlink("uploads/{$this->viewFolder}/$item->img_url");

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
    redirect(base_url("users"));

}

    public function isActiveSetter($id)
{
    /** If the posted data is true then set the isActive variable's value 1 else set 0 */
    $isActive = ($this->input->post("data") === "true") ? 1 : 0;

    /** Update the isActive column with isActive varible's value */
    $this->user_model->update(
        array(
            "id" => $id
        ),
        array(
            "isActive" => $isActive
        )
    );
}

    public function rankSetter()
{
    /** Set the values of $data array with posted data */
    $data = $this->input->post("data");

    /** Parsing values of $data array and put into the $order array */
    parse_str($data, $order);

    /** Set the values $items array with $order array and set keys as 'ord' and values as 'rank' */
    $items = $order["ord"];

    /** Update all  */
    foreach ($items as $rank => $id) {

        $this->user_model->update(
            array(
                "id" => $id,
                "rank!=" => $rank
            ),
            array(
                "rank" => $rank
            )
        );
    }
}

    public function update_password_form($id)
    {
        $viewData = new stdClass();

        /** Taking the specific row's data from the table */
        $item = $this->user_model->get(
            array(
                "id" => $id
            )
        );

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "password";
        $viewData->item = $item;

        /** Load View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update_password($id)
    {
        /** Load Form Validation Library */
        $this->load->library("form_validation");

        /** Validation Rules */
        $this->form_validation->set_rules("password", "Şifre", "trim|required|min_length[6]");
        $this->form_validation->set_rules("re-password", "Şifre Tekrar", "trim|required|matches[password]");

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz...",
                "matches" => "Girmiş olduğunuz şifreler birbiriyle uyuşmamaktadır...",
                "min_length" => "<b>{field}</b> en az {param} karakter içermelidir..."
            )
        );

        /** Run Form Validation */
        $validate = $this->form_validation->run();

        /** If Validation Successful */
        if ($validate) {

            /** Start Update Statement */
            $update = $this->user_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "password" => md5($this->input->post("password"))
                )
            );

            /** If Update Statement Succesful */
            if ($update) {

                /** Set the notification is Success */
                $alert = array(
                    "type" => "success",
                    "title" => "İşlem Başarılı",
                    "text" => "Şifre başarılı bir şekilde güncellendi.."
                );

                /** If Update Statement Unsuccessful */
            } else {

                /** Set the notification is Error */
                $alert = array(
                    "type" => "error",
                    "title" => "İşlem Başarısız",
                    "text" => "Şifre güncelleme işlemi esnasında bir sorun oluştu.."
                );

            }

            $this->session->set_flashdata("alert", $alert);

            /** Redirect to Module's List Page */
            redirect(base_url("users"));

            /** If Validation Unsuccessful */

        } else {
            /** Reload View and Show Error Messages Below the Inputs */
            $viewData = new stdClass();

            /** Taking the specific row's data from the table */
            $item = $this->user_model->get(
                array(
                    "id" => $id
                )
            );

            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;
            $viewData->item = $item;

            /** Reload View */
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

}