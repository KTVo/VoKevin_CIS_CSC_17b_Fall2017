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


                function __construct($category,$question){

                    $nArgs = func_num_args();
                    if($nArgs==0||$nArgs>3){
                        $this->cat="";
                        $this->qstn="";
                    }else if($nArgs==2){
                        $this->cat=$category;
                        $this->qstn=$question;
                    }else{

                    }

                }

                function setCat($category){
                    $this->cat=$category;
                }

                function setQstn($question){
                    $this->qstn=$question;
                }


                function getCat(){
                    return $this->cat;
                }

                function getQstn(){
                    return $this->qstn;
                }

                function display(){
                    echo "<p>" . $this->qstn . "</p>";
					echo "<p>" . $this->cat . "</p>";
                }

            } //End Class

            $obj = new Question($myObj->cat,$myObj->qstn);

            $obj->getCat();

            $str=json_encode($obj);
			echo ("STRING = ".$str);
       
            print "Encoded Object: <br>".$str."<br>";

            setCookie("object3",$str,time()+(86400*30),"/");
			

           
            
        ?>
        <button onclick="window.location.assign('cookieJS.html')">Click me</button>
    </body>
</html>
