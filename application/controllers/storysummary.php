<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Storysummary extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('ourtravelstory_m');
        $this->load->helper(array('url', 'date'));
    }

    public function index()
    {
        $this->load->view('../views/public/header.php');
        $this->load->view('../views/main/storySummary.php');
        $this->load->view('../views/public/footer.php');

    }
    public function storySummary($storyIdx, $storyDate, $storyplaceIdx)
    {

        $StoryInfo = $this->ourtravelstory_m->get_StoryInfo($storyIdx);
        $StoryCompanion = $this->ourtravelstory_m->get_StoryCompanion($storyIdx);
        $StoryPlaceReply = $this->ourtravelstory_m->get_StoryPlaceReply($storyplaceIdx);                                 //각각의 장소별 리플
        $StoryDate = $this->ourtravelstory_m->get_StoryDate($storyIdx);
        $StoryPlaceInfo = $this->ourtravelstory_m->get_StoryPlaceInfo($storyIdx,$storyDate);
        $StoryGood = $this->ourtravelstory_m->get_StoryGood($storyIdx);
        $StorySliderImage = $this->ourtravelstory_m->get_StorySliderImage($storyIdx);
        $StoryReply = $this->ourtravelstory_m->get_StoryReply($storyIdx);

        $this->load->view('/public/header');
        $this->load->view('/main/storySummary', array('storyIdx' => $storyIdx,'StoryPlaceIdx' => $storyplaceIdx,'StoryInfo' => $StoryInfo,'StoryCompanion' => $StoryCompanion,'StoryDate' => $StoryDate,'StoryPlaceInfo' => $StoryPlaceInfo,'StoryGood' => $StoryGood, 'StoryNowDate' => $storyDate, 'StorySliderImage' => $StorySliderImage, 'StoryReply' => $StoryReply, 'StoryPlaceReply' => $StoryPlaceReply));
        $this->load->view('/public/footer');
    }
    public function storyAlbum($storyIdx, $storyDate, $storyplaceIdx)
    {

        $this->load->view('/public/header');
        $this->load->view('/main/storyAlbum');
        $this->load->view('/public/footer');
    }
    public function addStoryReply(){
        $result = array();
        $callback=$_GET['callback'];
        $reply_content = $_GET['reply_content'];
        $user_id= $_GET['user_id'];
        $story_id= $_GET['story_id'];

//여기부터 DB쿼리 제작부터 시작
        $this->ourtravelstory_m->get_StoryReplyInsert($user_id,$reply_content,$story_id);
        $reply = $this->ourtravelstory_m->get_StoryReply($story_id);

        $result=array('result'=>$reply);

        echo $callback."(".json_encode($result).")";
    }
    public function addPlaceReply(){
        $result = array();
        $callback=$_GET['callback'];
        $reply_content = $_GET['reply_content'];
        $user_id= $_GET['user_id'];
        $place_id= $_GET['place_id'];

        $this->ourtravelstory_m->get_StoryPlaceReplyInsert($user_id,$reply_content,$place_id);
        $reply = $this->ourtravelstory_m->get_StoryPlaceReply($place_id);

        $result=array('result'=>$reply);

        echo $callback."(".json_encode($result).")";
    }

}
?>
