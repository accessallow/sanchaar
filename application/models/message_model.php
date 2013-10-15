<?php
class Message_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
        public function read_message($id){
             $this->db->where(array(
                 'id'=>$id
             ));
             $query=$this->db->get('messages');
             return $query->row_array();
        }
        public function write_message($sender,$reciever,$message){
            
            
            $message = array(
                
            );
            $this->db->insert('mesages',$message);
        }
        public function get_messages_inbox($username){
            $this->db->where(array(
                'reciever_username'=>$username
            ));
            $this->db->get('messages');
        }
        public function get_messages_sentbox($username){
            $this->db->where(array(
                'sender_username'=>$username
            ));
            $this->db->get('messages');
        }
        public function delete_message_sender($id){
            $data=array(
                'sender_bit'=>'0'
            );
            $this->db->where('id', $id);
            $this->db->update('messages', $data); 
            if($this->check_both_bits($id)){
                $this->delete_message_forever($id);
            }
        } 
        public function delete_message_reciever($id){
               $data=array(
                'reciever_bit'=>'0'
            );
            $this->db->where('id', $id);
            $this->db->update('messages', $data); 
             if($this->check_both_bits($id)){
                $this->delete_message_forever($id);
            }
        } 
        public function delete_message_forever($id){
         $this->db->delete('messages', array('id' => $id)); 
        } 
        public function check_both_bits($id){
            $this->db->where(array(
                'id'=>$id,
                'sender_bit'=>'0',
                'reciever_bit'=>'1'
            ));
            $query=$this->db->get('messages');
            if($query->num_rows==1){
                return true;
            }else{
                return false;
            }
        }

}
