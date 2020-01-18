<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->library('pagination');
		$this->load->model('Option_model', 'option');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'),
            $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        //$this->load->model('Option_model');

        $this->success_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_add_success').'</div>';
        $this->fail_msg = '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_add_fail').'</div>';
		$this->edit_success_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_update_success').'</div>';
		$this->edit_fail_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_update_fail').'</div>';
		$this->delete_success_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_delete_success').'</div>';
    

    }

    public function index()
    {

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('Auth/login', 'refresh');
        } 
        else {
            redirect('Home', 'refresh');
        }
    }

    public function users(){
		
        $records = $this->option->get_user_list();

        $this->data = array(
            
            'head' => 'Users List (UL)',
            'records' => $records
        );
		
		$this->data['groups'] = $this->option->get_group_options();
        $this->template->write('title', 'teacher->' . $this->data["head"], TRUE);
        $this->template->write_view('content', 'user_list', $this->data, TRUE);
        $this->template->render();
        return true;
	}

    public function view_user($id = '')
    {
		$this->data['head'] = "User Details (UD)";
        $this->data['details'] = $this->ion_auth_model->user_details($id);
        $this->data['id'] = $id;
        foreach ($this->data['details'] as $key => $company) {
            $companies[] = $company->company;
        }

        $user_groups = $this->ion_auth->get_users_groups($id)->result();
        foreach ($user_groups as $val) {
            $groups[] = $val->name;
        }
        $this->data['groups'] = $groups;
        $this->data['companies'] = $companies;
        $this->template->write('title', 'User->profile', TRUE);
        $this->template->write_view('content', 'user_view', $this->data, TRUE);
        $this->template->render();
    }

    public function user_profile()
    {
        $this->data['head'] = 'User Profile (UF)';
        
        $this->data['details'] = $this->ion_auth_model->user_details($this->ion_auth->user()->row()->id);
        $this->data['id'] = $this->ion_auth->user()->row()->id;
        $this->data['company_id'] = $this->ion_auth->user()->row()->company;
        foreach ($this->data['details'] as $key => $company) {
            $companies[] = $company->company;
        }

        $user_groups = $this->ion_auth->get_users_groups($this->data['id'])->result();
        foreach ($user_groups as $val) {
            $groups[] = $val->name;
        }
        $this->data['groups'] = $groups;
        $this->data['companies'] = $companies;
        //echo '<pre>';
        //print_r($companies);
        //exit;
        $this->template->write('title', 'User->profile', TRUE);
        $this->template->write_view('content', 'user_profile', $this->data, TRUE);
        $this->template->render();
    }

    public function login()
    {
        $this->data['title'] = $this->lang->line('login_heading');

        //validate form input
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() == true) {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool)$this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('/', 'refresh');
            } else {
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('Auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            // the user is not logging in so display the login page
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

            $this->_render_page('auth/login', $this->data);
        }
    }

    public function logout()
    {
        $this->data['title'] = "Logout";

        // log the user out
        $logout = $this->ion_auth->logout();

        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('Auth/login', 'refresh');
    }

    public function change_password()
    {
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

        if (!$this->ion_auth->logged_in()) {
            redirect('Auth/login', 'refresh');
        }

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false) {
            // display the form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'id' => 'old',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Old Password',
            );
            $this->data['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'New Password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Confirm New Password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );

            // render
            //$this->_render_page('auth/change_password', $this->data);
            $this->template->write('title', 'User->profile', TRUE);
            $this->template->write_view('content', 'change_password', $this->data, TRUE);
            $this->template->render();
        } else {
            $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change) {
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('Auth/change_password', 'refresh');
            }
        }
    }

    public function forgot_password()
    {
        // setting validation rules by checking whether identity is username or email
        if ($this->config->item('identity', 'ion_auth') != 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        } else {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }


        if ($this->form_validation->run() == false) {
            $this->data['type'] = $this->config->item('identity', 'ion_auth');
            // setup the input
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
            );

            if ($this->config->item('identity', 'ion_auth') != 'email') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            // set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->_render_page('auth/forgot_password', $this->data);
        } else {
            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

            if (empty($identity)) {

                if ($this->config->item('identity', 'ion_auth') != 'email') {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                } else {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }

                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("Auth/forgot_password", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                // if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("Auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("Auth/forgot_password", 'refresh');
            }
        }
    }

    public function reset_password($code = NULL)
    {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {
            // if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                // display the form

                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                // render
                $this->_render_page('auth/reset_password', $this->data);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                    // something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));

                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        // if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect("Auth/login", 'refresh');
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('Auth/reset_password/' . $code, 'refresh');
                    }
                }
            }
        } else {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("Auth/forgot_password", 'refresh');
        }
    }

    public function activate($id, $code = false)
    {
        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            // redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("Auth", 'refresh');
        } else {
            // redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("Auth/forgot_password", 'refresh');
        }
    }

    public function deactivate($id = NULL)
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }

        $id = (int)$id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->user($id)->row();

            $this->_render_page('auth/deactivate_user', $this->data);
        } else {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes') {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_error($this->lang->line('error_csrf'));
                }

                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }

            // redirect them back to the auth page
            redirect('Auth/user_list', 'refresh');
        }
    }

    public function create_user()
    {
        $this->data['head'] = 'User Entry Form (UEF)';
        $this->data['group_options'] = $this->option->get_group_options();
		
        if (!$this->ion_auth->logged_in()) {
            redirect('Auth', 'refresh');
        }

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;
		
        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if ($identity_column !== 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|min_length[11]');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
		

        if ($this->form_validation->run() == true) {
            $email = strtolower($this->input->post('email'));
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

			$additional_data['first_name'] = $this->input->post('first_name');
            $additional_data['last_name'] = $this->input->post('last_name');
            $additional_data['phone'] = $this->input->post('phone');
            $additional_data['group_id'] = $this->input->post('group_id');

			$additional_data['create_by'] = $this->ion_auth->user()->row()->id;
            
        }
		
		
        if ($this->form_validation->run() == true && ($user_id = $this->ion_auth->register($identity, $password, $email, $additional_data))) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("Auth/users", 'refresh');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'maxlength' => '50',
                'class' => 'form-control',
                'placeholder' => ucwords(str_replace('_', ' ', 'first_name')),
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'maxlength' => '50',
                'class' => 'form-control',
                'placeholder' => ucwords(str_replace('_', ' ', 'last_name')),
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => ucwords(str_replace('_', ' ', 'identity')),
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'email',
                'class' => 'form-control',
                'placeholder' => ucwords(str_replace('_', ' ', 'email')),
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'type' => 'text',
                'maxlength' => '11',
                'class' => 'form-control',
                'placeholder' => ucwords(str_replace('_', ' ', 'phone')),
                'value' => $this->form_validation->set_value('phone'),
            );

            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => ucwords(str_replace('_', ' ', 'password')),
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => ucwords(str_replace('_', ' ', 'password_confirm')),
                'value' => $this->form_validation->set_value('password_confirm'),
            );
            $this->template->write('title', 'cmpds Users', TRUE);
            $this->template->write_view('content', 'create_user', $this->data, TRUE);
            $this->template->render();
        }
    }

    public function edit_user($id = '')
    {
        $this->data['head'] = 'User Edit Form (UEF)';

        $this->load->model('Option_model');
        $user = $school_details = $this->ion_auth->user($id)->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();
        $this->data['userAcl'] = $this->ion_auth->get_users_groups()->result();
 
        $this->data['group_options'] = $this->Option_model->get_group_options();


        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|min_length[11]');


        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            // if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                // show_error($this->lang->line('error_csrf'));
            // }

            if ($this->form_validation->run() === TRUE) {

					$data['first_name'] = $this->input->post('first_name');
					$data['last_name'] = $this->input->post('last_name');
					$data['phone'] = $this->input->post('phone');
					$data['email'] = $this->input->post('email');
					$data['group_id'] = $this->input->post('group_id');
				
              
                //Update the groups user belongs to
                $groupData = $this->input->post('groups');

                if (isset($groupData) && !empty($groupData)) {

                    $this->ion_auth->remove_from_group('', $id);

                    foreach ($groupData as $grp) {
                        $this->ion_auth->add_to_group($grp, $id);
                    }

                }
                // }

                // check to see if we are updating the user
                if ($this->ion_auth->update($user->id, $data)) {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->messages());

                    redirect('Auth/users', 'refresh');
                } else {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->errors());


                    redirect('/', 'refresh');

                }

            }
        }

        // display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['first_name'] = array(
            'name' => 'first_name',
            'id' => 'first_name',
            'type' => 'text',
            'maxlength' => '50',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name' => 'last_name',
            'id' => 'last_name',
            'type' => 'text',
            'maxlength' => '50',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );
        $this->data['email'] = array(
            'name' => 'email',
            'id' => 'email',
            'type' => 'email',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('email', $user->email),
        );
        $this->data['phone'] = array(
            'name' => 'phone',
            'type' => 'text',
            'maxlength' => '11',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );

        $this->data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'type' => 'password',
            'class' => 'form-control',
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'type' => 'password',
            'class' => 'form-control',
        );

        //$this->_render_page('auth/edit_user', $this->data);
        //$this->data['group_options'] = $this->option_model->get_group_options();
        $this->template->write('title', 'cmpds Users', TRUE);
        $this->template->write_view('content', 'edit_user', $this->data, TRUE);
        $this->template->render();
    }

    public function edit_user_profile($id = '')
    {
        $this->data['head'] = 'Update User Profile (UUP)';
        $user = $this->ion_auth->user($id)->row();

        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|numeric|min_length[11]');

        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            if ( $id != $this->input->post('id') ) {
                
                show_error($this->lang->line('error_csrf'));
            }

            if ($this->form_validation->run() === TRUE) {
				
                if ($_FILES['image']['name']) {
                    $config['upload_path'] = './upload/user';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 50000;
                    $config['max_width'] = 1024;
                    $config['max_height'] = 768;
                    $config['file_name'] = $file_name = date('YmdHis') . $id;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $updata = array('upload_data' => $this->upload->data());
                        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT . '/upload/user/' . $user->image;
                        @unlink($path);
                    }
                }
                if ($_FILES['image']['name']) {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'image' => $file_name . $updata['upload_data']['file_ext'],
                    );
                } else {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                    );
                }

                if ($this->ion_auth->update($user->id, $data)) {
                    $this->session->set_flashdata('message', 'Successfully Updated your profile');
                    redirect('Auth/user/profile', 'refresh');
                } else {
                    $this->session->set_flashdata('message', 'Profile update fail');
                    redirect('Auth/user/profile', 'refresh');

                }

            }
        }

        $this->data['csrf'] = $this->_get_csrf_nonce();

        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        $this->data['user'] = $user;

        $this->data['first_name'] = array(
            'name' => 'first_name',
            'id' => 'first_name',
            'type' => 'text',
            'maxlength' => '50',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name' => 'last_name',
            'id' => 'last_name',
            'type' => 'text',
            'maxlength' => '50',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );
        $this->data['email'] = array(
            'name' => 'email',
            'id' => 'email',
            'type' => 'email',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('email', $user->email),
        );
        $this->data['phone'] = array(
            'name' => 'phone',
            'type' => 'text',
            'maxlength' => '11',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );
        $this->data['image'] = array(
            'name' => 'image',
            'type' => 'file',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('image', $user->image),
        );

        $this->template->write('title', 'mEshoP Users', TRUE);
        $this->template->write_view('content', 'edit_user_profile', $this->data, TRUE);
        $this->template->render();
    }


    public function delete_user($id)
    {
        if ($this->ion_auth->user()->row()->id == $id) {
            $this->session->set_flashdata('message', 'Hy you are not able to delete yourself man! ');
        } else {
            $this->ion_auth->delete_user($id);
            $this->ion_auth->delete_user_accounts($id);
            $this->ion_auth->delete_user_voucher_settings($id);
            $this->ion_auth->delete_user_groups($id);
        }
        redirect('Auth/users', 'refresh');
    }

    public function groups()
    {
        $this->data['head'] = 'Groups List (GL)';
        $this->data['groups'] = $this->db->query("select * from groups")->result_array();
        $this->template->write('title', 'Group', TRUE);
        $this->template->write_view('content', 'groups', $this->data, TRUE);
        $this->template->render();
    }

    public function create_group()
    {
        
        $this->data['head'] = 'Group Entry Form (GEF)';
        $this->load->model('Permission_model', 'permission');

        $this->data['title'] = $this->lang->line('create_group_title');

		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required');

        if ($this->form_validation->run() == TRUE) {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if ($new_group_id) {

                $menu_list = $this->input->post('menu_id');
                $permissions = array();

                foreach ($menu_list as $index => $menu_id) {
                    $permission = array(
                        'group_id' => $new_group_id,
                        'menu_id' => $menu_id,
                        'can_add' => $this->input->post('can_add_' . $menu_id),
                        'can_edit' => $this->input->post('can_edit_' . $menu_id),
                        'can_delete' => $this->input->post('can_delete_' . $menu_id),
                        'can_view' => $this->input->post('can_view_' . $menu_id),
                        'create_at' => date('Y-m-d H:i:s')
                    );
                    $permissions[] = $permission;
                }

                $this->permission->add_permissions($new_group_id, $permissions);
                
            }
            
            $this->session->set_flashdata(
                    'message', sprintf($this->success_msg, 'subject', 'added')
                );
            redirect("Auth/groups");
                
        } else {

            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['group_name'] = array(
                'name' => 'group_name',
                'id' => 'group_name',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name' => 'description',
                'id' => 'description',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('description'),
            );

            $this->data['menu_list'] = $this->permission->get_group_permissions();

            
            $this->template->write('title', 'mEshoP Group', TRUE);
            $this->template->write_view('content', 'create_group', $this->data, TRUE);
            $this->template->render();
        }
    }

    public function edit_group($id)
    {
        $this->data['head'] = 'Group Edit Form (GEDF)';
        
        // bail if no group id given
        if (!$id || empty($id)) {
            redirect('Auth/group', 'refresh');
        }

        $this->load->model('Permission_model', 'permission');
        $this->data['title'] = $this->lang->line('edit_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('Auth', 'refresh');
        }

        $group = $this->ion_auth->group($id)->row();

        // validate form input
        //$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

                if ($group_update) {

                    $assign_menu_list = $this->input->post('assign_menu_id');
                    $menu_list = $this->input->post('menu_id');
                    $permissions = array();

                    foreach ($menu_list as $index => $menu_id) {
                        $permission = array(
                            'group_id' => $id,
                            'menu_id' => $menu_id,
                            'can_add' => $this->input->post('can_add_' . $menu_id),
                            'can_edit' => $this->input->post('can_edit_' . $menu_id),
                            'can_delete' => $this->input->post('can_delete_' . $menu_id),
                            'can_view' => $this->input->post('can_view_' . $menu_id),
                            'create_at' => date('Y-m-d H:i:s')
                        );
                        $permissions[] = $permission;
                    }

                    $this->permission->add_permissions($id, $permissions);
                    $this->permission->update_menu_permission($id, $menu_list, $assign_menu_list);


                    $this->session->set_flashdata(
                    'message', sprintf($this->edit_success_msg, 'group', 'edit'));
                    
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
                redirect("Auth/group", 'refresh');
            }
        }

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $this->data['group'] = $group;
        $this->data['id'] = $id;

        $readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

        $this->data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('group_name', $group->name),
            $readonly => $readonly,
        );
        $this->data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );

        $this->data['menu_list'] = $this->permission->get_group_permissions($id);

        //$this->_render_page('auth/edit_group', $this->data);
        //$this->data['group_options'] = $this->option_model->get_group_options();
        $this->template->write('title', 'mEshoP Groups', TRUE);
        $this->template->write_view('content', 'edit_group', $this->data, TRUE);
        $this->template->render();
    }

    public function delete_group($id)
    {

        $this->load->model('Company_model');
        if (($this->Company_model->is_group_used($id) > 0)) {

            $this->session->set_flashdata(
                'message', sprintf($this->fail_msg, 'Hi', 'User Group dose not delete because it already used!')
            );
        } else {
            $this->session->set_flashdata('success_msg', 'User Group', 'deleted');
            $this->ion_auth->delete_group($id);
        }

        redirect('Auth/groups', 'refresh');
    }

    public
    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    public
    function _valid_csrf_nonce()
    {
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public
    function _render_page($view, $data = null, $returnhtml = false)//I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
    }

    public
    function company()
    {
        $this->load->model('Company_model');
        $this->load->library('pagination');
        $this->load->model('company_model');
        $sdata['name'] = $this->input->post('name');
        $sdata['contact'] = $this->input->post('contact');
        $total_rows = $this->Company_model->get_company($sdata, NULL, NULL);
        $paginate_data = $this->paginate($total_rows, NULL);
        $this->data["links"] = $paginate_data['link'];

        $this->data['companies'] = $this->company_model->get_company($sdata, $paginate_data['per_page'], $paginate_data['page']);
        $this->session->set_userdata('records', json_encode($this->data['companies']));
        $this->template->write('title', 'Company->Company', TRUE);
        $this->template->write_view('content', 'company', $this->data, TRUE);
        $this->template->render();
        return true;
    }

    public
    function company_add()
    {
        $this->mybreadcrumb->add('Home', base_url());
        $this->mybreadcrumb->add('Cities', base_url('cities/listing'));
        $this->mybreadcrumb->add('Cities', base_url('cities/listing'));
        $this->data['breadcrumbs'] = $this->mybreadcrumb->render();

        $this->load->model('Company_model');
        if ($this->form_validation->run('company') === FALSE) {
            $this->template->write('title', 'Company->add', TRUE);
            $this->template->write_view('content', 'company_add', $this->data, TRUE);
            $this->template->render();
        } else {
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['address'] = $this->input->post('address');
            $data['contact'] = $this->input->post('contact');
            $data['web'] = $this->input->post('web');
            $data['slogan'] = $this->input->post('slogan');
            $data['create_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->user_id;

            if ($voucher_number = $this->Company_model->save_company($data)) {
                $this->session->set_flashdata('add_message', 'Successfully added <strong>Company</strong> voucher');
            } else {

                $this->session->set_flashdata('add_message', 'Fail company add');
            }
            redirect('Auth/company', 'refresh');
        }
    }

    public function company_edit($id = '')
    {
        $this->load->model('Company_model');
        $this->data['id'] = $id;
        $this->data['user_group_name'] = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->result();

        $this->data['company_details'] = $this->Company_model->company_details($id);

        if ($this->form_validation->run('company') === FALSE) {
            $this->template->write('title', 'Company->edit', TRUE);
            $this->template->write_view('content', 'company_edit', $this->data, TRUE);
            $this->template->render();
        } else {
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './upload/company';
                $config['allowed_types'] = '*';
                $config['max_size'] = 50000;
                $config['max_width'] = 2000;
                $config['max_height'] = 2000;
                $config['file_name'] = $file_name = date('YmdHis') . $id;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $updata = array('upload_data' => $this->upload->data());
                    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT . '/upload/company/' . $this->data['company_details']->image;
                    @unlink($path);
                    $data['name'] = $this->input->post('name');
                    $data['description'] = $this->input->post('description');
                    $data['address'] = $this->input->post('address');
                    $data['contact'] = $this->input->post('contact');
                    $data['web'] = $this->input->post('web');
                    $data['slogan'] = $this->input->post('slogan');
                    $data['image'] = $file_name . $updata['upload_data']['file_ext'];
                    $data['created_by'] = $this->user_id;
                    if ($this->Company_model->update_company($id, $data)) {
                        $this->session->set_flashdata('update_message', 'Successfully updated <strong>Company</strong> voucher');
                    } else {

                        $this->session->set_flashdata('update_message', 'Updated fail');
                    }
                    if (!$this->ion_auth->is_admin())
                        redirect('Home', 'refresh');
                    else
                        redirect('Auth/company', 'refresh');
                }
            } else {
                $data['name'] = $this->input->post('name');
                $data['description'] = $this->input->post('description');
                $data['address'] = $this->input->post('address');
                $data['contact'] = $this->input->post('contact');
                $data['web'] = $this->input->post('web');
                $data['slogan'] = $this->input->post('slogan');
                $data['created_by'] = $this->user_id;
                if ($this->Company_model->update_company($id, $data)) {
                    $this->session->set_flashdata('update_message', 'Successfully updated <strong>Company</strong> voucher');
                } else {
                    $this->session->set_flashdata('update_message', 'Updated fail');
                }
                if (!$this->ion_auth->is_admin())
                    redirect('Home', 'refresh');
                else
                    redirect('Auth/company', 'refresh');
            }
        }
    }

    public function company_view($id = '')
    {
        $this->load->model('Company_model');
        $this->data['details'] = $this->Company_model->company_details($id);
        $this->template->write('title', 'Company->view', TRUE);
        $this->template->write_view('content', 'company_view', $this->data, TRUE);
        $this->template->render();
    }

    public
    function company_delete($id = '')
    {
        $this->load->model('Company_model');
        if (($this->Company_model->is_company_used($id) > 0)) {
            $this->session->set_flashdata('fail_message', 'Company dose not delete because it already used!');
        } else {
            $this->session->set_flashdata('success_message', 'Company successfully deleted');
            $this->db->delete('companies', array('id' => $id));
        }
        redirect('Auth/company');
    }

    public
    function status($status = '', $id = '')
    {
        $this->db->update('users', array('active' => $status), array('id' => $id));
        redirect('Auth/users');
    }

}
