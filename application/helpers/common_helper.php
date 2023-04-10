<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function setDateTime()
{
	return date('Y-m-d H:i:s');
}
function setDatemdy()
{
	return date('m-d-Y');
}
function convertDateymd($dt)
{
	return date("Y-m-d", strtotime($dt));
}
function convertDatedmy($dt)
{
	return date("d M, y", strtotime($dt));
}

function setDateOnly()
{
	return date('Y-m-d');
}

function trans($string, $capitalizeFirstCharacter = false)
{
	$str = str_replace('_', ' ', $string);

	if (!$capitalizeFirstCharacter) {
		$str[0] = ucwords($str[0]);
	}

	return $str;
}

function encryptId($id)
{
	$ci = &get_instance();
	$key = $ci->encrypt->encode($id);
	return $key;
}

function decryptId($key)
{
	$ci = &get_instance();
	$id = $ci->encrypt->decode($key);
	return $id;
}


function removeForbiddenCharacters($str)
{
	$str = strTrim($str);
	$str = strReplace(';', '', $str);
	$str = strReplace('"', '', $str);
	$str = strReplace('$', '', $str);
	$str = strReplace('%', '', $str);
	$str = strReplace('*', '', $str);
	$str = strReplace('/', '', $str);
	$str = strReplace('\'', '', $str);
	$str = strReplace('<', '', $str);
	$str = strReplace('>', '', $str);
	$str = strReplace('=', '', $str);
	$str = strReplace('?', '', $str);
	$str = strReplace('[', '', $str);
	$str = strReplace(']', '', $str);
	$str = strReplace('\\', '', $str);
	$str = strReplace('^', '', $str);
	$str = strReplace('`', '', $str);
	$str = strReplace('{', '', $str);
	$str = strReplace('}', '', $str);
	$str = strReplace('|', '', $str);
	$str = strReplace('~', '', $str);
	$str = strReplace('+', '', $str);
	return $str;
}



function sessionId($id)
{
	$ci = &get_instance();
	return $ci->session->userdata($id);
}

function insertRow($table, $data)
{
	$ci = &get_instance();
	$clean = $ci->security->xss_clean($data);
	return $ci->db->insert($table, $clean);
}

function returnId($table, $data)
{
	$ci = &get_instance();
	$ci->db->insert($table, $data);
	return $ci->db->insert_id();
}

function randomCode($length_of_string)
{
	$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	return substr(str_shuffle($str_result), 0, $length_of_string);
}

function getRowById($table, $column, $id)
{
	$ci = &get_instance();
	$get = $ci->db->get_where($table, array($column => $id));
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function getRowByJoin($table, $jointable, $on, $column, $id)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where(array($column => $id))
		->get()
		->join($jointable, $on);
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function getSingleRowById($table, $where)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->get();
	if ($get->num_rows() > 0) {
		return $get->row_array();
	} else {
		return false;
	}
}

function getAllRow($table)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function updateRowById($table, $column, $id, $data)
{
	$ci = &get_instance();
	$clean = $ci->security->xss_clean($data);
	$query = $ci->db->where($column, $id)
		->update($table, $clean);
	return $ci->db->affected_rows();
}

function deleteRowById($table, $column, $id)
{
	$ci = &get_instance();
	$ci->db->where($column, $id);
	$ci->db->delete($table);
	if ($ci->db->affected_rows() > 0) {
		return true;
	} else {
		return $ci->db->error();
	}
}

function getRowBySum($table, $column, $where)
{
	$ci = &get_instance();
	$select = $ci->db->select_sum($column)->from($table)->where($where)->get();
	if ($select->num_rows() > 0) {
		return $select->result_array();
	} else {
		return false;
	}
}


function deleteRowMoreId($table, $where)
{
	$ci = &get_instance();
	$ci->db->where($where);
	$ci->db->delete($table);
	if ($ci->db->affected_rows() > 0) {
		return true;
	} else {
		return $ci->db->error();
	}
}

function getAllRowInOrder($table, $column, $type)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($column, $type)->get($table);
	if ($select->num_rows() > 0) {
		return $select->result_array();
	} else {
		return false;
	}
}

function getRowsByMoreIdWithOrder($table, $where, $column, $type)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($column, $type)->get_where($table, $where);
	if ($select->num_rows() > 0) {
		return $select->result_array();
	} else {
		return false;
	}
}
function getAllRowLimit($table, $start, $end)
{
	$ci = &get_instance();
	$get = $ci->db->limit($start, $end)->get($table);
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function getRowsByMoreIdWithOrderLimit($table, $where, $column, $type, $start, $end)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($column, $type)->limit($start, $end)->get_where($table, $where);
	if ($select->num_rows() > 0) {
		return $select->result_array();
	} else {
		return false;
	}
}

