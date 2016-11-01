<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class todo_m extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    // 전체 레코드 선택
    function get_list() {
        $sql = "SELECT * FROM items";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    // 특정 레코드 선택
    function get_view($id) {
        $sql = "SELECT * FROM items WHERE id = '".$id."'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    // 새로운 게시글 입력
    function insert_todo($writeInfo) {
        $this->db->insert('items', $writeInfo);
    }

    // 특정 게시글 삭제
    function delete_todo($id) {
        $sql = "DELETE FROM items WHERE id = '".$id."'";
        $this->db->query($sql);
    }

    // 특정 게시글 수정
    function update_todo($id, $modifyInfo) {
        $this->db->where('id', $id);
        $this->db->update('items', $modifyInfo);
    }
}