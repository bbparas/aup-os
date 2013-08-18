<?php
    /*  cpu.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        updated: Aug 18, 2013
        desc: cpu class, main os object
        
    */
    
    class CPU {
        protected $_activeJob = array();
        
        function runCPU($jobQueue, $readyQueue) {
            $time = 0;
            while(!($jobQueue->isEmpty) || !($readyQueue->isEmpty)) {
                if(empty($this->_activeJob)) {
                    
                }
            }
        }
        
        function showActiveJob() {
            echo "activejob<br/><pre>";
            print_r($this->_activeJob);
            echo "</pre>";
        }
    }
?>
