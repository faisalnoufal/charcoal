<?php


class Cleanup extends Core_Controller {

    function __construct() {
        parent::__construct();
    }

    function Clean_up() {
        $title = 'Cleanup';
        $this->set('title', $title);
        $res = $this->Cleanup_model->clean();
        if ($res) {
            $msg ='Cleanup done successfully';
            $this->redirect($msg, "Home/index", TRUE);
        } else {
            $msg = 'Clean up failed try_again';
            $this->redirect($msg, "Home/index", FALSE);
        }
    }

}

?>