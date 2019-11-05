<?php
class Sistema
{
    public $sisNombre="Software";
    
    public function mostrar_post(){
        foreach($_POST as $campo => $valor) {
            echo "El campo <b>".$campo."</b> tiene <b>".$valor."</b><br>";
        }
    }
    
    public function obtener_post(){
        $arr=array();
        foreach($_POST as $campo => $valor) {
            $arr[$campo] = $valor;
        }
        return $arr;
    }
    
    public function mostrar_get(){
        foreach($_GET as $campo => $valor) {
            echo "El campo <b>".$campo."</b> tiene <b>".$valor."</b><br>";
        }
    }
    
    public function obtener_get(){
        $arr=array();
        foreach($_GET as $campo => $valor) {
            $arr[$campo] = $valor;
        }
        return $arr;
    }
    
    public function mostrar_arrJS($arr)
    {
        echo '[';
        for($i=0;$i<count($arr);$i++)
        {
            if($i>0){ echo ',{'; } else { echo '{'; }
            $f=0;
            foreach($arr[$i] as $x => $x_value) 
            {
                if($f>0){ echo ','; }
                if(is_numeric($x_value))
                {
                    echo "'".$x."':".$x_value;
                }
                else
                {
                    echo "'".$x."':'".$x_value."'";
                }                
                $f++;
            }
            echo '}';
        }
        echo ']';
    }
    
     public function arrQuery($query)
    {
        $arr = array();
        $r=array();
        $conn=odbc_connect('DSN de sistema','usuario','clave');        
        $sql=utf8_decode($query);
        $rs=odbc_exec($conn,$sql);
        while($row = odbc_fetch_array($rs))
        {
            foreach($row as $x => $x_value)
            {
                $r[$x] = utf8_encode($x_value);        
            }
            $arr[] = $r;            
        }
        odbc_close($conn);
        return $arr;
    }
    
    public function execQuery($query)
    {
        $conn=odbc_connect('DSN de sistema','usuario','clave');        
        $sql=utf8_decode($query);
        $r=odbc_exec($conn,$sql);
        odbc_close($conn);
        return $r;
    }
}