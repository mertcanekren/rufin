<?php
/* @tarih: 18/12/2013
 * @olusturan: Mertcan Ekren <mertcanekren@windowslive.com>
 * @aciklama: Kullanıcıların veritabanı işlemlerini yapar
 */
class User_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->tablename = "users";
    }


    /**
     * addUser
     *
     * Kullanıcı eklemek için kullanılır.
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @param $data: array
     * @return bool
     */
    public function addUser($data = array()){
        $form_data['createtime'] = time();
        if($this->db->insert('users', $data)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * editUser
     *
     * Array şekilden gönderilen kullanıcı bilgilerini
     * veritabanında olan bilgileri ile değiştirir.
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @param $data: array
     * @return bool
     */
    public function editUser($id,$form_data=array()){
        $not_data['lastupdate'] = time();
        $this->db->where('id', $id);
        if($this->db->update('users', $form_data)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * CheckEmail
     *
     * Gönderilen email adresinin veritabanında
     * olup olmadığını denetler.
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @param $email: string
     * @return int
     */
    public function checkEmail($email){
        $check = $this->db->get_where('users', array('email' => $email));
        return $check->result_array();
    }

    /**
     * getUserbyEmailandPassword
     *
     * Fonksiyona gönderilen string kökenli isim parametresini veritabanında arar.
     * Eğer eşit bir kayıt bulursa array bulamazsa false döndürür
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @param $email: string, $password: string
     * @return array
     */
    public function getUserbyEmailandPassword($email,$password){
        $check = $this->db->get_where('users', array('email' => $email,'password' => sha1($password)));
        if($check->num_rows > 0){
            $data = $check->result_array();
            return $data[0];
        } else {
            return False;
        }
    }

    /**
     * getUserbyId
     *
     * id bilgisi gönderilen kullanıcının veritabanından bilgilerini
     * döndürür.
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @param $id: int
     * @return array
     */
    public function getUserbyId($id){
        $check = $this->db->get_where('users', array('id' => $id));
        if($check->num_rows > 0){
            $data = $check->result_array();
            return $data[0];
        } else {
            return False;
        }
    }

    /**
     * getUserbyEmail
     *
     * email bilgisi gönderilen kullanıcının veritabanından bilgilerini
     * döndürür.
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @param $email: string
     * @return array
     */
    public function getUserbyEmail($email){
        $check = $this->db->get_where('users', array('email' => $email));
        if($check->num_rows > 0){
            $data = $check->result_array();
            return $data[0];
        } else {
            return False;
        }
    }

    /**
     * checkLogin
     *
     * Login olmak isteyen kullanıcının aktiflik durumunu inceler
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @param $email: string, $password: string
     * @return bool
     */
    public function checkLogin($email,$password){
        $check = $this->db->get_where('users', array('email' => $email,'password' => sha1($password), 'status' => 't'));
        if($check->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * updateLastvisitbyId
     *
     * id bilgisi gönderile kullanıcının son giriş alanını günceller
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @param id: int
     */
    public function updateLastvisitbyId($id){
        $data = array(
            'lastvisit' => time(),
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    /**
     * count
     *
     * users tablosunda bulunan kayıtların sayısını döndürür
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @return int
     */
    public function count(){
        return $this->db->count_all($this->tablename);
    }
}
?>