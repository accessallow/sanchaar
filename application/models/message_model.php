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
           $this->load->helper('date'); 
            
            $message = array(
                'sender_username'=>$sender,
                'reciever_username'=>$reciever,
                'status'=>'0',
                'msg'=>$message,
                'time'=>  now(),
                'sender_bit'=>'n',
                'reciever_bit'=>'n'
            );
            $this->db->insert('messages',$message);
        }
        public function get_messages_inbox($username){
            $this->db->where(array(
                'reciever_username'=>$username,
                'reciever_bit !='=>'d'
            ));
            $this->db->order_by("id", "desc");
            $query=$this->db->get('messages');
            return $query->result_array();
        }
        public function get_messages_sentbox($username){
            $this->db->where(array(
                'sender_username'=>$username,
                'sender_bit !='=>'d'
            ));
             $this->db->order_by("id", "desc");
             $query=$this->db->get('messages');
             return $query->result_array();
        }
        public function delete_message_sender($id){
            $data=array(
                'sender_bit'=>'d'
            );
            $this->db->where('id', $id);
            $this->db->update('messages', $data); 
            if($this->check_both_bits($id)){
                $this->delete_message_forever($id);
            }
        } 
        public function delete_message_reciever($id){
               $data=array(
                'reciever_bit'=>'d'
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
                'sender_bit'=>'d',
                'reciever_bit'=>'d'
            ));
            $query=$this->db->get('messages');
            if($query->num_rows==1){
                return true;
            }else{
                return false;
            }
        }

}
