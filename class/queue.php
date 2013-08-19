<?php
    /*  queue.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        updated: Aug 19, 2013
        desc: queue class for storing jobs
    
    */
    
    class Queue {
        public $queueType;
        protected $_queue = array();
        
        function __construct() {
            echo "initiated queue<br/>";
        }
        
        function insertJob(Job $job) {
            $this->_queue[$job->arrival."-".$job->name] = $job;            
        }
        
        function insertJobArray(Array $group) {
            foreach($group as $job) {
                $this->insertJob($job);
            }
            ksort($this->_queue);
        }
        
        function viewQueue() { //for debuggin purpose only
            if(!empty($this->_queue)) {
                $view = "";
                foreach($this->_queue as $job) {
                    $view .= "name: ".$job->name."<br/>";
                    $view .= "arrival: ".$job->arrival."<br/>";
                    $view .= "burst: ".$job->burst."<br/>";
                    $view .="priority: ".$job->priority."<br/><br/>";
                }
                return $view;
            }
        }
        
        function removeJob(Job $job) {
            unset($this->_queue[$job->arrival."-".$job->name]);    
        }
        
        function getShortest($key, Array $array) {
            foreach($array as $job) {
                if(!isset($shortest)) {
                    $shortest[] = $job;
                }
                else {
                    if($shortest->$key > $job->$key) {
                        unset($shortest);
                        $shortest[] = $job;
                    }
                    elseif($shortest->$key == $job->$key) {
                        $shortest[] = $job;
                    }
                }
            }
            
            if(count($shortest) == 1) {
                $shortest = $shortest[0];
            }
                
            return $shortest;
        }
        
        function isEmpty() {
            if(empty($this->_queue)) {
                return true;
            }
            else {
                return false;
            }
        }
        
    }
?>
