<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function do_upload(){

		  if ($_POST['submit'] == 'UPLOAD_VIDEO'){
            $username = $this->session->userdata('username');
		        $title = $this->input->post("title");
		        $tag = $this->input->post("tag");
		        $desc = $this->input->post("desc");	

		        $this->load->model('User_model');	

		        $data['title']=$title;
		        $data['tag']=$tag;
		        $data['desc']=$desc;

		      if ($title == ''){
			      $this->load->view('upload_failure');
		      } else {
                $config = array(
                'upload_path' => "./video_uploads/",
                'allowed_types' => "mp4",
                'overwrite' => TRUE,
                'max_size' => "1000000", 
                'max_height' => "1440",
                'max_width' => "2560"
                );
                $this->load->library('upload', $config);
                if($this->upload->do_upload()){
                    $data = array('upload_data' => $this->upload->data());
                    $file_info = $this->upload->data();
                    $filename = $file_info['file_name'];
                    $this->User_model->video_details($filename, $title, $tag, $desc, $username);
                    $this->load->view('upload_success',$data);
                } else {
                  $this->load->view('upload_failure');
                }
            }
       } else if ($_POST['submit'] == 'UPLOAD_POTENTIAL_THUMBNAILS'){
            $title = $this->input->post("title");
            $username = $this->session->userdata('username');
            $this->load->model('User_model');
            $data = [];
            $count = count($_FILES['files']['name']);
            for($i=0;$i<$count;$i++){
              if(!empty($_FILES['files']['name'][$i])){
          
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];
        
                $config['upload_path'] = './thumbnails_uploads/'; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';
                $config['file_name'] = $_FILES['files']['name'][$i];
         
                $this->load->library('upload',$config); 
          
                if($this->upload->do_upload('file')){
                  $uploadData = $this->upload->data();
                  $filename = $uploadData['file_name'];  
                  $data['totalFiles'][] = $filename;
                  $this->User_model->thumbnail_upload($filename, $username, $title);
                   
                }
              }
         
            }
            
            $this->load->view('thumbnail_success'); 

        }  else if ($_POST['submit'] == 'UPLOAD_PIC'){
          $username = $this->session->userdata('username');

		        $this->load->model('User_model');	

                $config = array(
                'upload_path' => "./profile_upload/",
                'allowed_types' => "jpg|png",
                'overwrite' => TRUE,
                'max_size' => "1000000", 
                'max_height' => "100000000",
                'max_width' => "1000000000"
                );
                $this->load->library('upload', $config);
                if($this->upload->do_upload()){
                    $data = array('upload_data' => $this->upload->data());
                    $file_info = $this->upload->data();
                    $filename = $file_info['file_name'];
                    $this->User_model->profile_pic_upload($filename, $username);
                    $this->load->view('upload_success',$data);
                } else {
                  $this->load->view('upload_failure');
                }
        }
    }


}
