<?php
class codeWithC{
  public $unid,$CC,$out,$code,$input,$filename_code,$filename_in,$filename_error,$executable,$command,$command_error,$error,$isWindows;
    function __construct($co){
        $os = php_uname();
        $this->isWindows=false;
        if(strpos($os,"Windows") === 0){
          $this->isWindows = true;
        }
        if($this->isWindows)
        putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
        else {
          chroot(getcwd());
        }
        $this->unid = uniqid();
    	  $this->CC="gcc";
        if($this->isWindows)
    	  $this->out= "main".$this->unid.".exe";
        else {
            $this->out= "./main".$this->unid.".out";
        }
        $this->code=$co;
  	    $this->filename_code="main".$this->unid.".c";
        $this->filename_in="input".$this->unid.".txt";
        $this->filename_error="error".$this->unid.".txt";

        if($this->isWindows)
        $this->executable="main".$this->unid.".exe";
        else
        $this->executable="main".$this->unid.".out";

        $this->command=$this->CC." -lm ".$this->filename_code." -o main".$this->unid;
        $this->command_error=$this->command." 2>".$this->filename_error;
        $file_code=fopen($this->filename_code,"w+");
        fwrite($file_code,$this->code);
        fclose($file_code);
  }
  	//if(trim($code)=="")
  	//die("The code area is empty");

    function writeInput($ip){
      $this->input=$ip;
    	$file_in=fopen($this->filename_in,"w+");
    	fwrite($file_in,$this->input);
    	fclose($file_in);
    }

    function compile(){
    	shell_exec($this->command_error);
    	$this->error=file_get_contents($this->filename_error);
    }

    function execute($showOutput = true){
    	if(trim($this->error)=="")
    	{
    		if(trim($this->input)=="")
    		{
    			$output=shell_exec($this->out);
    		}
    		else
    		{
    			$this->out=$this->out." < ".$this->filename_in;
    			$output=shell_exec($this->out);
    		}
    		//echo "<pre>$output</pre>";
        if($showOutput)
    		echo nl2br("<p class='bg-success rounded p-3 text-white'>$output</p>");
            //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
    	}
    	else if(!strpos($this->error,"error"))
    	{
    		if(trim($this->input)=="")
    		{
    			$output=shell_exec($this->out);
    		}
    		else
    		{
    			$this->out=$this->out." < ".$this->filename_in;
    			$output=shell_exec($this->out);
    		}
    		//echo "<pre>$output</pre>";
        if($showOutput)
    		echo nl2br("<p class='bg-success rounded p-3 text-white'>$output</p>");
                  //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
    	}
      else{
        if($showOutput)
        {
          echo nl2br("<pre class='bg-danger rounded p-3 text-white'>$this->error </pre>");
        }
        $output="error";
      }
      return $output;
  }
  function clearFiles(){
    if($this->isWindows){
  	exec("del $this->filename_code");
    exec("del $this->filename_in");
    exec("del $this->filename_error");
  	exec("del $this->executable");
  }
  else{
    exec("rm $this->filename_code");
    exec("rm $this->filename_in");
    exec("rm $this->filename_error");
  	exec("rm $this->executable");
  }
  }
}
  ?>