function getDataByIdInOrder($table, $column, $id, $orderColumn, $type)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($orderColumn, $type)->get_where($table, array($column => $id));
	return $select->result_array();
}

function getAllDataWithLimitInOrder($table, $orderColumn, $type, $start, $end)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($orderColumn, $type)->limit($start, $end)->get($table);
	return $select->result_array();
}

function getRowByMoreId($table, $where)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function getNumRows($table, $where)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->get();
	return $get->num_rows();
}

function getRowByLikeInOrder($table, $where, $like, $name, $orderBy, $orderType)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->like($like, $name, 'both')
		->order_by($orderBy, $orderType)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}


function lastReplace($search, $replace, $subject)
{
	$pos = strrpos($subject, $search);
	if ($pos !== false) {
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}
	return $subject;
}

function flashData($var, $message)
{
	$ci = &get_instance();
	return $ci->session->set_flashdata($var, $message);
}
function userData($var, $message)
{
	$ci = &get_instance();
	return $ci->session->set_userdata($var, $message);
}

function getUserId($token)
{
	$ci = &get_instance();
	$ip = $ci->input->ip_address();
	$get = $ci->db->select()
		->from('user_registration')
		->where("user_registration.user_id = '" . $token['data']->id . "' AND user_status = '1' AND unique_hash = '" . $token['data']->unique_hash . "'")
		->get();
	if ($get->num_rows() > 0) {
		return $token['data']->id;
	} else {
		return false;
	}
}



function sendWhatsapp($contact_no, $message_content)
{

	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://www.wpsenders.com/api/sendMessage",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "api_key=VEFDXGNZU3LO25BSH8KAY014T&message=" . $message_content . "&number=" . $contact_no . "&route=2&saccade=10",
		CURLOPT_HTTPHEADER => [
			"X-RapidAPI-Host: bionic-reading1.p.rapidapi.com",
			"X-RapidAPI-Key: 1c971ae42cmshe225431744954d4p1ac1dejsnbfb0e286623c",
			"content-type: application/x-www-form-urlencoded"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		return "cURL Error #:" . $err;
	} else {
		return $response;
	}
}
function setImage($image_nm, $location)
{
	if ($image_nm != '') {
		if (file_exists(FCPATH . $location . $image_nm)) {
			return base_url() . $location . $image_nm;
		} else {
			return base_url() . 'uploads/default.jpg';
		}
	} else {
		return base_url() . 'uploads/default.jpg';
	}
}
function Image_exist($image_nm)
{
	if ($image_nm != '') {
		if (file_exists(FCPATH . $image_nm)) {
			// return base_url() . $image_nm;
			return  '<img src="' . base_url() . '/' . $image_nm . '" / style="width:100%">';
		} else {
			return base_url() . $image_nm;
		}
	} else {
		return '';
	}
}

function Imgexist($image_nm)
{
	if ($image_nm != '') {
		if (file_exists(FCPATH  . $image_nm)) {
			return base_url()  . $image_nm;
		} else {
			return 'http://via.placeholder.com/700x500';
		}
	} else {
		return 'http://via.placeholder.com/700x500';
	}
}




