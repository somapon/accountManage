<?php
/*
 * Developed by @engr.mukul@hotmail.com
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AjaxSearch extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
   
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        //$this->form_validation->run($this);
        $this->form_validation->CI =& $this;
        $this->load->model('ion_auth_model');
        $this->load->model('Option_model', 'option');
        $this->load->model('AjaxSearch_model', 'ajaxsearchm');
        $this->load->helper(array('form', 'url', 'language'));
        $this->user_id = $this->ion_auth->user()->row()->id;
        if (!$this->ion_auth->logged_in()) {
            redirect('Auth/login', 'refresh');
        }
        $this->success_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_add_success').'</div>';
        $this->fail_msg = '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_add_fail').'</div>';
		$this->edit_success_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_update_success').'</div>';
		$this->edit_fail_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_update_fail').'</div>';
		$this->delete_success_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_delete_success').'</div>';
    }

    //-----------Start Question/Answer Part
	
	public function search_file()
    { 
        $this->data = array(
            'head'              => 'Advanced File Filters (AFF)',
            'casetype'    => $this->option->searchCaseType(),
			'casecategory' => $this->option->searchCaseCategory(),
			'courttype'    => $this->option->searchCourtType(),
            
        );

        $this->template->write('title', $this->data["head"], TRUE);
        $this->template->write_view('content', 'file_list', $this->data, TRUE);
        $this->template->render();
        return true;
    }
	
	public function search_result()
    { 
        if(isset($_POST["action"]))
		{
			
			$casetype_filter = implode(",", $_POST["caseType"]);
			
			$caseNo = $_POST["caseNo"];
			
			$fileName = $_POST["fileName"];
			
			$partyName = $_POST["partyName"];
			
			$caseDate = $_POST["caseDate"];
			
			$caseCategory = implode(",", $_POST["caseCategory"]);
			
			$courtType = implode(",", $_POST["courtType"]);
			
			$records = $this->ajaxsearchm->searchResults($casetype_filter, $caseNo, $fileName, $partyName, $caseDate, $caseCategory, $courtType);
			
			$i = 1;
			
			if($records){	
				foreach($records as $row)
				{
					$output .= '
						<tr>
							<td class="sorting_1" tabindex="0">'.$i.'</td>
							<td>'.$row->case_no.'</td>
							<td>'.$row->subcat_name.'</td>
							<td>'.$row->subsubcat_name.'</td>
							<td>'.$row->court_name.'</td>
							<td>'.$row->file_name.'</td>
							<td>'.$row->party_name.'</td>
							<td>'.$row->party_district.'</td>
							<td>
								<div class="btn-group align-top">
									<a class="btn btn-sm btn-primary badge" title="Edit" href="'.site_url('AjaxSearch/download_file/' . $row->id).'" class="btn btn-primary btn-xs">
										<i class="fa fa-download"></i>
									</a>
								</div> 
							</td>
						</tr>';
				$i++;
				}
			}
		}
	
		echo $output;
		
	}
	
	public function download_file($id){
		
		$fileName = $this->ajaxsearchm->fileName($id);
		$this->load->helper('download');
		$data = file_get_contents('./upload/docfile/'.$fileName);
		force_download($fileName, $data);
		
	}
    
}