<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read Cookie from Javascript and Translate into PHP</title>
    </head>
    <script type="text/javascript" src="cookieFunctions.js"></script>
    <body>
        <?php
            echo "Gotta Read the cookie </br>";
            $text=$_COOKIE["object"];
            echo $text."</br>";
            $myObj = json_decode($text);
            echo '<pre>';
            var_dump($myObj);
            echo '</pre>';


            class Question{
                var $cat;
                var $qstn;
                var $ans;

                function __construct($category,$question,$answers){

                    $nArgs = func_num_args();
                    if($nArgs==0||$nArgs>3){
                        $this->cat="";
                        $this->qstn="";
                    }else if($nArgs==3){
                        $this->cat=$category;
                        $this->qstn=$question;
                        $this->ans=$answers;
                    }else if($nArgs==2){
                        $this->cat=$category;
                        $this->qstn=$question;
                    }else{
                        $this->cat=$category->cat;
                        $this->qstn=$category->qstn;
                        $this->ans=$category->answers;
                    }

                }

                function setCat($category){
                    $this->cat=$category;
                }

                function setQstn($question){
                    $this->qstn=$question;
                }

                function addAns($answer){
                    $this->ans=array_push($this->ans, $answer);
                }

                function getCat(){
                    return $this->cat;
                }

                function getQstn(){
                    return $this->qstn;
                }

                function getAns($number){
                    if($number>=0&&$number<sizeof($this->ans)){
                        return $this->ans[$number];
                    }else{
                        return "This is not a Question";
                    }
                }

                function display(){
                    echo "<p>" . $this->qstn . "</p>";
                    for($i=0;$i<sizeof($this->ans);$i++){
                        if(sizeof($this->ans[$i])>0){
                            echo '<input type="radio" name='.$this->cat." value=".
                        ">".$this->ans[$i]."<br> </br>";
                        }
                    }
                }

            } //End Class

            $obj = new Question($myObj->cat,$myObj->qstn,$myObj->ans);

            $obj->display();

            $str=json_encode($obj);
       
            print "Encoded Object: <br>".$str."<br>";

            setcookie("object3",$str,time()+(86400*30),"/");

            
            
        ?>
        <button onclick="window.location.assign('cookieJS.html')">Click me</button>
    </body>
</html>
