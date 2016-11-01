<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('todo_m');
		$this->load->helper(array('url', 'date'));
	}

	public function index() {
		$this->lists();
	}

	// 전체 게시글 보기
	public function lists() {
		$data['list'] = $this->todo_m->get_list();
		$this->load->view('todo/list_v', $data);
	}

	// 특정 게시글 보기
	function view() {
		$id = $this->uri->segment(3);
		$data['views'] = $this->todo_m->get_view($id);
		$this->load->view('todo/view_v', $data);
	}

	// 새로운 게시글 입력
	function write() {
		if ($_POST) {
			$writeInfo['content'] = $this->input->post('content', TRUE);
			$writeInfo['created_on'] = $this->input->post('created_on', TRUE);
			$writeInfo['due_date'] = $this->input->post('due_date', TRUE);
			$writeInfo['use'] = NULL;

			$this->todo_m->insert_todo($writeInfo);
			redirect('/main/lists/');
			exit;
		} else {
			$this->load->view('todo/write_v');
		}
	}

	// 특정 게시글 삭제
	function delete() {
		$id = $this->uri->segment(3);
		$this->todo_m->delete_todo($id);
		redirect('/main/lists/');
	}

	// 특정 게시글 수정
	function modify() {
		if ($_POST) {
			$id = $this->uri->segment(3);
			$modifyInfo['content'] = $this->input->post('content', TRUE);
			$modifyInfo['created_on'] = $this->input->post('created_on', TRUE);
			$modifyInfo['due_date'] = $this->input->post('due_date', TRUE);
			$modifyInfo['use'] = NULL;

			$this->todo_m->update_todo($id, $modifyInfo);
			redirect('/main/lists/');
			exit;
		} else {
			$id = $this->uri->segment(3);
			$data['views'] = $this->todo_m->get_view($id);
			$this->load->view('todo/modify_v', $data);
		}
	}
}
