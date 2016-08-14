<?php

require_once('Core_Model.php');

class Excel_model extends Core_Model {
    
    private $obj_xml;
    public function __construct() {
        parent::__construct();
        require_once 'class-excel-xml.inc.php';
        $this->obj_xml = new Excel_XML();
    }

    

    function getDriverDetails($user_id = '') {
        $data = array();

        if ($user_id != '') {
            $this->db->where('user_id', $user_id);
            $this->db->limit(1);
        }
        $query = $this->db->get('driver_details');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $row['cab_type']=$this->getCabType($row['cab_name']);
            $data[] = $row;
            $i++;
        }
        return $data;
    }
    
    
    public function writeToExcel($doc_arr, $file_name) {
        $this->obj_xml->addArray($doc_arr);
        $this->obj_xml->generateXML("$file_name");
    }

     function getCabType($cab_name) {
        $name='';
        $this->db->select('type_short_name');
        $this->db->where('id', $cab_name);
        $query = $this->db->get('cab_register');

        foreach ($query->result_array() as $row) {
            $name = $row['type_short_name'];
        }
        return $name;
    }
    
    
    public function getProfiles() {
        $excel_array = array();
        $details_arr = $this->getDriverDetails();
        $detail_count = count($details_arr);
        $excel_array[1] = array("Pilot", "Nationality", "Email","Address", "Mobile", "Licence", "Cab Type", "Cab Model", "Cab Number","Bank Name",'A/c Number','Branch Code','Swift Code');
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $details_arr[$i - 2]['first_name'].' '.$details_arr[$i - 2]['last_name'];
            $excel_array[$i][1] = $details_arr[$i - 2]['nationality'];
            $excel_array[$i][2] = $details_arr[$i - 2]['email'];
            $excel_array[$i][4] = $details_arr[$i - 2]['address1'].','.$details_arr[$i - 2]['address2'].','.$details_arr[$i - 2]['address3'];
            $excel_array[$i][5] = $details_arr[$i - 2]['mobile1'];
            $excel_array[$i][6] = $details_arr[$i - 2]['licence'];
            $excel_array[$i][7] = $details_arr[$i - 2]['cab_type'];
            $excel_array[$i][8] = $details_arr[$i - 2]['cab_model'];
            $excel_array[$i][9] = $details_arr[$i - 2]['cab_number'];
            $excel_array[$i][10] = $details_arr[$i - 2]['bank_name'];
            $excel_array[$i][11] = $details_arr[$i - 2]['acc_number'];
            $excel_array[$i][12] = $details_arr[$i - 2]['branch_code'];
            $excel_array[$i][13] = $details_arr[$i - 2]['swift_code'];
        }
        return $excel_array;
    }

    public function getIncomeData($income_details) {
        $detail_count = count($income_details);

        $excel_array[1] = array("Pilot", "Trip ID", "Passenger", "Cab Type", "Trip From", "Trip To", "Start Time", "Total Time", "Total Fare", "Paid Status", "Pilot Wage");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $income_details[$i - 2]['driver'];
            $excel_array[$i][1] = $income_details[$i - 2]['unique_id'];
            $excel_array[$i][2] = $income_details[$i - 2]['passenger'];
            $excel_array[$i][3] = $income_details[$i - 2]['cabtype'];
            $excel_array[$i][4] = $income_details[$i - 2]['trip_from'];
            $excel_array[$i][5] = $income_details[$i - 2]['trip_to'];
            $excel_array[$i][6] = $income_details[$i - 2]['start_time'];
            $excel_array[$i][7] = $income_details[$i - 2]['total_time'];
            $excel_array[$i][8] = $income_details[$i - 2]['total_fare'];
            $excel_array[$i][9] = ucwords($income_details[$i - 2]['paid_status']);
            $excel_array[$i][10] = $income_details[$i - 2]['driver_commission'];            
        }
        return $excel_array;
    }

    public function getTripHistory($trip_history, $user_type) {
        $detail_count = count($trip_history);

        $excel_array[1] = array(($user_type == 'driver' ? "Passenger Name" : "Pilot Name"), "Trip ID", "Trip From", "Trip To", "Distance Travelled", "Start Time", "End Time", "Cab Type", "Travelled Time", "Initial Waiting", "On-Route Waiting", "Fare");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $user_type == 'driver' ? $trip_history[$i - 2]['passenger_name'] : $trip_history[$i - 2]['driver_name'];
            $excel_array[$i][1] = $trip_history[$i - 2]['unique_id'];
            $excel_array[$i][2] = $trip_history[$i - 2]['trip_from'];
            $excel_array[$i][3] = $trip_history[$i - 2]['trip_to'];
            $excel_array[$i][4] = $trip_history[$i - 2]['total_distance'] . ' KM';
            $excel_array[$i][5] = $trip_history[$i - 2]['start_time'];
            $excel_array[$i][6] = $trip_history[$i - 2]['stop_time'];
            $excel_array[$i][7] = $trip_history[$i - 2]['cab_type'];
            $excel_array[$i][8] = $trip_history[$i - 2]['total_time'] . ' min';
            $excel_array[$i][9] = $trip_history[$i - 2]['initial_charged'] . ' min';
            $excel_array[$i][10] = $trip_history[$i - 2]['additional_charged'] . ' min';
            $excel_array[$i][11] = $trip_history[$i - 2]['total_fare'];            
        }
        return $excel_array;
    }

    public function getOngoingTrips($active_trip) {
        $detail_count = count($active_trip);

        $excel_array[1] = array("Trip ID", "Pilot", "Passenger", "Cab Type", "Trip From", "Trip To", "Start Time");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $active_trip[$i - 2]['unique_id'];
            $excel_array[$i][1] = $active_trip[$i - 2]['driver_name'];
            $excel_array[$i][2] = $active_trip[$i - 2]['passenger_name'];
            $excel_array[$i][3] = $active_trip[$i - 2]['cab_type'];
            $excel_array[$i][4] = $active_trip[$i - 2]['trip_from'];
            $excel_array[$i][5] = $active_trip[$i - 2]['trip_to'] == '' ? 'NA' : $active_trip[$i - 2]['trip_to'];
            $excel_array[$i][6] = $active_trip[$i - 2]['start_time'];
        }
        return $excel_array;
    }

    public function getCompletedTrips($trip_list) {
        $detail_count = count($trip_list);

        $excel_array[1] = array("Trip ID", "Pilot", "Passenger", "Cab Type", "Trip From", "Trip To", "Start Time", "End Time", "Travelled Time", "Initial Waiting", "On-Route Waiting", "Distance Travelled", "Fare");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $trip_list[$i - 2]['unique_id'];
            $excel_array[$i][1] = $trip_list[$i - 2]['driver_name'];
            $excel_array[$i][2] = $trip_list[$i - 2]['passenger_name'];
            $excel_array[$i][3] = $trip_list[$i - 2]['cab_type'];
            $excel_array[$i][4] = $trip_list[$i - 2]['trip_from'];
            $excel_array[$i][5] = $trip_list[$i - 2]['trip_to'] == '' ? 'NA' : $trip_list[$i - 2]['trip_to'];
            $excel_array[$i][6] = $trip_list[$i - 2]['start_time'];
            $excel_array[$i][7] = $trip_list[$i - 2]['stop_time'];
            $excel_array[$i][8] = $trip_list[$i - 2]['total_time'] . ' min';
            $excel_array[$i][9] = $trip_list[$i - 2]['initial_charged'] . ' min';
            $excel_array[$i][10] = $trip_list[$i - 2]['additional_charged'] . ' min';
            $excel_array[$i][11] = $trip_list[$i - 2]['total_distance'] . ' KM';
            $excel_array[$i][12] = $trip_list[$i - 2]['total_fare'];
        }
        return $excel_array;
    }

    public function getMyReferrals($user_list) {
        $detail_count = count($user_list);

        $excel_array[1] = array("Username", "Fullname", "Mobile", "Email", "Rating");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $user_list[$i - 2]['user_name'];
            $excel_array[$i][1] = $user_list[$i - 2]['fullname'];
            $excel_array[$i][2] = $user_list[$i - 2]['mobile'];
            $excel_array[$i][3] = $user_list[$i - 2]['email'];
            $excel_array[$i][4] = $user_list[$i - 2]['rating'];            
        }
        return $excel_array;
    }

    public function getCustomerList($rating) {
        $detail_count = count($rating);

        $excel_array[1] = array("Name", "Rating", "Status");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $rating[$i - 2]['fullname'];
            $excel_array[$i][1] = round($rating[$i - 2]['rating'],2);
            $excel_array[$i][2] = $rating[$i - 2]['status'] == 'yes' ? 'Active' : 'Deactive';
        }
        return $excel_array;
    }

    public function getDriversList($rating) {
        $detail_count = count($rating);

        $excel_array[1] = array("Name", "Total Trips", "Rating", "Status");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $rating[$i - 2]['first_name'] . ' '  . $rating[$i - 2]['last_name'];
            $excel_array[$i][1] = $rating[$i - 2]['total_trip'];
            $excel_array[$i][2] = round($rating[$i - 2]['rating'],2);
            $excel_array[$i][3] = $rating[$i - 2]['status'] == 'yes' ? 'Active' : 'Deactive';
        }
        return $excel_array;
    }

    public function getBookedTrips($trip_details) {
        $detail_count = count($trip_details);

        $excel_array[1] = array("Trip Id", "Passenger Name", "Place", "Trip Start Date", "Trip End Date", "Preferred Cab", "Driver");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $trip_details[$i - 2]['unique_id'];
            $excel_array[$i][1] = $trip_details[$i - 2]['passenger_name'];
            $excel_array[$i][2] = $trip_details[$i - 2]['location'];
            $excel_array[$i][3] = $trip_details[$i - 2]['from_date'];
            $excel_array[$i][4] = $trip_details[$i - 2]['to_date'];
            $excel_array[$i][5] = $trip_details[$i - 2]['cab_type'];
            $excel_array[$i][6] = ($trip_details[$i - 2]['driver_name'] == '' ? 'Not Assigned' : $trip_details[$i - 2]['driver_name']);
        }
        return $excel_array;
    }

    public function getFundDetails($fund_details) {
        $detail_count = count($fund_details);
        $balance = 0;
        $amount_type = '';

        $excel_array[1] = array("Date", "Amount Type", "Amount", "Balance");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            
            if ($fund_details[$i - 2]['amount_type'] == "admin_credit") {
                $amount_type = "Credited By Admin";
                $balance = $balance + $fund_details[$i - 2]['amount'];
            
            } else if ($fund_details[$i - 2]['amount_type'] == "admin_debit") {
                $amount_type = "Debited By Admin";
                $balance = $balance - $fund_details[$i - 2]['amount'];
            
            } else if ($fund_details[$i - 2]['amount_type'] == "ewallet_payment") {
                $amount_type = "Ewallet Payment";
                $balance = $balance - $fund_details[$i - 2]['amount'];

            } else if ($fund_details[$i - 2]['amount_type'] == "Referral Point") {
                $amount_type = "Referral Point";
                $balance = $balance + $fund_details[$i - 2]['amount'];

            } else if ($fund_details[$i - 2]['amount_type'] == "Trip Payment") {
                $amount_type = "Trip Payment";
                $balance = $balance - $fund_details[$i - 2]['amount'];
            
            }  else {
                $amount_type = $fund_details[$i - 2]['amount_type'];
                $balance = $balance + $fund_details[$i - 2]['amount'];
            }

            $excel_array[$i][0] = $fund_details[$i - 2]['date'];
            $excel_array[$i][1] = $amount_type;
            $excel_array[$i][2] = round($fund_details[$i - 2]['amount'],2);
            $excel_array[$i][3] = round($balance,2);            
        }
        return $excel_array;
    }

    public function getAllCoupons($cpn) {
        $detail_count = count($cpn);

        $excel_array[1] = array("Coupon Text", "Created time", "Expiry",  "Amount", "Count", "Used Count", "Send User Count");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $cpn[$i - 2]['coupon_text'];
           // $excel_array[$i][1] = $cpn[$i - 2]['coupon_code'];
            $excel_array[$i][2] = $cpn[$i - 2]['created_time'];
            $excel_array[$i][3] = $cpn[$i - 2]['expiry_date'];
            $excel_array[$i][4] = $cpn[$i - 2]['amount'] . ($cpn[$i - 2]['amount_or_percentage'] == 'percent' ? '%' : '');
            $excel_array[$i][5] = $cpn[$i - 2]['count'];
            $excel_array[$i][6] = $cpn[$i - 2]['used_count'];
            $excel_array[$i][7] = $cpn[$i - 2]['send_count'];
        }
        return $excel_array;
    }

    public function getTripReport($trip_history) {
        $detail_count = count($trip_history);

        $excel_array[1] = array("Trip ID", "Pilot", "Passenger", "Cab Type", "Trip From", "Trip To",  "Start Time", "End Time", "Distance Travelled", "Travelled Time", "Initial Waiting", "On-Route Waiting", "Fare");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $trip_history[$i - 2]['unique_id'];
            $excel_array[$i][1] = $trip_history[$i - 2]['driver_name'];
            $excel_array[$i][2] = $trip_history[$i - 2]['passenger_name'];
            $excel_array[$i][3] = $trip_history[$i - 2]['cab_type'];
            $excel_array[$i][4] = $trip_history[$i - 2]['trip_from'];
            $excel_array[$i][5] = $trip_history[$i - 2]['trip_to'];
            $excel_array[$i][6] = $trip_history[$i - 2]['start_time'];
            $excel_array[$i][7] = $trip_history[$i - 2]['stop_time'];
            $excel_array[$i][8] = $trip_history[$i - 2]['total_distance'] . " KM";
            $excel_array[$i][9] = $trip_history[$i - 2]['total_time'] . ' min';
            $excel_array[$i][10] = $trip_history[$i - 2]['initial_charged'] . ' min';
            $excel_array[$i][11] = $trip_history[$i - 2]['additional_charged'] . ' min';
            $excel_array[$i][12] = $trip_history[$i - 2]['total_fare'];
        }
        return $excel_array;
    }

    public function getActiveTripDetails($trip_details) {
        $detail_count = count($trip_details);

        $excel_array[1] = array("Trip ID", "Pilot", "Passenger", "Cab Type", "Trip From", "Trip To",  "Start Time");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $trip_details[$i - 2]['unique_id'];
            $excel_array[$i][1] = $trip_details[$i - 2]['driver_name'];
            $excel_array[$i][2] = $trip_details[$i - 2]['passenger_name'];
            $excel_array[$i][3] = $trip_details[$i - 2]['cab_type'];
            $excel_array[$i][4] = $trip_details[$i - 2]['trip_from'];
            $excel_array[$i][5] = $trip_details[$i - 2]['trip_to'] == '' ? 'NA' : $trip_details[$i - 2]['trip_to'];
            $excel_array[$i][6] = $trip_details[$i - 2]['start_time'];            
        }
        return $excel_array;
    }

    public function getTodaysCancelledTrips($trip_list) {
        $detail_count = count($trip_list);

        $excel_array[1] = array("Trip ID", "Pilot", "Passenger", "Trip From", "Trip To",  "Cancelled by", "Reason");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $trip_list[$i - 2]['unique_id'];
            $excel_array[$i][1] = $trip_list[$i - 2]['driver'];
            $excel_array[$i][2] = $trip_list[$i - 2]['passenger'];
            $excel_array[$i][3] = $trip_list[$i - 2]['trip_from'];
            $excel_array[$i][4] = $trip_list[$i - 2]['trip_to'] == '' ? 'NA' : $trip_list[$i - 2]['trip_to'];
            $excel_array[$i][5] = $trip_list[$i - 2]['cancelled_by'];            
            $excel_array[$i][6] = $trip_list[$i - 2]['reason'];            
        }
        return $excel_array;
    }

    public function getMonthlyPaymentSummary($income_details) {
        $detail_count = count($income_details);

        $excel_array[1] = array("Pilot", "Amount", "Pilot Wage");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $income_details[$i - 2]['driver'];
            $excel_array[$i][1] = $income_details[$i - 2]['total_fare'];
            $excel_array[$i][2] = $income_details[$i - 2]['driver_commission'];            
        }
        return $excel_array;
    }

    public function getMonthlyPayment($income_details) {
        $detail_count = count($income_details);

        $excel_array[1] = array("Trip ID", "Passenger", "Amount", "Pilot Wage");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $income_details[$i - 2]['unique_id'];
            $excel_array[$i][1] = $income_details[$i - 2]['passenger'];
            $excel_array[$i][2] = $income_details[$i - 2]['total_fare'];
            $excel_array[$i][3] = $income_details[$i - 2]['driver_commission'];
        }
        return $excel_array;
    }

    public function getCustomerSummaryReport($income_details) {
        $detail_count = count($income_details);

        $excel_array[1] = array("Passenger", "Amount", "Paid Amount");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $income_details[$i - 2]['passenger'];
            $excel_array[$i][1] = $income_details[$i - 2]['total_fare'];
            $excel_array[$i][2] = $income_details[$i - 2]['payment'];            
        }
        return $excel_array;
    }

     public function getCustomerIncomeReport($income_details) {
        $detail_count = count($income_details);

        $excel_array[1] = array("Trip ID", "Pilot", "Amount", "Paid Amount");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $income_details[$i - 2]['unique_id'];
            $excel_array[$i][1] = $income_details[$i - 2]['driver'];
            $excel_array[$i][2] = $income_details[$i - 2]['total_fare'];
            $excel_array[$i][3] = $income_details[$i - 2]['payment'];
        }
        return $excel_array;
    }
    
}
