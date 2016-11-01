<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mobile extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

        $this->load->database();

        $this->load->model('mobilemodel');
    }

    public function index() {

    }

    public function getStoryPlace( $storyIdx ) {

        $datenum = $this->mobilemodel->getMaxDateNum($storyIdx);

        $data = array();

        for($i = 1; $i <= (int)$datenum['maxnum']; $i++) {
            $tempQuery = $this->mobilemodel->getPlaceInfoByStoryIdxAndDateNum($storyIdx, $i);

            $iCount = 0;
            foreach( $tempQuery as $row ) {
              $data[$i][$iCount] = $row;
              $iCount++;
            }

            // for($ii = 0; $ii < count($tempQuery); $ii++) {
            //     mysqli_data_seek($tempQuery, $ii);
            //     $data[$i][$ii] = mysqli_fetch_array($tempQuery);
            // }
        }
        //var_dump($data);
        //var_dump($tempQuery);

        //$result = array('data' => $data);
        print(json_encode($data,JSON_UNESCAPED_UNICODE));
    }

    public function SearchPlace($lat, $lon, $category, $range) {
        $searchedPlace = $this->mobilemodel->getPlaceInfoByLatLngAndRange($lat, $lon, $category, $range);

        $data = array();
        $i = 0;
        foreach ($searchedPlace as $row) {
          $data[$i] = $row;
          $i++;
        }

        print(json_encode($data,JSON_UNESCAPED_UNICODE));
    }


}
