<?php
    /*  jobqueue.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        updated: Aug 17, 2013
        desc: job queue object responsible for holding jobs
    */
    
    class JobQueue {
        private $_jobQueue = array();
        function JobQueue(array $job = null) {
            if($job != null) {
                foreach($job as $j) {
                    $j['']
                }
            }
        }
    }
?>
