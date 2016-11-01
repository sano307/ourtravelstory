<?php
class Mobilemodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getMaxDateNum($storyIdx) {
        $sql = "SELECT MAX(StoryPlaceDateNumber) maxnum FROM storyplace WHERE StoryIdx = $storyIdx";
        return $this->db->query($sql)->row_array();
    }

/** ara hansu e placeimage SI ga bba zyu it um... hangul an dem... SI.PlaceIdx rul na zung e WHERE zel e chuga shikiza **/

    public function getPlaceInfoByStoryIdxAndDateNum( $storyIdx, $dateNum ) {
        $sql = "SELECT * FROM place P, storyplace SP WHERE (P.PlaceIdx = SP.PlaceIdx) AND SP.StoryIdx = $storyIdx AND StoryPlaceDateNumber = $dateNum ORDER BY SP.StoryPlaceStartTime";
//SELECT * FROM place P, storyplace SP WHERE (P.PlaceIdx = SP.PlaceIdx) AND SP.StoryIdx = $storyIdx;
        return $this->db->query($sql)->result();
    }

    public function getPlaceInfoByLatLngAndRange($lat, $lon, $category, $range) {
        // distance gyesan...
        $PI = 3.14159265359;
        $rad = $PI / 180;
        $range_lat = ($range / 6378137) / $rad; // 6378137 : earth's circumference
        $range_lon = $range_lat / cos($range_lat * $rad);
        // sql query....
        $min_lat = $lat - $range_lat;
        $max_lat = $lat + $range_lat;
        $min_lon = $lon - $range_lon;
        $max_lon = $lon + $range_lon;

        $query = "SELECT * FROM place WHERE (PlaceLatitude BETWEEN $min_lat AND $max_lat) AND (PlaceLongtitude BETWEEN $min_lon AND $max_lon) AND CategoryPlaceIdx = '$category'";
        // $query = "SELECT * FROM place WHERE CategoryPlaceIdx = '$category'";

        return $this->db->query($query)->result();
    }
}

?>
