<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stores extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (! $this->user) {
            redirect('login');
        }
    }

    public function add()
    {
        date_default_timezone_set($this->setting->timezone);
        $date = date("Y-m-d H:i:s");
        $_POST['created_at'] = $date;
        $store = Store::create($_POST);
        redirect("/settings?tab=stores", "location");
    }

    public function edit($id = FALSE)
    {
        if ($_POST) {
            $store = Store::find($id);
            $store->update_attributes($_POST);
            redirect("/settings?tab=stores", "location");
        } else {
            $this->view_data['store'] = Store::find($id);
            $this->content_view = 'setting/modifyStore';
        }
    }

    public function delete($id)
    {
        $store = Store::find($id);
        $store->delete();
        redirect("/settings?tab=stores", "location");
    }
}
