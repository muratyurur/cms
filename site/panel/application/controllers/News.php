<?php

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "news_v";

        /** Load Models */
        $this->load->model("news_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        /** Taking all data from the table */
        $items = $this->news_model->get_all(
            array(), "rank ASC"
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

        $news_type = $this->input->post("news_type");

        /** Validation Rules */
        $this->form_validation->set_rules("title", "Başlık", "trim|required");

        if ($news_type == "image") {
            if ($_FILES["img_url"]["name"] == "") {
                /** Set the notification is Error */
                $alert = array(
                    "type" => "error",
                    "title" => "İşlem Başarısız",
                    "text" => "Lütfen bir görsel seçiniz.."
                );

                $this->session->set_flashdata("alert", $alert);

                /** Redirect to Module's List Page */
                redirect(base_url("news/new_form"));

                die();
            }
        } elseif ($news_type == "video") {

            /** Add validation rule */
            $this->form_validation->set_rules("video_url", "Video URL", "trim|required");
        }

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz..."
            )
        );

        /** Run Form Validation */
        $validate = $this->form_validation->run();

        /** If Validation Successful */
        if ($validate) {
            /** Start Insert Statement */

            if ($news_type == "image") {
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

                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url" => convertToSEO($this->input->post("title")),
                        "news_type" => $news_type,
                        "img_url" => $uploaded_file,
                        "video_url" => "#",
                        "rank" => 0,
                        "isActive" => 1,
                        "createdAt" => date("Y-m-d H:i:s")
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
                    redirect(base_url("news/new_form"));
                }
            } elseif ($news_type == "video") {
                $data = array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "url" => convertToSEO($this->input->post("title")),
                    "news_type" => $news_type,
                    "img_url" => "#",
                    "video_url" => $this->input->post("video_url"),
                    "rank" => 0,
                    "isActive" => 1,
                    "createdAt" => date("Y-m-d H:i:s")
                );
            }

            $insert = $this->news_model->add($data);

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

            }

            $this->session->set_flashdata("alert", $alert);

            /** Redirect to Module's List Page */
            redirect(base_url("news"));

            /** If Validation Unsuccessful */
        } else {
            /** Reload View and Show Error Messages Below the Inputs */
            $viewData = new stdClass();

            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;

            /** Reload View */
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id)
    {
        $viewData = new stdClass();

        /** Taking the specific row's data from the table */
        $item = $this->news_model->get(
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

        $news_type = $this->input->post("news_type");

        /** Validation Rules */
        $this->form_validation->set_rules("title", "Başlık", "trim|required");

        if ($news_type == "video") {

            /** Add validation rule */
            $this->form_validation->set_rules("video_url", "Video URL", "trim|required");
        }

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz..."
            )
        );

        /** Run Form Validation */
        $validate = $this->form_validation->run();

        /** If Validation Successful */
        if ($validate) {

            /** Start Update Statement */
            if ($news_type == "image") {

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
                        /** Create a Variable and set with Uploaded File's name */
                        $uploaded_file = $this->upload->data("file_name");

                        $data = array(
                            "title" => $this->input->post("title"),
                            "description" => $this->input->post("description"),
                            "url" => convertToSEO($this->input->post("title")),
                            "news_type" => $news_type,
                            "img_url" => $uploaded_file,
                            "video_url" => "#"
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
                        redirect(base_url("news/update_form/$id"));
                    }
                } else {
                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url" => convertToSEO($this->input->post("title"))
                    );
                }
            } elseif ($news_type == "video") {
                $data = array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "url" => convertToSEO($this->input->post("title")),
                    "news_type" => $news_type,
                    "img_url" => "#",
                    "video_url" => $this->input->post("video_url")
                );
            }

            $update = $this->news_model->update(array("id" => $id), $data);

            /** If Update Statement Succesful */
            if ($update) {

                /** Set the notification is Success */
                $alert = array(
                    "type" => "success",
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi.."
                );

                /** If Update Statement Unsuccessful */
            } else {

                /** Set the notification is Error */
                $alert = array(
                    "type" => "error",
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt işlemi esnasında bir sorun oluştu.."
                );

            }

            $this->session->set_flashdata("alert", $alert);

            /** Redirect to Module's List Page */
            redirect(base_url("news"));

            /** If Validation Unsuccessful */
        } else {
            /** Reload View and Show Error Messages Below the Inputs */
            $viewData = new stdClass();

            /** Taking the specific row's data from the table */
            $item = $this->news_model->get(
                array(
                    "id" => $id
                )
            );


            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;
            $viewData->item = $item;

            /** Reload View */
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id)
    {
        /** Taking the specific row's data from newss table */
        $item = $this->news_model->get(
            array(
                "id" => $id
            )
        );
        /** Starting Delete Statement */
        $delete = $this->news_model->delete(
            array(
                "id" => $id
            )
        );

        /** If Delete Statement is Succesful */
        if ($delete) {

            if ($item->news_type == "image") {
                /** Deleting the file physically from disk */
                unlink("uploads/{$this->viewFolder}/$item->img_url");
            }

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
        redirect(base_url("news"));

    }

    public function isActiveSetter($id)
    {
        /** If the posted data is true then set the isActive variable's value 1 else set 0 */
        $isActive = ($this->input->post("data") === "true") ? 1 : 0;

        /** Update the isActive column with isActive varible's value */
        $this->news_model->update(
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

            $this->news_model->update(
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

}