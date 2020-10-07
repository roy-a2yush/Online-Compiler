<?php
class codeWithCpp{
  public $unid,$CC,$out,$code,$input,$filename_code,$filename_in,$filename_error,$executable,$command,$command_error,$error;
    function __construct($co){
        putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
        $this->unid = uniqid();
    	  $this->CC="g++";
    	  $this->out= "main".$this->unid.".exe";
        $this->code=$co;
  	    $this->filename_code="main".$this->unid.".cpp";
        $this->filename_in="input".$this->unid.".txt";
        $this->filename_error="error".$this->unid.".txt";
        $this->executable="main".$this->unid.".exe";
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
    		if($showOutput)
    		echo nl2br("$output");
            //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
    	}
    	else if(!strpos($this->error,"error"))
    	{
        if($showOutput)
    		echo "<pre>$this->error</pre>";

    		if(trim($this->input)=="")
    		{
    			$output=shell_exec($this->out);
    		}
    		else
    		{
    			$this->out=$this->out." < ".$this->filename_in;
    			$output=shell_exec($this->out);
    		}
    		if($showOutput)
    		echo nl2br("$output");
                  //echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">$output</textarea><br><br>";
    	}
    	else if($showOutput)
    	{
    		echo nl2br("<pre>$this->error</pre>");
        $output="error";
    	}
      return $output;
  }
  function clearFiles(){
    global $filename_code,$executable;
  	exec("del $this->filename_code");
  	exec("del *.o");
  	exec("del *.txt");
  	exec("del $this->executable");
  }
}
  ?>
