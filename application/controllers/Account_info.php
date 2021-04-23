<?php
class Account_info extends CI_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Account_info_model');
    }

    function index() {
        $account_list = $this->Account_info_model->get_list();
        foreach($account_list as $key => &$value) {
            $value['gender'] = ($value['gender'] == 1) ? '男' : '女';
            $value['birthday'] = date('Y年n月j日', strtotime($value['birthday']));    
        }

        $data = array();
        $data['account_info'] = $account_list; 

        $this->load->view('list', $data);
    }

    function create() {
        $config = $this->set_validation_rule();
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $this->load->view('create');
        } else {
            $form_arr = array();
            $form_arr['account'] = $this->input->post('account');
            $form_arr['name'] = $this->input->post('name');
            $form_arr['gender'] = ($this->input->post('gender') == '男') ? 1 : 0;
            $form_arr['birthday'] = $this->input->post('birthday');
            $form_arr['email'] = $this->input->post('email');
            $form_arr['note'] = $this->input->post('note');
            
            $this->Account_info_model->create($form_arr);
            $this->session->set_flashdata('success', '建立成功');
            redirect(base_url().'index.php/account_info/index');
        }
    }

    function edit($user_id) {
        $config = $this->set_validation_rule();
        $this->form_validation->set_rules($config);
        
        $data = array();
        $data['user'] = $this->Account_info_model->get_single_user($user_id);

        if ($this->form_validation->run() == false) {
            $this->load->view('edit', $data);
        } else {
            $form_arr = array();
            $form_arr['account'] = $this->input->post('account');
            $form_arr['name'] = $this->input->post('name');
            $form_arr['gender'] = ($this->input->post('gender') == '男') ? 1 : 0;
            $form_arr['birthday'] = $this->input->post('birthday');
            $form_arr['email'] = $this->input->post('email');
            $form_arr['note'] = $this->input->post('note');
            
            $this->Account_info_model->update_user($user_id, $form_arr);
            $this->session->set_flashdata('success', '編輯成功');
            redirect(base_url().'index.php/account_info/index');
        }
    }

    function delete($user_id) {
        $user = $this->Account_info_model->get_single_user($user_id);
        if (empty($user)) {
            $this->session->set_flashdata('failure', '刪除失敗');
            redirect(base_url().'index.php/account_info/index');
        }

        $this->Account_info_model->delete_user($user_id);
        $this->session->set_flashdata('success', '刪除成功');
        redirect(base_url().'index.php/account_info/index');
    }

    private function set_validation_rule() {
        $config = array(
            array(
                'field' => 'account',
                'label' => '帳號',
                'rules' => 'required|alpha_numeric',
                'errors' => array(
                    'required' => '帳號欄位為必填',
                    'alpha_numeric' => '帳號必須為英文+數字',
                ),
            ),
            array(
                'field' => 'name',
                'label' => '姓名',
                'rules' => 'required',
                'errors' => array(
                    'required' => '姓名欄位為必填',
                ),
            ),
            array(
                'field' => 'gender',
                'label' => '性別',
                'rules' => 'required',
                'errors' => array(
                    'required' => '性別欄位為必填',
                ),
            ),
            array(
                'field' => 'birthday',
                'label' => '生日',
                'rules' => 'required',
                'errors' => array(
                    'required' => '生日欄位為必填',
                ),
            ),
            array(
                'field' => 'email',
                'label' => '信箱',
                'rules' => 'required|valid_email',
                'errors' => array(
                    'required' => '信箱欄位為必填',
                    'valid_email' => '信箱格式錯誤'
                ),
            )
        );

        return $config;
    }
}
?>