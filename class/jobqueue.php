<?php
    /*  jobqueue.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        updated: Aug 17, 2013
        desc: job queue object responsible for holding jobs
    */
    
    //TODO -o wawi -c singleton: create this class singleton if possible
    class JobQueue extends Queue {
        
        function JobQueue() {
            echo "initialized jobqueue<br/>";
            $this->queueType = "JobQueue";    
        }
        
    }
?>
