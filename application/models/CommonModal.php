<?php

class CommonModal extends CI_Model
{
  public function insertRow($table, $post)
  {
    $clean_post = $this->security->xss_clean($post);
    return $this->db->insert($table, $clean_post);
  }

  function insertRowReturnId($table, $post)
  {
    $clean_post = $this->security->xss_clean($post);
    $this->db->insert($table, $clean_post);
    return $this->db->insert_id();
  }

  function insertRowReturnIdWithClean($table, $post)
  {
    $this->db->insert($table, $post);
    return $this->db->insert_id();
  }

  function insertRowInBatch($table, $post)
  {
    $clean_post = $this->security->xss_clean($post);
    return $this->db->insert_batch($table, $clean_post);
  }

  function updateRowById($table, $column, $id, $data)
  {
    $clean_post = $this->security->xss_clean($data);
    $this->db
      ->set($clean_post)
      ->where($column, $id)
      ->update($table);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function updateRowByMoreId($table, $where, $data)
  {
    $clean_post = $this->security->xss_clean($data);
    $this->db
      ->set($clean_post)
      ->where($where)
      ->update($table);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function getAllRows($table)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }


  function GetRowByDistinct($table, $column, $where, $orderColumn, $orderType)
  {
    $get = $this->db
      ->select($column)
      ->DISTINCT($column)
      ->from($table)
      ->where($where)
      ->order_by($orderColumn, $orderType)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }
  public function getAllRowsInOrder($table, $orderColumn, $orderType)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->order_by($orderColumn, $orderType)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }
  public function getAllRowsLimit($table, $limit)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->limit($limit)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }
  public function getAllRowsLimitByOrder($table, $limit, $orderColumn, $orderType)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->order_by($orderColumn, $orderType)
      ->limit($limit)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }
  public function getRowById($table, $column, $id)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->where($column, $id)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }

  public function getRowByOrwhere($table, $where, $where_or)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->where($where)
      ->where($where_or)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }

  public function getRowByIdInOrder($table, $where, $orderColumn, $orderType)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->where($where)
      ->order_by($orderColumn, $orderType)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }

  public function getRowByIdInOrderOrwhere(
    $table,
    $where,
    $orwhere,
    $orderColumn,
    $orderType
  ) {
    $get = $this->db
      ->select()
      ->from($table)
      ->where($where)
      ->or_where($where)
      ->order_by($orderColumn, $orderType)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }

  public function getRowByMoreIdOrder($table, $where, $orderColumn, $orderType)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->where($where)
      ->order_by($orderColumn, $orderType)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }
  public function getRowByMoreIdOrderLimit($table, $where, $orderColumn, $orderType, $limit)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->where($where)
      ->order_by($orderColumn, $orderType)
      ->limit($limit)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }
  function getAllDataWithLimitInOrder($table, $where, $start, $end)
  {
    $get = $this->db->select()
      ->from($table)
      ->where($where)
      ->limit($start, $end)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }

  public function runQuery($query)
  {
    $query = $this->db->query($query);
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  function GetRowBySum($table, $column, $where)
  {
    $get = $this->db
      ->select()
      ->SUM($column)
      ->from($table)
      ->where($where)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }

  public function getRowByIdGroup($table, $where, $groupColumn)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->where($where)
      ->group_by($groupColumn)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }

  public function getRowGroupwithlimit($table, $groupColumn, $limit)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->group_by($groupColumn)
      ->limit($limit)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }

  public function getRowByMoreId($table, $where)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->where($where)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }

  public function getSingleRowById($table, $where)
  {
    $get = $this->db
      ->select()
      ->from($table)
      ->where($where)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->row_array();
    } else {
      return false;
    }
  }

  public function deleteRowById($table, $where)
  {
    return $this->db->where($where)->delete($table);
  }

  public function getNumRow($table)
	{
		$ci = &get_instance();
		$get = $ci->db->select()
			->from($table)
			->get();
		return $get->num_rows();
	}

  public function getNumRows($table, $where)
  {
    $ci = &get_instance();
    $get = $ci->db
      ->select()
      ->from($table)
      ->where($where)
      ->get();
    return $get->num_rows();
  }

  public function getColumnById($selectColumn, $table, $where)
  {
    $get = $this->db
      ->select($selectColumn)
      ->from($table)
      ->where($where)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->row_array();
    } else {
      return false;
    }
  }

  public function getRowByLikeInOrder(
    $table,
    $where,
    $like,
    $name,
    $orderBy,
    $orderType
  ) {
    $ci = &get_instance();
    $get = $ci->db
      ->select()
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
  public function getRowByIn($table, $where, $name, $orderBy, $orderType)
  {
    $ci = &get_instance();
    $get = $ci->db
      ->select()
      ->from($table)
      ->where_in($name, $where)
      ->order_by($orderBy, $orderType)
      ->get();
    if ($get->num_rows() > 0) {
      return $get->result_array();
    } else {
      return false;
    }
  }
  function getAllEntry($postData = null)
  {

    $start = $postData['start'];
    $rowperpage = $postData['length'];
    $columnIndex = $postData['order'][0]['column'];
    $columnName = $postData['columns'][$columnIndex]['data'];
    $columnSortOrder = $postData['order'][0]['dir'] == 'asc' ? 'DESC' : 'ASC';
    $searchValue = $postData['search']['value'];

    ## Search
    $searchQuery = "";
    if ($searchValue != '') {
      $searchQuery = " (pname like '%" . $searchValue . "%' || pcontact like '%" . $searchValue . "%')";
    }

    ## Total number of records without filtering
    $this->db->select('count(*) as allcount');
    $records = $this->db->get('patient_record')->result();
    $totalRecords = $records[0]->allcount;

    ## Total number of record with filtering
    $this->db->select('count(*) as allcount');
    if ($searchQuery != '')
      $this->db->where($searchQuery);
    $records = $this->db->get('patient_record')->result();
    $totalRecordwithFilter = $records[0]->allcount;

    ## Fetch records
    $this->db->select('*');
    if ($searchQuery != '')
      $this->db->where($searchQuery);
    $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage, $start);
    $records = $this->db->get('patient_record')->result_array();

    return   ['records' => $records, 'totalRecords' => $totalRecords, 'totalRecordwithFilter' => $totalRecordwithFilter];
  }
}
