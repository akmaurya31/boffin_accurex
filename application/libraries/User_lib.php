<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_lib
{
    protected $CI;

    public function __construct()
    {
        // Get CI instance
        $this->CI =& get_instance();
    }

    public function getRoleBasedOnUserID($user_ID){
        $query = $this->CI->db->select('role_ID')
                              ->from('users')
                              ->where('user_ID',$user_ID)
                              ->get();
        return $query->result();
    }

    public function get_allowed_ips($user_id){
        $this->CI->db->select('ip_address');
        $this->CI->db->where('user_ID', $user_id);
        $query = $this->CI->db->get('user_ips');

        return array_column($query->result_array(), 'ip_address');
    }

    public function has_permission($segment, $action) {
        $user_id = $this->CI->session->userdata('user_ID');

        $this->CI->db->select('permissions.id')
            ->from('users')
            ->join('roles', 'roles.id = users.role_id')
            ->join('role_permissions', 'role_permissions.role_id = roles.id')
            ->join('permissions', 'permissions.id = role_permissions.permission_id')
            ->where('users.id', $user_id)
            ->where('permissions.segment', $segment)
            ->where('permissions.action', $action);

        $query = $this->CI->db->get();
        return $query->num_rows() > 0;
    }

    public function getUserInfoByAuthID($authID){
        $user = $this->CI->db->select('*')
                             ->from('auth')
                             ->where('auth_ID',$authID)
                             ->join('users','users.user_ID = auth.user_ID')
                             ->join('users_key_db','users_key_db.user_ID = auth.user_ID')
                             ->get();
        return $user->result();
    }

    public function read_notification($id){
        $query = $this->CI->db->set('status','seen')
                              ->where('notification_ID',$id)
                              ->update('notifications');
        return $this->CI->db->affected_rows();
    }

    public function getAllNotificationDESC($user_ID){
        $query = $this->CI->db->select("*,notifications.status as noti_status")
                        ->from("notifications")
                        ->where("receipent_user_ID",$user_ID)
                        ->order_by("notification_ID","DESC")
                        ->join('users','users.user_ID = notifications.forworded_user_ID')
                        ->get();
        return $query->result();
    }

    public function getInitials($fullName) {
        // Trim and explode by spaces
        $names = explode(' ', trim($fullName));

        $firstInitial = isset($names[0]) ? substr($names[0], 0, 1) : '';
        $lastInitial = count($names) > 1 ? substr($names[count($names) - 1], 0, 1) : '';

        return strtoupper($firstInitial . $lastInitial);
    }

    public function getNotificationByNotificationID($id){
        $query = $this->CI->db->select("*,notifications.status as noti_status")
                                ->from("notifications")
                                ->where("notification_ID",$id)
                                ->join('users','users.user_ID = notifications.forworded_user_ID')
                                ->get();
        return $query->result();
    }

    function timeAgo($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = [
            'y' => 'y',
            'm' => 'month',
            'w' => 'w',
            'd' => 'd',
            'h' => 'h',
            'i' => 'm',
            's' => 's',
        ];

        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 2);
        return $string ? implode(' ', $string) . ' ago' : 'just now';
    }

    public function setAsSeen($id){
        $query = $this->CI->db->set('status','seen')
                              ->where('notification_ID',$id)
                              ->update('notifications');
        return $this->CI->db->affected_rows();
    }

    public function get_all_roles() {
        return $this->CI->db->get('roles')->result();
    }

    public function saveUserData($tbl,$array){
        $this->CI->db->insert($tbl,$array);
        return $this->CI->db->insert_id();
    }

    public function get_all_users() {
        return $this->CI->db->get('users')->result();
    }

    public function getRolePermitionForUser($roleID){
        return $this->CI->db->where('role_id',$roleID)->get('role_permissions')->result();
    }

    public function permittions(){
        $query = $this->CI->db->distinct()
                     ->select('segment,id')
                    ->get('permissions');
        return $query->result();
    }

    public function is_has_access($segment){
        $query = $this->CI->db->select('*')
                              ->from('role_permissions')
                              ->where('role_id',$this->CI->session->userdata('role_ID'))
                              ->where('permission_id',$segment)
                              ->get();
        $result = $query->result();

        if(count($result) > 0){
            return true;
        }else{
            return false;
        }
    }




}
