<?php

class Search extends Core_Controller {

    public function Search_user($action = '', $edit_id = '') {
        $title = 'Search User';
        $this->set('title', $title);
        $this->set('page_heading', "Search");
        $this->set('page_summery', "Search");
        $this->set('page_name', "Search");
        $this->set('common_searching', "no");
        $driver_details = $this->Search_model->getDriverDetails();
        $user_details = $this->Search_model->getUserDetails();
        if ($this->input->post('search_user')) {
            $key_word = $this->input->post('input_search');
            $driver_details = $this->Search_model->getDriverDetails($key_word);
            $user_details = $this->Search_model->getUserDetails($key_word);
            
        }
        
        $this->set('driver_search_details', $driver_details);
        $this->set('user_search_details', $user_details);
        $this->view('Search_user');
    }
    public function getAllDriverDetails(){
      $base_url = base_url();
      $image_path = $base_url . '/public_html/images/';
      $input_key = $this->input->post('input_search');
      $driver_details = $this->Search_model->getDriverDetails($input_key);
      $list_html='';
      $list_html.= ' <div class="result result-users">
                                <h4>PILOTS <small>('.count($driver_details).')</small></h4>

                                <ul class="list-material" id="list_drivers">';
        foreach($driver_details as $details){
          $list_html.='<li class="has-action-left">
                                        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                        <a href="#" class="visible">
                                            <div class="list-action-left">
                                                <img src="'.$image_path.'/faces/'.$details['profile_pic'].'" class="face-radius" alt="">
                                            </div>
                                            <div class="list-content">
                                                <span class="title">'.$details['first_name'].'</span>
                                                <span class="caption"><a href="' . $base_url. 'Profile/Profile_view/'.$details['user_id'].'"><div class="caption"><strong>View Profile</strong></div></a></span> 
                                            </div>
                                        </a>
                                    </li>'; 
        }
        $list_html.='</ul>

                        </div>';
        echo $list_html;
    }
   public function getAllUserDetails(){
      $base_url = base_url();
      $image_path = $base_url . '/public_html/images/';
      $input_key = $this->input->post('input_search'); 
      $user_details = $this->Search_model->getUserDetails($input_key);

      $list_html='';
      $list_html.='<div class="result result-users">
                                <h4>PASSENGERS <small>('.count($user_details).')</small></h4>

                                <ul class="list-material" id="list_users1">';
      foreach($user_details as $user_details){
          $list_html.='<li class="has-action-left">
                                        <a href="#" class="hidden"><i class="ion-android-delete"></i></a>
                                        <a href="#" class="visible">
                                            <div class="list-action-left">
                                                <img src="'.$image_path.'/faces/passenger/'.$user_details['profile_pic'].'" class="face-radius" alt="">
                                            </div>
                                            <div class="list-content">
                                                <span class="title">'.$user_details['user_name'].'</span>
                                                <span class="caption"><a href="' . $base_url. 'Customer/Profile_view/'.$user_details['user_id'].'"><div class="caption"><strong>View Profile</strong></div></a></span> 
                                            </div>
                                        </a>
                                    </li>'; 
        }
        $list_html.='</ul>

                        </div>';
        echo $list_html;
   }
   public function Search_user_details($action = '', $edit_id = '') {
        $title = 'Search User';
        $this->set('title', $title);
        $this->set('page_heading', "Search");
        $this->set('page_summery', "Search");
        $this->set('page_name', "Search");
//        $driver_details = $this->Search_model->getDriverDetails();
//        $user_details = $this->Search_model->getUserDetails();
        if ($this->input->post('search_user')) {
            $key_word = $this->input->post('input_search');
            $driver_details = $this->Search_model->getDriverDetails($key_word);
            $user_details = $this->Search_model->getUserDetails($key_word);
            
        }
        
        $this->set('driver_details', $driver_details);
        $this->set('user_details', $user_details);
        $this->view('Search_user_details');
    }

}
