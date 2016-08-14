<?php

class Message extends Core_Controller {

    public function update_message() {

        $this->load->helper('date');

        $message = $this->input->post('message');
        $to_user = $this->input->post('reciverid');

        $gcm_id = $this->Message_model->getDriverGcmId($to_user);

        $text = '';
        $format = 'DATE_W3C';
        $time = standard_date($format, time());

        $registatoin_ids = array($gcm_id);
        //$registatoin_ids = array('APA91bEZE_zpdyQzhY_P4HQ1PvkqEYyZfENwyYaxWqB5iQCZ866fd1IfYcyfAmJEgf3wEA8Erlo5DtaTPP0Kt7P9WX-WxvrIyiZL7FJ3J6xTzASmA7AUbvaOdH3PP8rJPW6Cw7TpQfO4');

        $url = 'https://android.googleapis.com/gcm/send';

        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => array('msg_type' => 'chat', 'msg_content' => $message, 'time' => $time)
        );

        $headers = array(
            'Authorization: key= AIzaSyCiF1lcWC-9n-UZi7Yx6wywb6xuRyAjUxU',
            'Content-Type: application/json'
        );

        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            //die('Curl failed: ' . curl_error($ch));
            curl_close($ch);
        } else {
            curl_close($ch);
            $image_path = base_url() . 'public_html/images/';
            $from_user = 'admin';
            $from_prof_pic = 'admin.jpg';
            $res = $this->Message_model->updateMessageTable($message, $from_user, $to_user, $time);
            if ($res) {
                $text .= '<div class="message right">
                                        <div class="message-text">' . $message . '</div>
                                            <img src="' . $image_path . 'faces/' . $from_prof_pic . '" class="user-picture" alt="">   </div>';
            }
        }
        echo $text;
        exit();
    }

    public function update_passenger_message() {

        $this->load->helper('date');
        $format = 'DATE_W3C';
        $time = standard_date($format, time());

        $message = $this->input->post('message');
        $to_user = $this->input->post('reciverid');

        $text = '';
        $image_path = base_url() . 'public_html/images/';
        $from_user = 'admin';
        $from_prof_pic = 'admin.jpg';
        $res = $this->Message_model->updatePassengerMessageTable($message, $from_user, $to_user, $time);
        if ($res) {
            $text .= '<div class="message right">
                                        <div class="message-text">' . $message . '</div>
                                            <img src="' . $image_path . 'faces/' . $from_prof_pic . '" class="user-picture" alt="">   </div>';
        }

        echo $text;
        exit();
    }

    public function chat_list($user_id) {
        $chat_history = '';
        $image_path = base_url() . 'public_html/images/';
        $from_prof_pic = $this->Message_model->getUserProfilePic($user_id);
        $res = $this->Message_model->getChatHistory($user_id);
        foreach ($res as $row) {
            if ($row['from_id'] == 'admin') {
                $chat_history .= '<div class="message right">
                                        <div class="message-text">' . $row['message'] . '</div>
                                            <img src="' . $image_path . 'faces/admin.jpg" class="user-picture" alt="">
                                            
                                        
                                    </div>';
            } else {
                $chat_history .= '<div class="message left">
                                        <div class="message-text">' . $row['message'] . '</div>  
                                             <img src="' . $image_path . 'faces/' . $from_prof_pic . '" class="user-picture" alt="">
                                    </div>';
            }
        }
        echo $chat_history;
        exit();
    }

    public function passenger_chat_list($user_id) {
        $chat_history = '';
        $image_path = base_url() . 'public_html/images/';
        $from_prof_pic = $this->Message_model->getPassengerProfilePic($user_id);
        $res = $this->Message_model->getPassengerChatHistory($user_id);
        foreach ($res as $row) {
            if ($row['from_id'] == 'admin') {
                $chat_history .= '<div class="message right">
                                        <div class="message-text">' . $row['message'] . '</div>
                                            <img src="' . $image_path . 'faces/admin.jpg" class="user-picture" alt="">
                                            
                                        
                                    </div>';
            } else {
                $chat_history .= '<div class="message left">
                                        <div class="message-text">' . $row['message'] . '</div>  
                                             <img src="' . $image_path . 'faces/' . $from_prof_pic . '" class="user-picture" alt="">
                                    </div>';
            }
        }
        echo $chat_history;
        exit();
    }

}
