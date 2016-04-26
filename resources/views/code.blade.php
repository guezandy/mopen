@extends('upload3')

@section('code')

  <!-- /btn-group -->
  <div class="btn-group" style="margin-bottom:5px;">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Add new code file
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="javascript:void(0);">Java</a></li>
      <li><a href="javascript:void(0);">XML</a></li>
      <li><a href="javascript:void(0);">Something else here</a></li>
    </ul>
  </div>
</div>

<div class="col-sm-6">
	<p>Filename: 
		<input type="text" value="foo.js" id="mode"> <button type="button" onclick="change()">Change Syntax</button>
		Current Syntax: <span id="modeinfo">text/plain</span>
	</p>
	<form>
		<textarea id="code" name="code">
This is the editor.
// It starts out in plain text mode,
#  use the control below to load and apply a mode
  "you'll see the highlighting of" this text /*change*/.
public Class {
	int x = 5;
	int y = 5;
}
		</textarea>
	</form>
</div>
<div class="col-sm-6">
	<p>Filename: 
		<input type="text" value="foo.java" id="mode2"> 
		Current Syntax: <span id="modeinfo2">text/x-java</span>
	</p>
	<textarea id="java-code">
import com.demo.util.MyType;
import com.demo.util.MyInterface;

public enum Enum {
  VAL1, VAL2, VAL3
}

public class Class<T, V> implements MyInterface {
  public static final MyType<T, V> member;
  
  private class InnerClass {
    public int zero() {
      return 0;
    }
  }

  @Override
  public MyType method() {
    return member;
  }

  public void method2(MyType<T, V> value) {
    method();
    value.method3();
    member = value;
  }
}
	</textarea>
	<p>Filename: 
		<input type="text" value="foo.xml" id="mode2"> 
		Current Syntax: <span id="modeinfo2">application/xml</span>
	</p>
	<textarea id="xml-code" name="xml-code">
&lt;html style="color: green"&gt;
  &lt;!-- this is a comment --&gt;
  &lt;head&gt;
    &lt;title&gt;HTML Example&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    The indentation tries to be &lt;em&gt;somewhat &amp;quot;do what
    I mean&amp;quot;&lt;/em&gt;... but might not match your style.
  &lt;/body&gt;
&lt;/html&gt;
	</textarea>
@endsection