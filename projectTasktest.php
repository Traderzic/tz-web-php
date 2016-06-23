<?php
include "models/projectTaskDAO.php";

class ProjectTasktest extends projectTaskDAO
{
   private $idTask;
   private $idProject=1;
   private $attendee=5;
   private $description="TaskDescription";
   private $title ="NewTask";
   private $price=5.2;
   private $duration="23:12:00";
   private $status="updating";
   private $percent=58.25;
  
  
  public function testCreateTask(){
    $task = new projectTask($this->idProject,
                            $this->attendee,
                            $this->description,
                            $this->title,
                            $this->price,
                            $this->duration,
                            $this->status,
                            $this->percent);
    $taskDAO = new projectTaskDAO();
    $taskDAO = projectTaskDAO::createPT($task);
    $this->assertNotNull("Task should not be null ",$taskDAO);
    $this->assertInternaltype("int",$taskDAO);
    $this->idTask=$taskDAO;
  }
  
  
  
  
  
  public function testUpdateTask(){
    $task = new projectTaskDAO();
    $id = $this->idProject;
    $idTask =$this->idTask;
    $this->description="NewDescription";
    $this->title="NewTitle";
    $this->price=$this->price+10;
    $this->duration="23:14:00";
    $this->status="Ending";
    $this->percent=$this->percent+10;
    $task->updatePercent($idTask,$id,$this->percent);
    $task->updateDuration($idTask,$id,$this->duration);
    $task->updateStatus($idTask,$id,$this->status);
    $task->updatePrice($idTask,$id,$this->price);
    $task->updateTitle($idTask,$id,$this->title);
    $task->updateDescription($idTask,$id,$this->description);
    $taskDAO = projectTaskDAO::createPT($task);
    $this->assertNotNull("Task should not be null ",$taskDAO);
    $this->assertInternaltype("int",$taskDAO);
    
  }
  
  public function testDeleteTask(){
    $taskDAO = new projectTaskDAO();
    $taskDAO->deleteFromProject($idTask,$this->idProject);
    
  }
  
  public function testCheckTask_Created_Updated(){
    $taskDAO = new projectTaskDAO();
    $task = $taskDAO->getFromProject($this->idProject);
    
    $this->assertEquals(
      array("idProject"=>$this->idProject,
            "title"=>$this->title,
            "description"=>$this->description,
            "attendee"=>$this->attendee,
            "price"=>$this->price,
            "duration"=>$this->duration,
            "status"=>$this->status,
            "percent"=>$this->percent),
      $task);
  }
  
  public function testCheckTask_Deleted(){
    $taskDAO = new projectTaskDAO();
    $task = $taskDAO->getFromProject($this->idProject);
    $this->assertNull("Task should be null",$task);
  }
  
  
}
