<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "product_v";

        /** Load Models */
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
        $this->form_validation->set_rules("title", "Başlık", "trim|required");

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı boş bırakılamaz..."
            )
        );

        /** Run Form Validation */
        $validate = $this->form_validation->run();

        /** If Validation Successful */
        if ($validate) {
            /** Start Insert Statement */

            $insert = $this->product_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

            /** If Insert Statement Succesful */
            if ($insert){

                /** Redirect to Module's List Page */
                redirect(base_url("product"));

            /** If Insert Statement Unsuccessful */
            } else {

                /** Redirect to Module's List Page */
                redirect(base_url("product"));

            }

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
        $item = $this->product_model->get(
            array(
                "id"        => $id
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
        $this->form_validation->set_rules("title", "Başlık", "trim|required");

        /** Translate Validation Messages */
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı boş bırakılamaz..."
            )
        );

        /** Run Form Validation */
        $validate = $this->form_validation->run();

        /** If Validation Successful */
        if ($validate) {
            /** Start Update Statement */

            $update = $this->product_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSEO($this->input->post("title")),
                )
            );

            /** If Update Statement is Succesful */
            if ($update){

                /** Redirect to Module's List Page */
                redirect(base_url("product"));

                /** If Update Statement Unsuccessful */
            } else {

                /** Redirect to Module's List Page */
                redirect(base_url("product"));

            }

            /** If Validation is Unsuccessful */
        } else {
            /** Reload View and Show Error Messages Below the Inputs */
            $viewData = new stdClass();

            /** Taking the specific row's data from the table */
            $item = $this->product_model->get(
                array(
                    "id"        => $id
                )
            );

            /** Defining data to be sent to view */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->item = $item;
            $viewData->form_error = true;

            /** Reload View */
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id)
    {
        /** Starting Delete Statement */

        $delete = $this->product_model->delete(
            array(
                "id"    => $id
            )
        );

        /** If Delete Statement Succesful */
        if ($delete){

            /** Redirect to Module's List Page */
            redirect(base_url("product"));

            /** If Delete Statement Unsuccessful */
        } else {

            /** Redirect to Module's List Page */
            redirect(base_url("product"));

        }
    }

    public function isActiveSetter($id)
    {
        $isActive = ($this->input->post("data") === "true") ? 1 : 0;

        $this->product_model->update(
            array(
                "id"        => $id
            ),
            array(
                "isActive"  => $isActive
            )
        );
    }

    public function rankSetter()
    {
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id)
        {
            $this->product_model->update(
                array(
                    "id"    => $id,
                    "rank!="  => $rank
                ),
                array(
                    "rank"  => $rank
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
                "id"        => $id
            )
        );

        /** Taking all images of a specific product from the product_images table */
        $item_images = $this->product_image_model->get_all(
            array(
                "product_id"        => $id
            )
        );

        /** Defining data to be sent to view */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $viewData->item = $item;
        $viewData->item_images = $item_images;

        /** Load View */
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function image_upload($id)
    {
        /** Taking the name of uploaded file */
        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        /** CodeIgniter 'Upload Library's configuration set */
        $config["allowed_types"]    = "jpg|jpeg|png";
        $config["upload_path"]      = "uploads/{$this->viewFolder}/";
        $config["file_name"]        = $file_name;

        /** Load CodeIgniter 'Upload Library' */
        $this->load->library("upload", $config);

        /** Doing upload by 'do_upload' method */
        $upload = $this->upload->do_upload("file");

        /** If Upload Process is Succesful */
        if ($upload)
        {
            /** Create a Variable and set with Uploaded File's name */
            $uploaded_file = $this->upload->data("file_name");

            /** Insert Reference Records to product_images Table for uploaded photos */
            $this->product_image_model->add(
                array(
                    "img_url"       => $uploaded_file,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "isCover"       => 0,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "product_id"    => $id
                )
            );

        /** If Upload Process is Unsuccesful */
        } else {
            /** Set Alert with Error Message */
            echo "aktarım başarısız";
        }
    }

    public function refresh_image_list($id)
    {
        $viewData = new stdClass();

        /** Taking all images of a specific product from the product_images table */
        $item_images = $this->product_image_model->get_all(
            array(
                "product_id"        => $id
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

    public function isCoverSetter($id, $parent_id)
    {
        if ($id && $parent_id) {

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            $this->product_image_model->update(
                array(
                    "id"            => $id,
                    "product_id"    => $parent_id
                ),
                array(
                    "isCover" => $isCover
                )
            );
        }
    }

    public function imageIsActiveSetter($id)
    {
        $isActive = ($this->input->post("data") === "true") ? 1 : 0;

        $this->product_image_model->update(
            array(
                "id"        => $id,
            ),
            array(
                "isActive"  => $isActive
            )
        );
    }

}