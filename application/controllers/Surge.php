<?php

class Surge extends Core_Controller {


    public function Create_surge_area() {

        $title = 'Create New Surge';
        $this->set('title', $title);
        $this->set('page_heading', 'Create New Surge');
        $this->set('page_summery', '');
        $this->set('page_name', 'Create New Surge');


        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('surge_name', 'Surge Name', 'required|trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $error = $this->form_validation->error_array();
                $this->session->set_userdata('error', $error);
                $this->redirect('Surge name Required', 'Surge/Create_surge_area', false);
            } else {
                $surge_name = $this->security->xss_clean(trim($this->input->post('surge_name')));
                $surge_radious = $this->security->xss_clean(trim($this->input->post('surge_radious')));
                $surge_lat = $this->security->xss_clean(trim($this->input->post('surge_lat')));
                $surge_lng = $this->security->xss_clean(trim($this->input->post('surge_lng')));
                $res = $this->Surge_model->insertSurgeDetails($surge_name, $surge_radious, $surge_lat, $surge_lng);
                if ($res) {
                    $this->redirect('Surge ' . $surge_name . ' added successfully', 'Surge/Surge_management', true);
                }
            }
        }


        $this->view('Create_surge_area');
    }

    public function Surge_view() {
        $title = 'Surge';
        $this->set('title', $title);
        $this->set('page_heading', 'Surge');
        $this->set('page_summery', '');
        $this->set('page_name', 'Surge');
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $sur = $this->Surge_model->getAreaDetails($id);


            $driver_list = $this->Surge_model->driversInSurge($sur['latitude'], $sur['longitude'], $sur['radious']);

            $location = array();
            $i = 0;
            foreach ($driver_list as $value) {
                $location[$i]['lat'] = $value['latitude'];
                $location[$i]['lon'] = $value['longitude'];
                $location[$i]['descr'] = $value['driver_name'];
                $location[$i]['title'] = $value['user_name'];
                $location[$i]['gval'] = '25.5';
                $location[$i]['aType'] = 'Non-Commodity';
                $location[$i]['address'] = 'Paris';
                $i++;
            }
            
            $this->set('radious', $sur['radious']*1609.34);
            $this->set('latitude', $sur['latitude']);
            $this->set('longitude', $sur['longitude']);
            $this->set('area_name', $sur['name']);
            $this->set('location', json_encode($location));
            $this->set('driver_list', $driver_list);
        } else {
            $this->redirect('', 'Surge/Surge_management', true);
        }

        $this->view('Surge_view');
    }
    public function Customer_surge() {
        $title = 'Surge';
        $this->set('title', $title);
        $this->set('page_heading', 'Surge');
        $this->set('page_summery', '');
        $this->set('page_name', 'Surge');
        if ($this->input->post('submit')) {
            $id = $this->input->post('id');
            $sur = $this->Surge_model->getAreaDetails($id);


            $driver_list = $this->Surge_model->customersInSurge($sur['latitude'], $sur['longitude'], $sur['radious']);

            $location = array();
            $i = 0;
            foreach ($driver_list as $value) {
                $location[$i]['lat'] = $value['latitude'];
                $location[$i]['lon'] = $value['longitude'];
                $location[$i]['descr'] = $value['driver_name'];
                //$location[$i]['title'] = $value['user_name'];
                $location[$i]['gval'] = '25.5';
                $location[$i]['aType'] = 'Non-Commodity';
                $location[$i]['address'] = 'Paris';
                $i++;
            }
            
            $this->set('radious', $sur['radious']*1609.34);
            $this->set('latitude', $sur['latitude']);
            $this->set('longitude', $sur['longitude']);
            $this->set('area_name', $sur['name']);
            $this->set('location', json_encode($location));
             $this->set('driver_list', $driver_list);
        } else {
            $this->redirect('', 'Surge/Surge_management', true);
        }

        $this->view('Customer_surge_view');
    }

    public function Surge_management() {

        $title = 'Surge Management';
        $this->set('title', $title);
        $this->set('page_heading', 'Surge Management');
        $this->set('page_summery', '');
        $this->set('page_name', 'Surge Management');
         if ($this->input->post('delete')) {
                $id = $this->security->xss_clean(trim($this->input->post('id')));
                $res = $this->Surge_model->deleteSurge($id);
        }

        $area_list = $this->Surge_model->areaList();
        $this->set('area_list', $area_list);
        $this->view('Surge_management');
    }

    
}
