<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of poll
 *
 * @author Bharat
 */
include_once './class/db_functions.php';
class Poll {
    private $pollID = null;
    private $pollTitle=null;
    private $pollDesc=null;
    private $author=null;
    private $startTimeStamp=null;
    private $endTimeStamp=null;
    private $options = Array();
    private $dbfunction=null;
    
    public function __construct($pid) {
        $this->dbfunction = new DB_Functions();
        if($pid==NULL)
        {
            
        }
        else{
            
            $result = $this->dbfunction->queryDB("select * from poll where PollID=$pid");
            if($result){
                
            $data = mysqli_fetch_array($result);
            $this->pollID=$data["PollID"];
            $this->UserID=$data["UserID"];
            $this->pollTitle=$data["Title"];
            $this->pollDesc=$data["Description"];
            $this->author=$data["UserID"];
            $this->startTimeStamp=$data["StartTimeStamp"];
            $this->endTimeStamp=$data["EndTimeStamp"];
            $this->options = explode(",",$data["Options"]);
            
            }
            else{
                die("Error");
                
            }
            
        }
    }
    
    public function setData($title,$desc, $userid,$startTimeStamp,$endTimeStamp,$options){
        $this->pollTitle=$title;
        $this->pollDesc=$desc;
        $this->author=$userid;
        $this->startTimeStamp=$startTimeStamp;
        $this->endTimeStamp=$endTimeStamp;
        $this->options = $options;    
    }

    public function getPollID(){
        return $this->pollID;
    }
    
    public function getPollTitle(){
        return $this->pollTitle;
    }
    
    public function getPollDescription(){
        return $this->pollDesc;
    }
    
    public function getAuthorID(){
        return $this->UserID;
    }
    
    public function getStartTimestamp(){
        return $this->startTimeStamp;
    }
    
    public function getEndTimestamp(){
        return $this->endTimeStamp;
    }
    
    public function displayPoll(){
        ?>
<div class="panel panel-primary" style="margin:20px" >
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $this->pollTitle;?></h3>
        <h6><?php echo $this->pollDesc;?></h6>
    </div>   

	<div class="panel-body"  style="margin:0px; width:100%;">
            <div id="Main">
<?php

        $count=count($this->options);
        $bool = $this->isVotedByUser();
        
        if($bool==true){
           
             $this->displayPollResult();
        }
        else{
            ?>
                <form id="voteform">
                <ul class="list-group">
                <?php
            
            
            
            for($i=0;$i<$count;$i++)
            {
                ?>
                    <li class="list-group-item" style="margin:0px; width:100%; ">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="poll:<?php echo $this->pollID; ?>" value="<?php echo $this->options[$i];?>">
                                    <?php echo $this->options[$i]?>
                                </label>
                            </div>
                        </li>
                    <?php
            } 
            ?>
                </ul>
                </form>
            
                <div style="margin:25px; ">

        
                    <?php
            
            echo "<input type='button' class='btn btn-primary btn-lg' name='conVote' value='Vote' onClick='vote($this->pollID)'> ";
        }
        
        ?>
           </div>   
            </div>    
	</div>  
</div>
             <?php

       
    }
    public function save(){
        
        if($this->dbfunction->queryDB("select PollID from poll where PollID=".$this->pollID)){

        }
        else
        {
            
            $stringOptions = "";
            $optionCount = count($this->options);
            for ($counter=0;$counter<$optionCount;$counter++)
            {
            $option = $this->options[$counter];
            if($optionCount-$counter==1){

                $stringOptions.=$option;
            }else{

            $stringOptions .=$option.",";}

            }
            
            
            $sql = "INSERT INTO poll (`PollID`, `UserID`, `Title`, `Description`, `Options`, `StartTimeStamp`, `EndTimeStamp`, `Status`) VALUES (NULL, '$this->author', '$this->pollTitle', '$this->pollDesc', '$stringOptions',$this->startTimeStamp,$this->endTimeStamp, '0');";
            if($this->dbfunction->queryDB($sql))
            
            {
                return TRUE;
            }
            else{
                return FALSE;
            }
            
        }
    }  
    private function isInOption($match){
        return array_search($match, $this->options);
    }
    public function isVotedByUser(){
        if (session_status() == PHP_SESSION_NONE) {session_start();}
        $sql = "select VoteID from pollvotes where UserID='".$_SESSION["uid"]."' and PollID='$this->pollID'";
        
        $result = $this->dbfunction->queryDB($sql);
        if(mysqli_num_rows($result)>0)
        {
            
            return TRUE;
        }
        else {
            
            return FALSE;
        }        
    }
    public function displayPollResult(){
        ?>
         
		<?php
                $voteCount = $this->getVoteCount();
                if($this->getVoteCount()==0){
                    echo "No Voting Done Yet";
                    return;
                }
                $counter = 0;
                $results[] = array();
                
                foreach ($this->options as $option) {
                    $results[$counter] = mysqli_fetch_array($this->dbfunction->queryDB("select count(*) count from pollvotes where PollID='$this->pollID' and Vote='$counter'"))["count"];
                    $percentVote = ($results[$counter]/$voteCount)*100;
                ?>
	  
	     <span name="poll_bar"><?php echo $option; ?></span> <span name="poll_val"><?php echo $percentVote; ?>%</span><br/>
      


<?php
$counter++; 
    }        
    }
    public function getVoteCount()
    {
     return mysqli_fetch_array($this->dbfunction->queryDB("select count(*) count from pollvotes where PollID='$this->pollID'"))["count"];
        
    }
    
    public function vote($vote)
    {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!$this->isVotedByUser()){
        $index = $this->isInOption($vote);

        $flag = TRUE;
        if($index===0){
            $sql = "INSERT INTO pollvotes (`VoteID`,`PollID`,`UserID`,`Vote`) values (NULL,'$this->pollID','".$_SESSION["uid"]."','0');";
        }elseif($index>0){
            $sql = "INSERT INTO pollvotes (`VoteID`,`PollID`,`UserID`,`Vote`) values (NULL,'$this->pollID','".$_SESSION["uid"]."','".$index."');";
        }
        else
        {
            echo "error new";
            $flag = false;
        }
        
        if($flag){
            $sql = "INSERT INTO pollvotes (`VoteID`,`PollID`,`UserID`,`Vote`) values (NULL,'$this->pollID','".$_SESSION["uid"]."','".$index."');";
            
            if($this->dbfunction->queryDB($sql)){
                
                return TRUE;
            }
            else{
                
                return FALSE;

            }
        }
        return false;
        }
    }
}
