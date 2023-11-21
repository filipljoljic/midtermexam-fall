<?php
require_once __DIR__."/../dao/MidtermDao.php";

class MidtermService {
    protected $dao;

    public function __construct(){
        $this->dao = new MidtermDao();
    }

    /** TODO
    * Implement service method to return detailed cap-table
    */
    public function cap_table(){
        return $this->dao->cap_table();

        /*
        $initialData = $this->dao->cap_table();
        $result = array();

        foreach($initialData as $row){
            $share_class_id = $row['share_class_id'];
            $share_class_category_id = $row['share_class_category_id'];
            $investor_id = $row['investor_id'];

            $share_class = this->dao->getShareClass($share_class_id);
            $share_class_category = this->dao->getShareClassCategory($share_class_category_id);
            $investor = this->dao->getInvestor($investor_id);

            $result['class'] = // CLASS DESCRIPTION;
            "temp";
        }

        return $initialData;
        */
    }


    /** TODO
    * Implement service method to add cap table record
    */
    public function add_cap_table_record(){
        return $this->dao->add_cap_table_record();
    }

    /** TODO
    * Implement service method to return list of categories with total shares amount
    */
    public function categories(){
        return $this->dao->categories();
    }

    /** TODO
    * Implement service method to delete investor
    */
    public function delete_investor($id){
        return $this->dao->delete_investor();
    }
}
?>
