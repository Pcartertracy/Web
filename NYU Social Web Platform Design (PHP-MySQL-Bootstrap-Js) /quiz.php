<? include("header.php"); ?>
<body>

<form action="grade.php" method="post" id="quiz">  
  <ol>
       <li>
          <h3>(10/2)+2</h3>
            <div>
              <input type="radio" name="q1a" id="q1a-A" value="A" />
                 <label for="q1a-A">A) 2</label>
             </div>
             <div>
               <input type="radio" name="q1a" id="q1a-B" value="B" />
                <label for="q1a-B">B) 7 </label>
            </div>
            <div>
               <input type="radio" name="q1a" id="q1a-C" value="C" />
               <label for="q1a-C">C) 8</label>
            </div>
            <div>
                <input type="radio" name="q1a" id="q1a-D" value="D" />
                <label for="q1a-D">D) None</label>
            </div>
            </li>
         
        <li>
            <h3>BLK + White = </h3>
              <div>
                <input type="radio" name="q2a" id="q2a-A" value="A" />
                <label for="q2a-A">A)Gray </label>
              </div>
              <div>
                <input type="radio" name="q2a" id="q2a-B" value="B" />
                <label for="q2a-B">B) </label>
             </div>
             <div>
                 <input type="radio" name="q2a" id="q2a-C" value="C" />
                 <label for="q2a-C">C) </label>
            </div>
            <div>
                <input type="radio" name="q2a" id="q2a-D" value="D" />
                <label for="q2a-D">D) </label>
            </div>
        </li>
                
        <li>
            <h3>Pick anything but consenant</h3>
              <div>
                  <input type="radio" name="q3a" id="q3a-A" value="A" />
                  <label for="q3a-A">A) a</label>
              </div>
              <div>
                  <input type="radio" name="q3a" id="q3a-B" value="B" />
                  <label for="q3a-B">B) b</label>
              </div>
              <div>
                  <input type="radio" name="q3a" id="q3-a-C" value="C" />
                  <label for="q3a-C">C) c</label>
              </div>
              <div>
                  <input type="radio" name="q3a" id="q3a-D" value="D" />
                  <label for="q3a-D">D) d</label>
              </div>
        </li>
  </ol>
  <input type="submit" value="Finish" />
</div>
</form>
<script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
<? include("footer.php"); ?>