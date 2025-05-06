<?php
require(APPPATH . 'third_party/fpdf/fpdf.php');

class Fpdf_lib extends FPDF {
    public function __construct() {
        parent::__construct();
    }
}
