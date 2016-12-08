<?php  

/**
 * Function Name
 *
 * Function description
 *
 * @access	public
 * @param	type	name
 * @return	type	
 */
 
if (! function_exists('show_month'))
{
	function show_month($month = NULL)
	{
		if ($month == NULL) {
			return FALSE;
		}

		$month_name = array(
						"01" => 'Januari',
						"02" => 'Februari',
						"03" => 'Maret',
						"04" => 'April',
						"05" => 'Mei',
						"06" => 'Juni',
						"07" => 'Juli',
						"08" => 'Agustus',
						"09" => 'September',
						"10" => 'Oktober',
						"11" => 'November',
						"12" => 'Desember'
					);
		return $month_name[$month];
	}

}

if (! function_exists('tgl_indo')) {
	
	function tgl_indo($tgl)
	{
		$d = substr($tgl, 8, 2);
		$b = show_month(substr($tgl, 5, 2));
		$t = substr($tgl, 0, 4);

		return $d." ".$b." ".$t;
	}
}

?>