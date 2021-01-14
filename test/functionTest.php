<?php
require_once 'function.php';

class FunctionTest extends \PHPUnit\Framework\TestCase{
  protected function setUp(){
    $this->user = array('name' => "jun","email"=>"kazu@gmail.com","message"=>"宜しく",'csrf_token'=> get_csrf_token() );
  }
  public function testGetCsrfToken(){
    $this->assertEquals(32, strlen(get_csrf_token()));
  }
  public function testH(){
    $this->assertEquals($this->user['name'],h($this->user['name']));
    $this->assertEquals("&lt;script&gt;alert(&#039;test&#039;)&lt;/script&gt;",h("<script>alert('test')</script>"));
  }
  public function testSendMail(){
    $this->assertTrue(send_mail($this->user));
    $this->assertFalse(send_mail([]));
  }
  public function  testSendNotify(){
    $this->assertEquals(200,send_notify($this->user)['status']);
    $this->assertFalse(send_notify([]));
  }
  public function testValidationUserName(){
    $user = $this->user;
    $this->assertEmpty(validation(($user)));
    $user['name']="";
    $this->assertEquals("「氏名」は必ず入力してください。",validation(($user))[0]);
    $user['name']=str_repeat("a",31);
    $this->assertEquals("「氏名」は30文字以内で入力をしてください",validation(($user))[0]);
  }
  public function testValidationUserEmail(){
    $user = $this->user;
    $this->assertEmpty(validation(($user)));
    $user['email']="";
    $this->assertEquals("メールアドレスは必ず入力してください。",validation(($user))[0]);
    $invalidEmails=["user.com","user@gmail","user@@.com","user@info..com"];
    for($i=0; $i <count($invalidEmails) ; $i++) {
      $user['email']=$invalidEmails[$i];
      $this->assertEquals("正しい形式でメールアドレスを入力をしてください。",validation(($user))[0]);
    }
  }
  public function testValidationUserMessage(){
    $user = $this->user;
    $this->assertEmpty(validation(($user)));
    $user["message"] = "";
    $this->assertEquals("お問い合わせ内容は必ず入力をしてください。",validation(($user))[0]);
  }
}

// https://kazu-lab.herokuapp.com/ | https://git.heroku.com/kazu-lab.git