function imageUpload($imageName, $path)
{
	$ci = &get_instance();
	$config['file_name'] = date('dm') . round(microtime(true) * 1000);
	$config['allowed_types'] = 'jpg|png|jpeg';
	$config['upload_path'] = $path;
	$target_path = $path;
	$config['remove_spaces'] = true;
	$config['overwrite'] = false;
	$ci->load->library('upload', $config);
	$ci->upload->initialize($config);
	if ($ci->upload->do_upload($imageName)) {
		$data = array('upload_data' => $ci->upload->data());
		$path = $data['upload_data']['full_path'];
		$picture = $data['upload_data']['file_name'];
		$configi['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['create_thumb'] = FALSE;
		$configi['source_image'] = $path;
		$configi['new_image'] = $target_path;
		$configi['maintain_ratio'] = TRUE;
		$configi['width'] = 380;
		$configi['height'] = 260;
		$ci->load->library('image_lib');
		$ci->image_lib->initialize($configi);
		$ci->image_lib->resize();
		return $picture;
	} else {
		return false;
	}
}

function imageUploadWithRatio($imageName, $path, $width, $height)
{
	$ci = &get_instance();
	$config['file_name'] = round(microtime(true) * 1000) . '_' . $width . 'x' . $height;
	$config['allowed_types'] = 'jpg|png|jpeg|svg';
	$config['upload_path'] = $path;
	$target_path = $path;
	// $config['remove_spaces'] = true;
	$config['overwrite'] = false;
	$ci->load->library('upload', $config);
	$ci->upload->initialize($config);
	if ($ci->upload->do_upload($imageName)) {
		$data = array('upload_data' => $ci->upload->data());
		$path = $data['upload_data']['full_path'];
		$picture = $data['upload_data']['file_name'];
		$configi['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['create_thumb'] = FALSE;
		$configi['source_image'] = $path;
		$configi['new_image'] = $target_path;
		$configi['maintain_ratio'] = TRUE;
		$configi['width'] = $width;
		$configi['height'] = $height;
		$ci->load->library('image_lib');
		$ci->image_lib->initialize($configi);
		$ci->image_lib->resize();
		return $picture;
	} else {
		return false;
	}
}

function fullImage($imageName, $path)
{
	$ci = &get_instance();
	$config['file_name'] = date('dm') . round(microtime(true) * 1000);

	$config['upload_path'] = $path;
	$target_path = $path;
	$config['remove_spaces'] = true;
	$config['overwrite'] = false;
	$ci->load->library('upload', $config);
	$ci->upload->initialize($config);
	if ($ci->upload->do_upload($imageName)) {
		$data = array('upload_data' => $ci->upload->data());
		$path = $data['upload_data']['full_path'];
		$picture = $data['upload_data']['file_name'];
		$configi['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['create_thumb'] = FALSE;
		$configi['source_image'] = $path;
		$configi['new_image'] = $target_path;
		$configi['maintain_ratio'] = TRUE;
		// $ci->load->library('image_lib');
		// $ci->image_lib->initialize($configi);
		// $ci->image_lib->resize();
		return $picture;
	} else {
		return false;
	}
}
function sendmail($to, $subject, $message)
{
	$config['protocol']    = 'smtp';
	$config['smtp_crypto'] = 'ssl';
	$config['smtp_host']    = 'mail.mmholidays.in';
	$config['smtp_port']    = '465';
	$config['smtp_timeout'] = '8';
	$config['smtp_user']    = 'contact@mmholidays.in';
	$config['smtp_pass']    = '[&0D.RA)Qbk+';
	$config['charset']    = 'utf-8';
	$config['newline']    = "\n";
	$config['mailtype'] = 'html'; // or html
	$config['validation'] = TRUE; // bool whether to validate email or not

	$ci = &get_instance();
	$ci->email->initialize($config);
	$ci->email->from('contact@mmholidays.in', 'MM holidays');
	$ci->email->to($to);
	$ci->email->cc($to);
	$ci->email->bcc($to);
	$ci->email->subject($subject);
	$ci->email->message($message);
	$ci->email->send();
}
function single_tour($itinerary_row)
{
	$loc = getSingleRowById('location', array('loc_id' => $itinerary_row['region']));
?>
	<div class="col-lg-4 col-md-6 mar-bottom-30">
		<div class="trend-item">
			<div class="trend-image">
				<img src="<?= base_url() ?>uploads/itinerary/<?= $itinerary_row['image']  ?>" class="responsive" alt="<?= $itinerary_row['title']  ?>" />
				<div class="trend-price">
					<p class="price">From <span>₹<?= $itinerary_row['nprice']  ?>/-</span></p>
				</div>
			</div>
			<div class="trend-content">
				<p><i class="flaticon-location-pin"></i> <?= $loc['location']  ?></p>
				<h4><a href="<?= base_url() ?>itinerary-<?= $itinerary_row['url_title'] ?>"><?= $itinerary_row['title'] ?></a></h4>

				<p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $itinerary_row['day']  ?> days & <?= $itinerary_row['night']  ?> night</p>
			</div>
		</div>
	</div>
<?php
}

function registermail($username, $password)
{
	return '<!DOCTYPE HTML
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office" style="line-height: inherit;">
<head style="line-height: inherit;">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" style="line-height: inherit;">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" style="line-height: inherit;">
  <meta name="x-apple-disable-message-reformatting" style="line-height: inherit;">
  <!--[if !mso]><!-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" style="line-height: inherit;">
  <!--<![endif]-->
  <title style="line-height: inherit;"></title>
</head>
<body class="clean-body"
  style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #7e8c8d;color: #000000;line-height: inherit;">
  <!--[if IE]><div class="ie-container"><![endif]-->
  <!--[if mso]><div class="mso-container"><![endif]-->
  <table
    style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;margin: 0 auto;background-color: #7e8c8d;width: 100%;line-height: inherit;color: #000000;"
    cellpadding="0" cellspacing="0">
    <tbody style="line-height: inherit;">
      <tr style="vertical-align: top;line-height: inherit;border-collapse: collapse;">
        <td>
          <div class="u-row-container" style="padding: 20px 0px 0px 0px;background-color: transparent;line-height: inherit;">
            <div class="u-row"
              style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f4f4f4;line-height: inherit;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;line-height: inherit;">
                <div class="u-col u-col-100"
                  style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;line-height: inherit;">
                      <!--<![endif]-->
                      <table
                        style="font-family: arial,helvetica,sans-serif;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse; padding-top:15px"
                        role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody style="line-height: inherit;">
                          <tr style="line-height: inherit;vertical-align: top;border-collapse: collapse;">
                            <td class="v-container-padding-padding"
                              style="overflow-wrap: break-word;word-break: break-word;padding: 10px;font-family: arial,helvetica,sans-serif;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;"
                              align="left">
                              <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;">
                                <tr style="line-height: inherit;vertical-align: top;border-collapse: collapse;">
                                  <td class="v-text-align"
                                    style="padding-right: 0px;padding-left: 0px;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;"
                                    align="center">
                                    <a href="' . base_url() . '" target="_blank"
                                      style="line-height: inherit;color: #0000ee;text-decoration: underline;">
                                      <img align="center" border="0"
                                        src="' . base_url() . 'assets/images/logo-black.png"
                                        alt="MM Holidays" title="MM Holidays"
                                        style="width: 200px; object-fit: contain;"
                                        class="v-src-width v-src-max-width">
                                    </a>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="u-row-container" style="padding: 0px;background-color: transparent;line-height: inherit;">
            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #046472;line-height: inherit;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;line-height: inherit;">
                <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">

                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;line-height: inherit;">

                      <table style="font-family: arial,helvetica,sans-serif;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody style="line-height: inherit;">
                          <tr style="line-height: inherit;vertical-align: top;border-collapse: collapse;">
                            <td class="v-container-padding-padding" style="overflow-wrap: break-word;word-break: break-word;padding: 10px 30px;font-family: arial,helvetica,sans-serif;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;"
                              align="left">

                              <div class="v-text-align" style="color: #e9e9e9; line-height: 210%; text-align: center; word-wrap: break-word;">
                                <p style="font-size: 14px;line-height: 210%;margin: 0;"><span style="color: #f1c40f; font-size: 14px; line-height: 29.4px;"><strong style="line-height: inherit;"><span style="font-size: 34px; line-height: 71.4px;">Welcome MM holidays</span></strong></span>
                                </p>
                                 <p style="line-height: 140%;font-size: 14px;margin: 0;"><span
                                    style="font-size: 14px; font-family: "arial black", "avant garde", arial; line-height: 19.6px;"><strong
                                      style="line-height: inherit;">We\'re truely dedicated to make your travel experiences as much simple and fun as possible</strong></span><br style="line-height: inherit;"><span
                                    style="line-height: 19.6px; font-size: 14px;"></span></p>
                                <p style="font-size: 14px;line-height: 210%;margin: 0;">
                                  Congratulations.
                                  We are excited to have you onboard.
                                  <br>
                                  Lets get you started
                                  Find the login credentials below -<br style="line-height: inherit; color:white">User name : <b> ' . $username . '</b>
                                 <br style="line-height: inherit; color:white">OTP <b>:  ' . $password . '</b>
                                  <br>
                                  We are excited for the journey we would travel together.
                                  <br>
                                  We are Proud to have you <br>
                                  Keep Sharing : <a href="' . base_url() . '" style="color: #f1c40f"> ' . base_url() . '</a><br>
                                  #MMholidays <br><br>
                                  MMholidays</strong>
                                </p>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>

</body>

</html>';
}
function otpmail($otp)
{
	return '<!DOCTYPE HTML
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office" style="line-height: inherit;">
<head style="line-height: inherit;">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" style="line-height: inherit;">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" style="line-height: inherit;">
  <meta name="x-apple-disable-message-reformatting" style="line-height: inherit;">
  <!--[if !mso]><!-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" style="line-height: inherit;">
  <!--<![endif]-->
  <title style="line-height: inherit;"></title>
</head>
<body class="clean-body"
  style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #7e8c8d;color: #000000;line-height: inherit;">
  <!--[if IE]><div class="ie-container"><![endif]-->
  <!--[if mso]><div class="mso-container"><![endif]-->
  <table
    style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;margin: 0 auto;background-color: #7e8c8d;width: 100%;line-height: inherit;color: #000000;"
    cellpadding="0" cellspacing="0">
    <tbody style="line-height: inherit;">
      <tr style="vertical-align: top;line-height: inherit;border-collapse: collapse;">
        <td>
          <div class="u-row-container" style="padding: 20px 0px 0px 0px;background-color: transparent;line-height: inherit;">
            <div class="u-row"
              style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f4f4f4;line-height: inherit;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;line-height: inherit;">
                <div class="u-col u-col-100"
                  style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;line-height: inherit;">
                      <!--<![endif]-->
                      <table
                        style="font-family: arial,helvetica,sans-serif;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse; padding-top:15px"
                        role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody style="line-height: inherit;">
                          <tr style="line-height: inherit;vertical-align: top;border-collapse: collapse;">
                            <td class="v-container-padding-padding"
                              style="overflow-wrap: break-word;word-break: break-word;padding: 10px;font-family: arial,helvetica,sans-serif;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;"
                              align="left">
                              <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;">
                                <tr style="line-height: inherit;vertical-align: top;border-collapse: collapse;">
                                  <td class="v-text-align"
                                    style="padding-right: 0px;padding-left: 0px;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;"
                                    align="center">
                                    <a href="' . base_url() . '" target="_blank"
                                      style="line-height: inherit;color: #0000ee;text-decoration: underline;">
                                      <img align="center" border="0"
                                        src="' . base_url() . 'assets/images/logo-black.png"
                                        alt="MM Holidays" title="MM Holidays"
                                        style="width: 200px; object-fit: contain;"
                                        class="v-src-width v-src-max-width">
                                    </a>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="u-row-container" style="padding: 0px;background-color: transparent;line-height: inherit;">
            <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #046472;line-height: inherit;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;line-height: inherit;">
                <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;line-height: inherit;">
                  <div style="width: 100% !important;line-height: inherit;">

                    <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;line-height: inherit;">

                      <table style="font-family: arial,helvetica,sans-serif;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody style="line-height: inherit;">
                          <tr style="line-height: inherit;vertical-align: top;border-collapse: collapse;">
                            <td class="v-container-padding-padding" style="overflow-wrap: break-word;word-break: break-word;padding: 10px 30px;font-family: arial,helvetica,sans-serif;line-height: inherit;color: #000000;vertical-align: top;border-collapse: collapse;"
                              align="left">

                              <div class="v-text-align" style="color: #e9e9e9; line-height: 210%; text-align: center; word-wrap: break-word;">
                                <p style="font-size: 14px;line-height: 210%;margin: 0;"><span style="color: #f1c40f; font-size: 14px; line-height: 29.4px;"><strong style="line-height: inherit;"><span style="font-size: 34px; line-height: 71.4px;">Welcome MM holidays</span></strong></span>
                                </p>
                                 <p style="line-height: 140%;font-size: 14px;margin: 0;"><span
                                    style="font-size: 14px; font-family: "arial black", "avant garde", arial; line-height: 19.6px;"><strong
                                      style="line-height: inherit;">We\'re truely dedicated to make your travel experiences as much simple and fun as possible</strong></span><br style="line-height: inherit;"><span
                                    style="line-height: 19.6px; font-size: 14px;"></span></p>
                                <p style="font-size: 14px;line-height: 210%;margin: 0;">
                                  Congratulations.
                                  We are excited to have you onboard.
                                  <br>
                                  Lets get you started
                                  Find the OTP below -<br style="line-height: inherit; color:white">
                                 <br style="line-height: inherit; color:white">OTP <b>:  ' . $otp . '</b>
                                  <br>

                                  We are Proud to have you <br>
                                  Keep Sharing : <a href="' . base_url() . '" style="color: #f1c40f"> ' . base_url() . '</a><br>
                                  #MMholidays <br><br>
                                  MMholidays</strong>
                                </p>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>

</body>

</html>';
}
function characterLimiter($str, $limit, $endChar = '')
{
	if (!empty($str) && strlen($str) > $limit) {
		return mb_strimwidth($str, 0, $limit + 3, $endChar);
	}
	return $str;
}

function translate($text)
{
	$from_lan = 'hi';
	$to_lan = 'en';

	$json = json_decode(file_get_contents("https://translate.googleapis.com/translate_a/single?client=gtx&sl=" . $from_lan . "&tl=" . $to_lan . "&dt=t&q=" . urlencode($text)), true);

	return strtolower($json[0][0][0]);
}

function mailmsg($to, $subject, $message)
{
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: '.PROJECT_EMAIL."\r\n";
	$headers .= 'Cc: '. $to . "\r\n";

	$send = mail($to, $subject, $message, $headers);
}




