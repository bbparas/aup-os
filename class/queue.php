<?php
    /*  queue.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        updated: Aug 17, 2013
        desc: queue class for storing jobs
    
    */
    
    class Queue {
        protected $_queue = array();
        
        function __construct() {
            echo "initiated queue";
        }
        
        function insertJob($job) {
            $this->_queue[$job->arrival] = $job;            
        }
        
        function removeJob($arrivalTime) {
            if(isset($this->_queue[$arrivalTime])) {
                unset($this->_queue[$arrivalTime]);    
            }
            else {
                echo "error: the job is not present in the queue";
            }
            
        }
        
        function viewQueue() {
            echo "<pre>";
            print_r($this->_queue);
            echo "</pre>";
        }
    }
?>
