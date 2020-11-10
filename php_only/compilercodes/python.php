<?php
class codeWithPython{
  public $unid,$CC,$code,$input,$filename_code,$filename_in,$filename_error,$command,$command_error,$error,$isWindows,$output;
  function __construct($co){
    $os = php_uname();
    $this->isWindows=false;
    if(strpos($os,"Windows") === 0){
      $this->isWindows = true;
    }
    if($this->isWindows){
      putenv("PATH=C:\Windows");
      $this->CC="py";
    }
    else{
      $this->CC="python3";
      chroot(getcwd());
    }
  	//$out="./a.out";
    $unid = uniqid();
  	$this->code=$co;
  	$this->filename_code="main".$this->unid.".py";
  	$this->filename_in="input".$this->unid.".txt";
  	$this->filename_error="error".$this->unid.".txt";
  	$this->command=$this->CC." ".$this->filename_code;
  	$this->command_error=$this->command." 2>".$this->filename_error;
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
  			$this->output=shell_exec($this->command);
  		}
  		else
  		{
  			$this->command=$this->command." < ".$this->filename_in;
  			$this->output=shell_exec($this->command);
  		}
      if($showOutput)
  		echo nl2br("<p class='bg-success rounded p-3 text-white'>$this->output</p>");
  	}
  	else{
        if($showOutput)
        {
          echo nl2br("<pre class='bg-danger rounded p-3 text-white'>$this->error </pre>");
        }
        return nl2br($this->error);
      }
      return nl2br($this->output);
 }
 function clearFiles(){
  if($this->isWindows){
  	exec("del $this->filename_code");
  	exec("del $this->filename_in");
    exec("del $this->filename_error");
  }
  else{
    exec("rm $this->filename_code");
  	exec("rm $this->filename_in");
    exec("rm $this->filename_error");
  }
 }
}
?>
