<div class="form">

  <ul class="tab-group">
    <li class="tab active"><a href="#signup">Sign Up</a></li>
    <li class="tab"><a href="#login">Log In</a></li>
  </ul>
  <div class="tab-content">

    <div id="signup">
      <h1>Sign Up for Free</h1>
      <form action="/" method="post">
        <div class="top-row">
          <div class="field-wrap">
            <label>First Name<span class="req">*</span></label>
            <input type="text" required autocomplete="off" />
          </div>
          <div class="field-wrap">
            <label>Last Name<span class="req">*</span></label>
            <input type="text" required autocomplete="off" />
          </div>
        </div>
        <div class="field-wrap">
          <label>Email Address<span class="req">*</span></label>
          <input type="email" required autocomplete="off" />
        </div>
        <div class="field-wrap">
          <label>Set A Password<span class="req">*</span></label>
          <input type="password" required autocomplete="off" />
        </div>
        <button type="submit" class="button button-block" />Get Started</button>
      </form>
    </div>

    <div id="login">
      <h1>Welcome Back!</h1>
      <form action="/" method="post">
        <div class="field-wrap">
          <label>Email Address<span class="req">*</span></label>
          <input type="email" required autocomplete="off" />
        </div>
        <div class="field-wrap">
          <label>Password<span class="req">*</span></label>
          <input type="password" required autocomplete="off" />
        </div>
        <p class="forgot"><a href="#">Forgot Password?</a></p>
        <button class="button button-block" />Log In</button>
      </form>
    </div>

  </div>
  <!-- tab-content -->

</div>
<!-- /form -->
<script src='modules/jquery.min.js'></script>
<script type="text/javascript" src="modules/index.js"></script>

<!--
Copyright (c) 2016 by Captain Anonymous (http://codepen.io/anon/pen/dXyzKq)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->

