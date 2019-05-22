<?php 
class Common_model extends CI_Model {

       

        public function getByCondition($table,$condition)
        {
                $this->db->select('*');
                $this->db->from($table);
                foreach ($condition as $key => $value) {
                        $this->db->where($key,$value);
                }
                $query = $this->db->get();

                return $query->result();
        }
        public function insert($table,$data){

                $this->db->insert($table, $data);
                return $this->db->insert_id(); 
        }
        public function getAll($table)
        {
                $query = $this->db->get($table);
                return $query->result();
        }
        public function delete($table,$data){
                $this->db->delete($table,$data); 
        }
        public function updateWhere($table,$column,$condition){
                foreach ($condition as $key => $value) {
                        $this->db->where($key,$value);
                }
                $this->db->update($table, $column); 
                
        }
        public function getServices($table,$condition){
               $rs = $this->db->query('select name from '.$table.' where id in ('.$condition.')');
              
               return $rs->result(); 
        }

       

}