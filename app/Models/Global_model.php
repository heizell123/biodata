<?php 

namespace App\Models;

use CodeIgniter\Model;

class Global_model extends Model
{

	public function getTable($tableName,$where){
		$table = $this->db->table($tableName)
		->where($where)
		->get()->getResultArray();
		return $table;
	}

    public function table($tableName){
        $table = $this->db->table($tableName)
        ->get()->getResultArray();
        return $table;
    }

	public function selectQuery($query){
		$db = db_connect();
		return $db->query($query)->getResultArray();
	}
	public function get_menu($idrole){


		$sql="SELECT * from menumst where menu_allowed like '%+".$idrole."%' and show_menu='1' and parent='0' ORDER BY number ASC";
        
        $categories = $this->selectQuery($sql);
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]['sub'] = $this->get_sub_menu($p_cat['id'],$idrole);
            $i++;
        }
        return $categories;
    }

    public function get_sub_menu($id,$idrole){

		$sql="select * from menumst where menu_allowed like '%+".$idrole."%'and parent='".$id."' and show_menu='1' ORDER BY number ASC";
        
        $categories = $this->selectQuery($sql);
        $i=0;
        foreach($categories as $p_cat){
            $categories[$i]['sub'] = $this->get_sub_menu($p_cat['id'],$idrole);
            $i++;
        }
        return $categories;       
    }

    public function get_bawahan($id){
        $sql= "SELECT * FROM employee_dashboard AS a JOIN tree AS b ON a.employee_id=b.employee_id where a.v_status='join' AND b.direct_supervisor='".$id."'";
        return $result = $this->selectQuery($sql);
    }

    public function get_atasan($id){
        $sql= "SELECT *,a.employee_id AS indirect_supervisor_id FROM employee_dashboard AS a JOIN tree AS b ON a.employee_id=b.direct_supervisor where a.v_status='join' AND b.employee_id='".$id."'";
        return $result = $this->selectQuery($sql);
    }

    
    public function get_scd($id){

        $table = $this->db->table('employee_dashboard')
        ->join('score_card', 'employee_dashboard.employee_id = score_card.employee_id')
        ->join('score_card_detail', 'score_card_detail.sc_id = score_card.sc_id')
        ->select('employee_dashboard.employee_name,score_card_detail.acivement_grade,score_card_detail.weight_spv')
        ->where('score_card_detail.cascade_id',$id)
        ->get()->getResultArray();

        return $table;
    }

    public function updateTable($tableName,$where,$data){
        $db= \Config\Database::connect();
        $db->table($tableName)->where($where)->update($data);
    }

    public function insertTable($tableName,$data){
        $db= \Config\Database::connect();
        $db->table($tableName)->insert($data);
        return $db->insertID();
    }

    public function deleteTable($tableName,$where){
        $db= \Config\Database::connect();
        $db->table($tableName)->where($where)->delete();
    }

    public function truncateTable($tableName){
        $db= \Config\Database::connect();
        $db->table($tableName)->emptyTable();
    }

    public function checkPeriod($employee_id,$start_date,$end_date,$ep_id){
        $table = $this->db->table('score_card')
        ->where('employee_id',$employee_id)
        ->where('ep_id',$ep_id)
        ->where('start_date BETWEEN "'.$start_date.'" AND "'.$end_date.'"')
        ->where('end_date BETWEEN "'.$start_date.'" AND "'.$end_date.'"')
        ->get()->getResultArray();
        return $table;
    }

    public function setup_atasan($id){

        $table = $this->db->table('setup_atasan AS a')
        ->join('setup_atasan_details AS b', 'b.setup_atasan_id = a.setup_atasan_id')
        ->select('a.*')
        ->where('b.employee_id',$id)
        ->get()->getResultArray();

        return $table;
    }

    public function getEP($employee_id){

        $query = 'SELECT a.ep_id,b.level_name,c.position_name,d.divisi_name FROM employee_position AS a JOIN level AS b ON a.level_id = b.level_id JOIN position AS c ON c.position_id=a.position_id JOIN divisi AS d ON d.divisi_id=a.divisi_id where a.employee_id="'.$employee_id.'"';
        return $this->selectQuery($query);
    }

    public function getEmployeeFamily($employee_id){

        $table = $this->db->table('employee_dashboard AS a')
        ->join('employee_family AS b', 'b.employee_id = a.employee_id')
        ->join('relation AS c', 'c.relation_id = b.relation_id')
        ->select('*')
        ->where('b.employee_id',$employee_id)
        ->get()->getResultArray();

        return $table;
    }

    public function getReportSC($where){

        $query = "SELECT DISTINCT c.*,b.*,e.divisi_name,d.position_name FROM score_card AS a JOIN employee_dashboard AS b ON a.employee_id=b.employee_id JOIN employee_position AS c ON c.ep_id=a.ep_id JOIN position AS d ON c.position_id=d.position_id JOIN divisi AS e ON c.divisi_id=e.divisi_id ".$where;
        return $this->selectQuery($query);
    }

    public function getMenumst($ckview){
        $table = $this->db->table('menumst')
        ->whereNotIn('id',$ckview)
        ->select('id')
        ->get()->getResultArray();
        return $table;
    }

}