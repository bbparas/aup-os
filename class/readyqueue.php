<?php
    /*  readyqueue.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        update: Aug 17, 2013
        desc: ready queue or memory for holding jobs
        
    */
    
    class ReadyQueue extends Queue{
        
        protected $_jobQueue;
        
        function ReadyQueue(JobQueue $jobQueue) {
            if($jobQueue == null) {
                echo "error: no Job Queue initialized";
            }
            else {
                $this->_jobQueue = $jobQueue;    
            }
            
        }
        
        function transferJob($arrivalTime) {
            foreach($this->_jobQueue->_queue as $job) {
                if($job->arrival == $arrivalTime) {
                    $this->insertJob($job);
                }
            }
        }
        
        function checkArrivedJob($time) {
            foreach($this->_jobQueue->_queue as $job) {
                if($job->arrival == $time) {
                    return true;
                }
            }
            return false;
        }
        
        
    }
?>
