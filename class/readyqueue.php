<?php
    /*  readyqueue.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        update: Aug 19, 2013
        desc: ready queue or memory for holding jobs
        
    */
    
    class ReadyQueue extends Queue {
        
        protected $_jobQueue;
        
        function ReadyQueue(JobQueue $jobQueue) {
            $this->queueType = "ReadyQueue";
            echo "initialized readyqueue<br/>";
            if($jobQueue instanceof JobQueue) {
                $this->_jobQueue = $jobQueue;
            }
            else {
                echo "error: no Job Queue initialized<br/>";
            }
            
        }
        
        function transferJob($arrivalTime) {
            foreach($this->_jobQueue->_queue as $job) {
                if($job->arrival == $arrivalTime) {
                    $this->insertJob($job);
                    $this->_jobQueue->removeJob($job);
                    echo "transfered job {$job->name} from job queue to ready queue<br/>";
                }
            }
            ksort($this->_queue);
        }
        
        function checkArrivedJob($time) {
            foreach($this->_jobQueue->_queue as $job) {
                if($job->arrival == $time) {
                    return true;
                }
            }
            return false;
            
        }
        
        function getJobQueue() {
            return $this->_jobQueue;
        }
        
        function viewJobQueue() {
            $this->_jobQueue->viewQueue();
        }
        
        function sendJob() {
            //finds the shortest burst->arrival->name
            if(empty($this->_queue)) {
                echo "empty Readyqueue<br/>";
            }
            else {
                $shortestBurst = $this->getShortest("burst", $this->_queue);
                $shortestArrival = $this->getShortest("arrival", $shortestBurst);
                $shortestName = $this->getShortest("name", $shortestArrival);
                
                //$job
                $short = clone($shortestName[0]);
                $this->removeJob($shortestName[0]);
                echo "send job {$short->name} from readyqueue to cpu<br/>";
                return $short;   
            }
        }
        
    }
?>
