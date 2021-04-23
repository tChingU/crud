<?php
class Account_info_model extends CI_model{

    function get_list() {
        // SELECT * FROM account_info;
        $query =  $this->db->get('account_info');
        return $query->result_array();
    }

    function create($form_arr) {
        // INSERT INTO account_info (account, name, gender, birthday, email, note) values (?, ?, ?, ?, ?, ?);
        $this->db->insert('account_info', $form_arr);
    }

    function get_single_user($user_id) {
        //SELECT * FROM account_info WHERE user_id = ?
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('account_info');
        return $query->row_array();
    }

    function update_user($user_id, $form_arr) {
        //UPDATE account_info SET (account = ?, name = ?, gender = ?, birthday = ?, email = ?, note = ?) WHERE user_id = ?
        $this->db->where('user_id', $user_id);
        $this->db->update('account_info', $form_arr);
    }

    function delete_user($user_id) {
        //DELETE FROM account_info WHERE user_id = ?
        $this->db->where('user_id', $user_id);
        $this->db->delete('account_info');
    }
}
?>