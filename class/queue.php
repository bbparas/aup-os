<?php
    /*  queue.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        updated: Aug 18, 2013
        desc: queue class for storing jobs
    
    */
    
    class Queue {
        protected $_queue = array();
        
        function __construct() {
            echo "initiated queue";
        }
        
        function insertJob(Job $job) {
            $this->_queue[$job->arrival."-".$job->name] = $job;            
        }
        
        function viewQueue() { //for debuggin purpose only
            echo "<pre>";
            print_r($this->_queue);
            echo "</pre>";
        }
        
        function isEmpty() {
            if(empty($this->_queue)) {
                return true;
            }
            else {
                return false;
            }
        }
        
        function __get($key) {
            if(isset($this->_queue[$key])) {
                return $this->_queue[$key];    
            }
            else {
                echo "error: key is not found or value is not yet set";
            }
        }
    }
?>
