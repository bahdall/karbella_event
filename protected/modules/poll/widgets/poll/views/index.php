<?php

    if($poll->isVote($poll->id))
    {
        echo CHtml::openTag('div', $this->htmlOptions)."\n";
          echo CHtml::openTag('div',array("class"=>"title" ));
            echo $poll->name;
          echo CHtml::closeTag('div');   
        
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
         echo CHtml::closeTag('div')."\n";     
    
    }else
    {
        echo CHtml::openTag('div', $this->htmlOptions)."\n";
          echo CHtml::openTag('div',array("class"=>"title" ));
            echo $poll->name;
          echo CHtml::closeTag('div');
          
            echo"<div class='results'>";
                echo"<div class='inner'>";
                echo"</div>";
                echo CHtml::button("vote",array("id"=>"poll_vote"));  
            echo"</div>";
          
                echo"<div class='vote'>";
                  echo CHtml::form( "","",array("class"=>"poll_form"));
                  
                      echo CHtml::openTag('div',array("class"=>"poll_form_group" ));
                          foreach( $poll->getChoice($poll->id) as $choice)
                          {
                            echo "<br>".CHtml::radioButton("choice",false,array('value'=>$choice->id)).$choice->name;
                          }
                      echo CHtml::closeTag('div');
                      echo CHtml::hiddenField("poll",$poll->id);
                      echo CHtml::submitButton("Vote",array("id"=>"poll_submit"));
                      echo CHtml::button("Result",array("id"=>"poll_result","onclick"=>"poll_result_load(".$poll->id.",'results > .inner')"));
                
                  
                  echo CHtml::endForm();
                echo"</div>";
        echo CHtml::closeTag('div')."\n";
    }