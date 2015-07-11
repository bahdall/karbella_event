<?php

class PollController extends Controller {


	public function actionAjax()
	{
	   $pollVote = new PollVote; 
       
	   if(isset($_POST['choice']))
        {
           $choice = PollChoice::model()->findByPk($_POST['choice']);
           
           $choice->votes = $choice->votes + 1;   
           
           $pollVote->poll_id = $choice->poll_id; 
           
           $pollVote->choice_id = $choice->id;
           
           $pollVote->user_id = Yii::app()->user->id;
           
           $pollVote->ip_address = $_SERVER[HTTP_X_FORWARDED_FOR]; 
           
           $pollVote->time = date("Y.m.j ");
           
           $pollVote->save();
           $choice->save();
        }
	}
    
    public function actionResult()
	{
	   if(isset($_GET['id']))
       {
        $poll = Poll::model()->findByPk($_GET['id']);
          echo"<div class='poll-results'>";
              foreach( $poll->getChoice($poll->id) as $choice)
              {
                echo CHtml::openTag("div",array("class"=>"result"));
                    echo CHtml::openTag("div",array("class"=>"label"));
                        echo $choice->name;
                    echo CHtml::closeTag("div");
                    echo CHtml::openTag("div",array("class"=>"bar"));
                        echo "<div class='fill' style='width: ".$choice->getVote($choice->id)."%;'></div>";
                    echo CHtml::closeTag("div");
                     echo CHtml::openTag("div",array("class"=>"totals"));
                        echo "<span class='percent'>".$choice->getVote($choice->id)."%</span>";
                    echo CHtml::closeTag("div");
                echo CHtml::closeTag("div");
              }
          echo"</div>";
        
       }
	}
}