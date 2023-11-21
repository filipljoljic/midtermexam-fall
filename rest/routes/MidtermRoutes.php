<?php


Flight::route('GET /connection-check', function(){
    Flight::midtermService();
    /** TODO
    * This endpoint prints the message from constructor within MidtermDao class
    * Goal is to check whether connection is successfully established or not
    * This endpoint does not have to return output in JSON format
    */
});

Flight::route('GET /cap-table', function(){
    Flight::json(Flight::midtermService()->cap_table());
    /** TODO
    * This endpoint returns list of all share classes within table named cap_table
    * Each class contains description field named 'class' and array of all categories within given class
    * Each category contains description field named 'category' and array of all investors that have shares within given category
    * Each investor has fields: 'diluted_shares' and 'investor' which is obtained by concatanation of first and last name of the investor
    * Outpus is given in figure 2
    * This endpoint should return output in JSON format
    */
});

Flight::route('POST /cap-table-record', function(){
    Flight::json(['id' => Flight::midtermService()->add_cap_table_record($data)]);
    /** TODO
    * This endpoint is used to add new record to cap-table database table. If added successfully output should be the added array with the id of the new record
    * Example output is given in figure 3
    * This endpoint should return output in JSON format
    */
});


Flight::route('GET /categories', function(){
    Flight::json(Flight::midtermService()->categories());
    /** TODO
    * This endpoint returns list of all categories with the total amount of diluted_shares for each category
    * Output example is given in figure 4
    * This endpoint should return output in JSON format
    */
});

Flight::route("DELETE /investor/@id", function($id){
    Flight::midtermService()->delete_investor($id);
    Flight::json(['message' => "Investor with ID $id has been deleted"]);
    /** TODO
    * This endpoint is used to delete investor
    * Endpoint should return the message whether investor has been deleted
    * This endpoint should return output in JSON format
    */
});

?>
