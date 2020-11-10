<?php
class codeWithJava{
  public $unid,$CC,$out,$code,$input,$filename_code,$filename_in,$filename_error,$runtime_file,$executable,$command,$command_error,$runtime_error_command,$error,$isWindows;
  function __construct($co){
    $os = php_uname();
    $this->isWindows=false;
    if(strpos($os,"Windows") === 0){
      $this->isWindows = true;
    }
    if($this->isWindows){
      putenv("PATH=C:\Program Files\Java\jdk1.8.0_221\bin");
    }
    else {
      chroot(getcwd());
    }
    $this->unid= uniqid();
    mkdir($this->unid);
    chdir($this->unid);
  	$this->CC="javac";
  	$this->out="java Main";
  	$this->code=$co;
  	$this->filename_code="Main".$this->unid.".java";
  	$this->filename_in="input".$this->unid.".txt";
  	$this->filename_error="error".$this->unid.".txt";
  	$this->runtime_file="runtime".$this->unid.".txt";
  	$this->executable="Main.class";
  	$this->command=$this->CC." ".$this->filename_code;
  	$this->command_error=$this->command." 2>".$this->filename_error;
  	$this->runtime_error_command=$this->out." 2>".$this->runtime_file;
  	$file_code=fopen($this->filename_code,"w+");
  	fwrite($file_code,$this->code);
  	fclose($file_code);
  }
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
 function execute($showOutput=true){
  	if(trim($this->error)=="")
  	{
  		if(trim($this->input)=="")
  		{
  			shell_exec($this->runtime_error_command);
  			$runtime_error=file_get_contents($this->runtime_file);
  			$output=shell_exec($this->out);
  		}
  		else
  		{
  			shell_exec($this->runtime_error_command);
  			$this->runtime_error=file_get_contents($this->runtime_file);
  			$this->out=$this->out." < ".$this->filename_in;
  			$output=shell_exec($this->out);
  		}
  		if($showOutput)
  		echo nl2br("<p class='bg-success rounded p-3 text-white'>$this->output</p>");
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
  		echo nl2br("<p class='bg-success rounded p-3 text-white'>$this->output</p>");
  	}
  	else if($showOutput)
  	{
  		echo nl2br("<pre>$this->error</pre>");
      $output=$this->error;
  	}
    return $output;
  }
  function clearFiles(){
    if($this->isWindows){
	  exec("del *.txt");
	  exec("del *.java");
	  exec("del *.class");
      chdir("..");
      rmdir($this->unid);
    }
    else {
      exec("rm *.txt");
      exec("rm *.java");
      exec("rm *.class");
      chdir("..");
      rmdir($this->unid);
    }
  }
}
?>
