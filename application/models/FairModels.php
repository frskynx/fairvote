<?php
class FairModels extends CI_Model{

  public function create($table, $dataVote){
        return $this->db->insert($table, $dataVote);
  }

  public function readWhere($table, ...$conditions) {
    $array = array();
    for ($i = 0; $i < count($conditions); $i += 2) {
        $condition = $conditions[$i];
        $comparison = $conditions[$i + 1];
        $array[$condition] = $comparison;
    }
    return $this->db->get_where($table, $array);
  }

  public function updateWhare($tabel, $data, $condition, $comparison){
    $this->db->where($condition, $comparison);
    $this->db->update($tabel, $data);
  }

  public function deleteWhere($tabel, $condition, $comparation){
    $this->db->delete($tabel, array($condition => $comparation));
}

  public function getHistoryWithDetails($username) {
    $this->db->select('history.*, vote.vote_name, vote.user_name_vote, option.option, option.description');
    $this->db->from('history');
    $this->db->join('vote', 'history.share_code_history = vote.share_code');
    $this->db->join('option', 'history.id_option = option.id_option');
    $this->db->where('history.username_history', $username);
    return $this->db->get()->result_array();
  }
}