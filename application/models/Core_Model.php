<?php

class Core_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function begin() {
        // mysql_query("BEGIN");
        $this->db->trans_start();
    }

    public function commit() {
        //mysql_query("commit");
        $this->db->trans_commit();
    }

    public function rollBack() {
        //mysql_query("rollback");
        $this->db->trans_rollback();
    }

    public function getWritelock($tables_arr) {
        mysql_query("LOCK TABLES mytest WRITE;");
    }

    public function getReadlock($tables_arr) {
        mysql_query("LOCK TABLES mytest READ;");
    }

}
