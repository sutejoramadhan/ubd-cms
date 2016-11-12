<?php
/**
 * @Author: sutejoramadhan
 * @Date:   2016-11-12 11:45:42
 * @Last Modified by:   sutejoramadhan
 * @Last Modified time: 2016-11-12 11:47:15
 */
defined('BASEPATH') OR exit('No direct script access allowed');

function tanggalIndo($date) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", 
    	"November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return($result);
}

function bulanIndo($bulan) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", 
        "November", "Desember");

    echo strtoupper($BulanIndo[(int) $bulan - 1]);
}