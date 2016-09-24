<?php
class Users_model extends CI_Model {

        /*
        * Basic requirement on the db schema:
        * Table Name: Users
        * Required Fields:
        *                   int     uid
        *                   varchar username
        *                   varchar email
        *                   varchar password
        *                   date    lastlogin
        *                   text    json
        *
        * Temporary Structure of json
        var udata =
        {
            "username" : "John Doe",
            "petname" : "Pet Sue",
            "level" : 2,
            "exp" : 50,
            "food" : 50,
            "health" : 60,
            "happiness" : 75,
            "gold" : 16,

            "tasks" : [
                {"name" : "Brush Teeth", "type" : "dailies", "completed" : false, "difficulty" : 1, "reward" : "health"},
                {"name" : "Exercise 1 hour", "type" : "dailies", "completed" : false, "difficulty" : 1, "reward" : "health"},
                {"name" : "Eat no junk food", "type" : "dailies", "completed" : false, "difficulty" : 1, "reward" : "health"},
                {"name" : "Pack your backpack", "type" : "dailies", "completed" : true, "difficulty" : 1, "reward" : "food"},
                {"name" : "Finish all Homework", "type" : "dailies", "completed" : false, "difficulty" : 2, "reward" : "food"},
                {"name" : "Do chores", "type" : "dailies", "completed" : false, "difficulty" : 1, "reward" : "happiness"},
                {"name" : "Offer help to someone", "type" : "dailies", "completed" : false, "difficulty" : 3, "reward" : "happiness"},
                {"name" : "Finish Math Group Project", "type" : "todo", "completed" : false, "difficulty" : 2, "reward" : "food"},
                {"name" : "Purchase school supply", "type" : "todo", "completed" : false, "difficulty" : 1, "reward" : "happiness"},
                {"name" : "Help clean the yard", "type" : "todo", "completed" : false, "difficulty" : 3, "reward" : "happiness"},
                {"name" : "Attend school sport events", "type" : "todo", "completed" : false, "difficulty" : 2, "reward" : "health"}
            ],


            "items" : [
                {"name" : "breadstick", "type" : "food", "value" : 10},
                {"name" : "breadstick", "type" : "food", "value" : 10}
            ]
        };
        */

        public function __construct()
        {
                $this->load->database();
        }

        public function get_user_info_all($uid)
        {
            $sql = "Select * from users where uid = ".$uid.";";
            $query = $this->db->query($sql);
            return $query;
        }

        /**
        * Return a json containing essential fields for frontend,
        * note that username might have already existed in the json field
        * @param uid
        * @return String of json for direct frontend access
        */
        public function get_user_info_all_json($uid)
        {
            $query = $this->get_user_info_all($uid);
            $row = $query->row_array();
            $djson = json_decode($row['json'], true);
            $uarr = array('username' => $row['username']);
            $result = array_merge($djson, $uarr);
            $udata = json_encode($result);
            return $udata;
        }

        public function update_user_info_all_json($uid, $udata)
        {
            $data = array(
                'json' => $udata
            );
            $this->db->where('uid',$uid);
            $this->db->update('users',$data);
        }

        public function get_username_by_id($uid)
        {
        	$sql = "Select username from users where uid = ".$uid.";";
        	$query = $this->db->query($sql);
        	return $query;
        }


}
