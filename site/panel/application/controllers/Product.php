<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        /** Setting viewFolder */
        $this->viewFolder = "product_v";

        if (!get_active_user())
            redirect(base_url("login"));

        /** Loading Models */
        $this->load->model("product_model");
        $this->load->model("product_image_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        /** Taking all data from the table */
        $items = $this->product_model->get_all(
            array(), "rank ASC"
        );

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        /** Loading View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {
        $viewData = new stdClass();

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        /** Loading View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        /** Loading Form Validation Library */
        $this->load->library("form_validation");

        /** Setting validation rules */
        $this->form_validation->set_rules("title", "Başlık", "trim|required");

        /** Translating validation error messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz..."
            )
        );

        /** Running Form Validation */
        $validate = $this->form_validation->run();

        /** If validation is successful */
        if ($validate) {
            /** Then start insert statement */

            $insert = $this->product_model->add(
                array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "url" => convertToSEO($this->input->post("title")),
                    "rank" => 0,
                    "isActive" => 1,
                    "createdAt" => date("Y-m-d H:i:s")
                )
            );

            /** If insert statement is successful */
            if ($insert) {

                /** Set the notification as Success */
                $alert = array(
                    "type" => "success",
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi.."
                );

                /** If insert statement is unsuccessful */
            } else {

                /** Set the notification as Error */
                $alert = array(
                    "type" => "error",
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt işlemi esnasında bir sorun oluştu.."
                );

            }

            /** Set the session data with result */
            $this->session->set_flashdata("alert", $alert);

            /** Redirect to Module's List Page */
            redirect(base_url("product"));

            /** If validation is unsuccessful */
        } else {
            /** Then reloading view and show error messages below the inputs */
            $viewData = new stdClass();

            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            /** Reloading view */
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id)
    {
        $viewData = new stdClass();

        /** Taking the specific row's data from the table */
        $item = $this->product_model->get(
            array(
                "id" => $id
            )
        );

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        /** Loading View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        /** Loading Form Validation Library */
        $this->load->library("form_validation");

        /** Setting validation rules */
        $this->form_validation->set_rules("title", "Başlık", "trim|required");

        /** Translating validation error messages */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı boş bırakılamaz..."
            )
        );

        /** Running Form Validation */
        $validate = $this->form_validation->run();

        /** If validation is successful */
        if ($validate) {

            /** Then start update statement */
            $update = $this->product_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "url" => convertToSEO($this->input->post("title")),
                )
            );

            /** If update statement is successful */
            if ($update) {

                /** Set the notification as Success */
                $alert = array(
                    "type" => "success",
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi.."
                );

                /** If update statement is Unsuccessful */
            } else {

                /** Set the notification as Error */
                $alert = array(
                    "type" => "error",
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt güncelleme işlemi esnasında bir sorun oluştu.."
                );

            }

            $this->session->set_flashdata("alert", $alert);

            /** Redirect to Module's List Page */
            redirect(base_url("product"));

            /** If validation is unsuccessful */
        } else {

            /** Then reload view and show error messages below the inputs */
            $viewData = new stdClass();

            /** Taking the specific row's data from the table */
            $item = $this->product_model->get(
                array(
                    "id" => $id
                )
            );

            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->item = $item;
            $viewData->form_error = true;

            /** Reloading View */
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id)
    {
        /** Taking all image records of Product */
        $this->load->model("product_image_model");

        $images = $this->product_image_model->get_all(
            array(
                "product_id"    => $id
            )
        );

        /** Starting delete statement */
        $delete = $this->product_model->delete(
            array(
                "id" => $id
            )
        );

        /** If Delete Statement is successful */
        if ($delete) {

            /** Deleting all image files physically from disk */
            foreach ($images as $image)
            {
                unlink("uploads/{$this->viewFolder}/$image->img_url");
            }

            /** Set the notification as Success */
            $alert = array(
                "type" => "success",
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi.."
            );

            /** If delete statement is unsuccessful */
        } else {

            /** Set the notification as Error */
            $alert = array(
                "type" => "error",
                "title" => "İşlem Başarısız",
                "text" => "Kayıt silme işlemi esnasında bir sorun oluştu.."
            );
        }

        $this->session->set_flashdata("alert", $alert);

        /** Redirect to Module's List Page */
        redirect(base_url("product"));

    }

    public function isActiveSetter($id)
    {
        /** If the posted data is true then set the isActive variable's value 1 else set 0 */
        $isActive = ($this->input->post("data") === "true") ? 1 : 0;

        /** Update the isActive column with isActive varible's value */
        $this->product_model->update(
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

            $this->product_model->update(
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

    public function image_form($id)
    {
        $viewData = new stdClass();

        /** Taking the specific row's data from products table */
        $item = $this->product_model->get(
            array(
                "id" => $id
            )
        );

        /** Taking all images of a specific parent from the child table */
        $item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            ), "rank ASC"
        );

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $viewData->item = $item;
        $viewData->item_images = $item_images;

        /** Loading View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function image_upload($id)
    {
        /** Taking the name of uploaded file */
        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        /** CodeIgniter 'Upload Library's configuration set */
        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"] = "uploads/{$this->viewFolder}/";
        $config["file_name"] = $file_name;

        /** Load CodeIgniter 'Upload Library' */
        $this->load->library("upload", $config);

        /** Doing upload by 'do_upload' method */
        $upload = $this->upload->do_upload("file");

        /** If Upload Process is successful */
        if ($upload) {
            /** Create a Variable and set with Uploaded File's name */
            $uploaded_file = $this->upload->data("file_name");

            /** Insert reference records to child table for uploaded images */
            $this->product_image_model->add(
                array(
                    "img_url" => $uploaded_file,
                    "rank" => 0,
                    "isActive" => 1,
                    "isCover" => 0,
                    "createdAt" => date("Y-m-d H:i:s"),
                    "product_id" => $id
                )
            );

            /** If Upload Process is Unsuccesful */
        } else {
            /** Set alert with error message */
            echo "aktarım başarısız";
        }
    }

    public function refresh_image_list($id)
    {
        $viewData = new stdClass();

        /** Taking all images of a specific product from the product_images table */
        $item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            )
        );

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $viewData->item_images = $item_images;

        /** Reload Render Element View */
        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

        echo $render_html;
    }

    public function imageDelete($id, $parent_id)
    {
        /** Taking the specific row's data from products table */
        $image = $this->product_image_model->get(
            array(
                "id" => $id
            )
        );

        /** Starting Delete Statement */
        $delete = $this->product_image_model->delete(
            array(
                "id" => $id
            )
        );

        /** If Image Delete Statement is successful */
        if ($delete) {

            /** Then deleting the file physically from disk */
            unlink("uploads/{$this->viewFolder}/$image->img_url");

            /** Set the notification as Success */
            $alert = array(
                "type" => "success",
                "title" => "İşlem Başarılı",
                "text" => "Görsel başarılı bir şekilde silindi.."
            );

            /** If Image Delete Statement is Unsuccessful */
        } else {

            /** Set the notification as Error */
            $alert = array(
                "type" => "error",
                "title" => "İşlem Başarısız",
                "text" => "Görsel silme işlemi esnasında bir sorun oluştu.."
            );

        }

        $this->session->set_flashdata("alert", $alert);

        /** Redirect to Module's List Page */
        redirect(base_url("product/image_form/$parent_id"));
    }

    public function imageDeleteAll($parent_id)
    {
        /** Taking the specific row's data from products table */
        $images = $this->product_image_model->get_all(
            array(
                "product_id" => $parent_id
            )
        );

        /** Starting Delete Statement */
        $deleteAll = $this->product_image_model->delete(
            array(
                "product_id" => $parent_id
            )
        );

        /** If Image Delete Statement is successful */
        if ($deleteAll) {

            /** Deleting files physically from disk */
            foreach ($images as $image) {
                unlink("uploads/{$this->viewFolder}/$image->img_url");
            }

            /** Set the notification as Success */
            $alert = array(
                "type" => "success",
                "title" => "İşlem Başarılı",
                "text" => "Tüm görseller başarılı bir şekilde silindi.."
            );

            /** If Image Delete Statement is Unsuccessful */
        } else {

            /** Set the notification as Error */
            $alert = array(
                "type" => "error",
                "title" => "İşlem Başarısız",
                "text" => "Görsel silme işlemi esnasında bir sorun oluştu.."
            );
        }

        $this->session->set_flashdata("alert", $alert);

        /** Redirect to Module's List Page */
        redirect(base_url("product/image_form/$parent_id"));
    }

    public function isCoverSetter($id, $parent_id)
    {
        /** Check if $id and $parent_id arguments is set already */
        if ($id && $parent_id) {

            /** If the posted data is true then set the isCover variable's value 1 else set the 0 */
            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            /** Setting a record to the Cover Image */
            $this->product_image_model->update(
                array(
                    "id" => $id,
                    "product_id" => $parent_id
                ),
                array(
                    "isCover" => $isCover
                )
            );

            /** Setting the other photos are not cover image */
            $this->product_image_model->update(
                array(
                    "id !=" => $id,
                    "product_id" => $parent_id
                ),
                array(
                    "isCover" => 0
                )
            );

            $viewData = new stdClass();

            /** Taking all images of a specific product from the product_images table */
            $item_images = $this->product_image_model->get_all(
                array(
                    "product_id" => $parent_id
                ), "rank ASC"
            );

            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";
            $viewData->item_images = $item_images;

            /** Reload Render Element view */
            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

            echo $render_html;
        }
    }

    public function imageIsActiveSetter($id)
    {
        /** If the posted data is true then set the isActive variable's value 1 else set 0 */
        $isActive = ($this->input->post("data") === "true") ? 1 : 0;

        /** Update the isActive column with isActive varible's value */
        $this->product_image_model->update(
            array(
                "id" => $id,
            ),
            array(
                "isActive" => $isActive
            )
        );
    }

    public function imageRankSetter()
    {
        /** Set the values of $data array with posted data */
        $data = $this->input->post("data");

        /** Parsing values of $data array and put into the $order array */
        parse_str($data, $order);

        /** Set the values $images array with $order array and set keys as 'ord' and values as 'rank' */
        $images = $order["ord"];

        /** Update all records of the table for every index of $images array if there is a difference for rank column */
        foreach ($images as $rank => $id) {
            $this->product_image_model->update(
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