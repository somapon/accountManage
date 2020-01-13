<?php
/*
 * Developed by @Tanjina Jannat Tithy
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AjaxController extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('ion_auth_model');
        $this->load->model('Option_model', 'option');
        $this->load->helper(array('form', 'url', 'language'));

    }

    public function get_location()
    {
        $id = $this->input->post('id');
        $location = $this->input->post('location');
        $location_id = $this->input->post('location_id');
        $locations = $this->db->get_where($location, array('id' => $id))->result();

        echo '<select name="' . $location_id . '" id="' . $location_id . '" class ="form-control" tabindex =4, required = "required">';
        foreach ($locations as $val) {
            echo '<option value="' . $val->id . '">' . $val->name . '</option>';
        }
        echo '</select>';


    }

    public function get_district()
    {
        $division_id = $this->input->post('division_id');
        $district = $this->input->post('district');
        $districts = $this->option->get_district_option_by_id($division_id);

        echo '<select name="' . $district . '" id="' . $district . '" class ="form-control" tabindex =4, required = "required">';
        echo '<option value="">Select District</option>';
        foreach ($districts as $val) {
            echo '<option value="' . $val->id . '">' . $val->name . '</option>';
        }
        echo '</select>';


    }

    public function get_upazila()
    {
        $district_id = $this->input->post('district_id');
        $upazila = $this->input->post('upazila');
        $upazilas = $this->option->get_upazila_option_by_id($district_id);

        echo '<select name="' . $upazila . '" id="' . $upazila . '" class ="form-control", tabindex =5, required ="required">';
        echo '<option value="">Select Upazila/Thana</option>';
        foreach ($upazilas as $upazila) {
            echo '<option value="' . $upazila->id . '">' . $upazila->name . '</option>';
        }
        echo '</select>';
    }

    public function get_union()
    {
        $upazila_id = $this->input->post('upazila_id');
        $union = $this->input->post('union');
        $unions = $this->option->get_union_option_by_id($upazila_id);

        echo '<select name="' . $union . '" id="' . $union . '" class ="form-control", tabindex =6, required ="required">';
        echo '<option value="">Select Union/Area</option>';
        foreach ($unions as $union) {
            echo '<option value="' . $union->id . '">' . $union->name . '</option>';
        }
        echo '</select>';
    }

    public function get_village()
    {
        $union_id = $this->input->post('union_id');
        $village = $this->input->post('village');
        $villages = $this->option->get_village_option_by_id($union_id);

        echo '<select name="' . $village . '" id="' . $village . '" class ="form-control", tabindex =7, required ="required">';
        echo '<option value="">Select Village</option>';
        foreach ($villages as $village) {
            echo '<option value="' . $village->id . '">' . $village->name . '</option>';
        }
        echo '</select>';
    }

    public function get_word()
    {
        $union_id = $this->input->post('union_id');
        $word = $this->input->post('word');
        $words = $this->option->get_word_option_by_id($union_id);

        echo '<select name="' . $word . '" id="' . $word . '" class ="form-control", tabindex =7, required ="required">';
        echo '<option value="">Select Word</option>';
        foreach ($words as $word) {
            echo '<option value="' . $word->id . '">' . $word->name . '</option>';
        }
        echo '</select>';
    }

    public function get_institute()
    {
        $union_id = $this->input->post('union_id');
        $school = $this->input->post('school');
        $schools = $this->option->get_school_option_by_id($union_id);

        echo '<select name="' . $school . '" id="' . $school . '" class ="form-control", tabindex =8, required ="required">';
        echo '<option value="">Select Institute</option>';
        foreach ($schools as $school) {
            echo '<option value="' . $school->id . '">' . $school->school_name . '</option>';
        }
        echo '</select>';
    }

    public function get_upazila_institute()
    {
        $upazila_id = $this->input->post('upazila_id');
        $school = $this->input->post('school');
        $schools = $this->option->get_school_option_by_upazila_id($upazila_id);

        echo '<select name="' . $school . '" id="' . $school . '" class ="form-control", tabindex =8, required ="required">';
        echo '<option value="">Select Institute</option>';
        foreach ($schools as $school) {
            echo '<option value="' . $school->id . '">' . $school->institute_name . '</option>';
        }
        echo '</select>';
    }

    public function get_student()
    {
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        $union_id = $this->input->post('union_id');
        $students = $this->option->get_student_option($class_id, $section_id, $union_id);

        echo '<select name="student_id" id="select2-1" class ="form-control student_id", tabindex =8, required ="required">';
        echo '<option value="">Select Student</option>';
        foreach ($students as $student) {
            echo '<option value="' . $student->id . '">' . $student->name_english . '</option>';
        }
        echo '</select>';
    }


    public function get_promotion_student()
    {
        $groups = $this->option->get_student_group_option();
        $classes = $this->option->get_clase_option();
        $sections = $this->option->get_section_option();
        $year = $this->input->post('year_id');
        $institute_id = $this->input->post('institute_id');
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        $students = $this->db
            ->select('classes.class_name, sections.section_name, students.id, students.student_name_bangla, 
                students.class_id, students.section_id, students.student_group_id, students.roll')
            ->join('classes', 'classes.id=students.class_id', 'left')
            ->join('sections', 'sections.id=students.section_id', 'left')
            ->get_where('students', array(
                'current_year' => $year,
                'institute_id' => $institute_id,
                'class_id' => $class_id,
                'section_id' => $section_id,
            ))->result();

        //echo $this->db->last_query();exit;

        echo '<tr>
                                <td></td>
                                <td class="text-left"></td>

                                <td class="text-left" colspan="2">
                                    <table class="table table-bordered display" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="text-left">Class</th>
                                            <th class="text-left">Section</th>
                                            <th class="text-left span3">Roll</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="text-left" colspan="2">
                                    <table class="table table-bordered display" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="text-left">Class</th>
                                            <th class="text-left">Section</th>
                                            <th class="text-left span3">Roll</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                            <!-- data input -->';
        foreach ($students as $index => $student) {
            $index = $index + 1;
            echo '
                            
                            <tr id="promotion_id">
                                <td>' . $index . '</td>
                                <td class="text-left">' . $student->student_name_bangla . '
                                <input type="hidden" name="student_id[]" value="' . $student->id . '">
                                </td>

                                <td class="text-left" colspan="2">
                                    <table cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <td class="text-left">' . $student->class_name . '
                                            <input type="hidden" name="class_id[]" value="' . $student->class_id . '">
                                            </td>
                                            <td class="text-left">' . $student->section_name . '
                                            <input type="hidden" name="section_id[]" value="' . $student->section_id . '">
                                            </td>
                                            <td class="text-left span3">' . $student->roll . '
                                            <input type="hidden" name="roll[]" value="' . $student->roll . '">
                                            <input type="hidden" name="student_group_id[]" value="' . $student->student_group_id . '">
                                            </td>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="text-left" colspan="2">
                                    <table cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td class="text-left">
                                                <div class="form-group">'
                . form_dropdown('prm_class_id[]', $classes, set_value('prm_class_id', $student->class_id + 1),
                    array('class' => 'form-control', 'required' => 'required')) .
                '</div>
                                            </td>
                                            
                                            <td class="text-left">
                                                <div class="form-group">
                                                    ' . form_dropdown('prm_section_id[]', $sections, set_value('prm_section_id', $student->section_id),
                    array('class' => 'form-control')) . '
                                                </div>
                                            </td>';
            if ($student->class_id == 3) {
                echo '<td class="text-left">
                                                <div class="form-group">
                                                    ' . form_dropdown('prm_group_id[]', $groups, set_value('prm_group_id'),
                        array('class' => 'form-control')) . '
                                                </div>
                                            </td>';


            }

            if ($student->class_id == 4 || $student->class_id == 5) {
                echo '<td class="text-left">
                                                <div class="form-group">
                                                    ' . form_dropdown('prm_group_id[]', $groups, set_value('prm_group_id', $student->student_group_id),
                        array('class' => 'form-control')) . '
                                                </div>
                                            </td>';


            }
            echo


            '<td class="text-left span3">

                                                <input type="number" id="roll" value="" name="prm_roll[]" class="form-control">

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>';
        }
    }


    public function get_group()
    {
        $addressbook_category_id = $this->input->post('addressbook_category_id');
        $group = $this->input->post('addressbook_group_id');
        $groups = $this->option->get_addressbook_group_option_by_id($addressbook_category_id);

        echo '<select name="' . $groups . '" id="' . $group . '" class ="form-control", tabindex =2, required ="required">';
        echo '<option value="">Select Word</option>';
        foreach ($groups as $group) {
            echo '<option value="' . $group->id . '">' . $group->name . '</option>';
        }
        echo '</select>';
    }


    public function get_profession_by_role()
    {
        $rule_id = $this->input->post('rule_id');
        $professions = $this->option->get_profession_option_by_id($rule_id);
        echo json_encode($professions);
        /*echo '<div class="form-group col-md-2"><label>Select Profession : </label></div>
              <div class="form-group col-md-10">';

        foreach ($professions as $profession) {
            echo ' <input type="checkbox" name="profession[]" value="'. $profession->id .'" class="profession_id"> '. $profession->profession_name . '<br/>';
        }
        echo '</div>';*/
    }

    public function get_designation_by_profession()
    {
        $profession_id = $this->input->post('profession_id');
        $designations = $this->option->get_deignation_option_by_id($profession_id);
        echo json_encode($designations);
        /* echo '<div class="form-group col-md-2"><label>Select Designation : </label></div>
               <div class="form-group col-md-10">';

         foreach ($designations as $designation) {
             echo ' <input type="checkbox" name="designation[]" value="'. $designation->id .'" class="designation_id">'.
                 $designation->designation_name .'<br/>';
         }
         echo '</div>';*/
    }


    public function get_profession()
    {
        $rule_id = $this->input->post('rule_id');
        $professions = $this->option->get_profession_option_by_id($rule_id);

        echo '<select name="profession_id" id="profession_id" class ="form-control", tabindex =2, required ="required">';
        echo '<option value="">Select Profession</option>';
        foreach ($professions as $profession) {
            echo '<option value="' . $profession->id . '">' . $profession->profession_name . '</option>';
        }
        echo '</select>';
    }

    public function get_designation()
    {
        $profession_id = $this->input->post('profession_id');
        $designations = $this->option->get_deignation_option_by_id($profession_id);

        echo '<select name="designation_id" id="designation_id" class ="form-control", required ="required">';
        echo '<option value="">Select Designation</option>';
        foreach ($designations as $designation) {
            echo '<option value="' . $designation->id . '">' . $designation->designation_name . '</option>';
        }
        echo '</select>';
    }


    public function get_stakeholder()
    {
        $designation_id = $this->input->post('designation_id');
        $stakeholders = $this->option->get_stakeholder_option_by_id($designation_id);

        echo '<select name="designation_id" id="designation_id" class ="form-control", required ="required">';
        echo '<option value="">Select Stakeholder</option>';
        foreach ($stakeholders as $stakeholder) {
            echo '<option value="' . $stakeholder->id . '">' . $stakeholder->name_english . '</option>';
        }
        echo '</select>';
    }


    public function get_eiin()
    {
        $institute_id = $this->input->post('institute_id');
        echo $this->db->get_where('schools_info', array('id' => $institute_id))->row()->EIIN;
    }

    public function get_union_no()
    {
        $institute_id = $this->input->post('institute_id');
        echo $this->db->get_where('unions', array('id' => $this->db->get_where('schools', array('id' => $institute_id))->row()->union_id))->row()->name;
    }


    ///By Sombor

    public function get_absents_students()
    {
        $classes = $this->option->get_clase_option();
        $sections = $this->option->get_section_option();
        $institute_id = $this->input->post('institute_id');
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');


        $students = $this->db
            ->select('students.id, students.student_name_english, students.roll')
            ->join('classes', 'classes.id=students.class_id', 'left')
            ->join('sections', 'sections.id=students.section_id', 'left')
            ->get_where('students', array(

                'institute_id' => $institute_id,
                'class_id' => $class_id,
                'section_id' => $section_id,
            ))->result();
//echo '<pre>';
        //print_r($students);exit;

        echo '<tr>

		<th class="text-left">#</th>
		<th class="text-left">Name</th>
		<th class="text-left">Roll</th>
		<th class="text-left span3">Action</th>
			 
	  </tr>
                            <!-- data input -->';
        foreach ($students as $index => $student) {
            $index = $index + 1;
            echo '         
				<tr>
					<td class="text-left">' . $index . '</td>
					<td class="text-left">
						<input type="hidden" name="student_id[]" value="' . $student->id . '" class="form-control">
						' . $student->student_name_english . '
					</td>
					<td class="text-left">' . $student->roll . '</td>
					<td class="text-left">
						<input type="checkbox" name="student_check[]" value="' . $student->id . '">
					</td>
					
				</tr>';
        }
        echo '<tr>
			<th class="text-left">#</th>
			<th class="text-left">Name</th>
			<th class="text-left">Roll</th>
			<th class="text-left" width="15%">
				<button type="submit" value="submit" name="submit" class="btn btn-sm btn-primary"
				tabindex="49"><i class="fa fa-dot-circle-o"></i>Submit
				</button>
			</th>
		</tr>';
    }


    ///By Sombor

    public function get_ajax_stakeholder_names()
    {
        $designation_id = $this->input->post('designation_id');
        $upazila_id = $this->session->userdata('upazila_id');

        $stakeholders = $this->db
            ->select('addressbooks.id, addressbooks.name_english')
            ->get_where('addressbooks', array(

                'designation_id' => $designation_id,
                'upazila_id' => $upazila_id,
            ))->result();

        echo json_encode($stakeholders);

    }

    //Corporation By Sombor

    public function get_corporation()
    {
        $district_id = $this->input->post('district_id');
        $district = $this->input->post('corporation');
        $districts = $this->option->get_corporation_option_by_id($district_id);

        echo '<select name="' . $district . '" id="' . $district . '" class ="form-control", tabindex =6, required ="required">';
        echo '<option value="">Select Corporation</option>';
        foreach ($districts as $district) {
            echo '<option value="' . $district->id . '">' . $district->corporation_name . '</option>';
        }
        echo '</select>';
    }

    public function get_paurasabha()
    {
        $upazila_id = $this->input->post('upazila_id');
        $paurasabha = $this->input->post('paurasabha');
        $paurasabhas = $this->option->get_paurasabha_option_by_id($upazila_id);

        echo '<select name="' . $paurasabha . '" id="' . $paurasabha . '" class ="form-control", tabindex =6, required ="required">';
        echo '<option value="">Select Corporation</option>';
        foreach ($paurasabhas as $paurasabha) {
            echo '<option value="' . $paurasabha->id . '">' . $paurasabha->paurasabha_name . '</option>';
        }
        echo '</select>';
    }

    public function get_thana()
    {
        $upazila_id = $this->input->post('upazila_id');
        $thana = $this->input->post('thana');
        $thanas = $this->option->get_thana_option_by_id($upazila_id);

        echo '<select name="' . $thana . '" id="' . $thana . '" class ="form-control", tabindex =6, required ="required">';
        echo '<option value="">Select Thana</option>';
        foreach ($thanas as $thana) {
            echo '<option value="' . $thana->id . '">' . $thana->thana_name . '</option>';
        }
        echo '</select>';
    }

    public function chcekc_teacher_name()
    {

        $mpo_no = $this->input->post('mpo_no');

        $result = $this->db->get_where('schools', array('mpo_no' => $mpo_no))->row();

        echo json_encode($result);

    }



    //Sambor vai
    ///---------------------------Today----------------------------
    public function get_par_district()
    {
        $division_id = $this->input->post('division_id');
        $district = $this->input->post('district');
        $districts = $this->option->get_district_option_by_id($division_id);

        echo '<select name="' . $district . '" id="' . $district . '" class ="form-control" tabindex =4, required = "required">';
        echo '<option value="">Select District</option>';
        foreach ($districts as $val) {
            echo '<option value="' . $val->id . '">' . $val->name . '</option>';
        }
        echo '</select>';


    }
    public function get_par_upazila()
    {
        $district_id = $this->input->post('district_id');
        $upazila = $this->input->post('upazila');
        $upazilas = $this->option->get_upazila_option_by_id($district_id);

        echo '<select name="' . $upazila . '" id="' . $upazila . '" class ="form-control", tabindex =5, required ="required">';
        echo '<option value="">Select Upazila/Thana</option>';
        foreach ($upazilas as $upazila) {
            echo '<option value="' . $upazila->id . '">' . $upazila->name . '</option>';
        }
        echo '</select>';
    }
    public function get_par_thana()
    {
        $upazila_id = $this->input->post('upazila_id');
        $thana = $this->input->post('thana');
        $thanas = $this->option->get_thana_option_by_id($upazila_id);

        echo '<select name="' . $thana . '" id="' . $thana . '" class ="form-control", tabindex =6, required ="required">';
        echo '<option value="">Select Thana</option>';
        foreach ($thanas as $thana) {
            echo '<option value="' . $thana->id . '">' . $thana->thana_name . '</option>';
        }
        echo '</select>';
    }

    public function get_par_corporation()
    {
        $district_id = $this->input->post('district_id');
        $district = $this->input->post('corporation');
        $districts = $this->option->get_corporation_option_by_id($district_id);

        echo '<select name="' . $district . '" id="' . $district . '" class ="form-control", tabindex =6, required ="required">';
        echo '<option value="">Select Corporation</option>';
        foreach ($districts as $district) {
            echo '<option value="' . $district->id . '">' . $district->corporation_name . '</option>';
        }
        echo '</select>';
    }
    public function get_par_union()
    {
        $upazila_id = $this->input->post('upazila_id');
        $union = $this->input->post('union');
        $unions = $this->option->get_union_option_by_id($upazila_id);

        echo '<select name="' . $union . '" id="' . $union . '" class ="form-control", tabindex =6, required ="required">';
        echo '<option value="">Select Union/Area</option>';
        foreach ($unions as $union) {
            echo '<option value="' . $union->id . '">' . $union->name . '</option>';
        }
        echo '</select>';
    }
}