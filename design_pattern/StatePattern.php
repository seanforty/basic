<?php
/* 
 * 状态模式 State Pattern
 * 类的行为是基于它的状态改变
 * 案例: 
 *  上午工作状态很好;
 *  中午需要吃饭和午休;
 *  下午状态恢复;
 *  晚上(如果加班)感到疲惫;
 *  23点之后无法工作开始睡觉
 *  需求更改: 老板要求21之后必须下班
 */

//工作状态抽象类
interface workState{
    public function getState($work);
}

class beforeNoon implements workState{
    public function getState($work){
        if($work->timeCurr<12){
            echo("目前是" . $work->timeCurr . "点, 上午工作状态非常好<br/>");
        }else{
            $work->setState(new noon());
            $work->getState();
        }
    }
}

class noon implements workState{
    public function getState($work){
        if($work->timeCurr<13){
            echo("目前是" . $work->timeCurr . "点, 中午吃饭午休<br/>");
        }else{
            $work->setState(new afternoon());
            $work->getState();
        }
    }
}

class afternoon implements workState{
    public function getState($work){
        if($work->timeCurr<17){
            echo("目前是" . $work->timeCurr . "点, 下午工作状态比较好<br/>");
        }else{
            $work->setState(new night());
            $work->getState();
        }
    }
}

class night implements workState{
    public function getState($work){
        if($work->timeCurr<23){
            echo("目前是" . $work->timeCurr . "点, 晚上想睡觉<br/>");
        }else{
            $work->setState(new goSleep());
            $work->getState();
        }
    }
}

class goSleep implements workState{
    public function getState($work){
        if($work->timeCurr>=23){
            echo("目前是" . $work->timeCurr . "点, 睡觉时间<br/>");
        }
    }
}

class work{
    protected $timeCurr;   //int  当前时间
    protected $finish; //bool 当日工作是否完成
    protected $currentState; //object 状态类

    public function __get($name){
        return $this->$name;
    }
    
    public function __set($name,$value){
        $this->$name = $value;
    }
    
    public function work(){
        $this->currentState = new beforeNoon();
    }
    
    public function setState($obj){
        $this->currentState = $obj;
    }
    
    public function getState(){
        $this->currentState->getState($this);
    }
}


//客户端代码
class mainStream{
    public function goWork(){
        $state = new work();
        $state->timeCurr = 9;
        $state->getState();
        $state->timeCurr = 12;
        $state->getState();
        $state->timeCurr = 14;
        $state->getState();
        $state->timeCurr = 18;
        $state->getState();
        $state->timeCurr = 23;
        $state->getState();
    }
}

$work = new mainStream();
$work->goWork();

?>