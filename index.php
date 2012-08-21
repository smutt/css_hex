<?php
  error_reporting(E_ALL);
  $hexRows = 10;
  $hexCols = 20;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <link type="text/css" rel="stylesheet" href="hex.css">
<script type="text/javascript">
<!--
function fmod(x, y){
  // discuss at: http://phpjs.org/functions/fmod    // +   original by: Onno Marsman
  var tmp, tmp2, p = 0, pY = 0, l = 0.0, l2 = 0.0;
  
  tmp = x.toExponential().match(/^.\.?(.*)e(.+)$/);
  p = parseInt(tmp[2], 10)-(tmp[1]+'').length;    tmp = y.toExponential().match(/^.\.?(.*)e(.+)$/);
  pY = parseInt(tmp[2], 10)-(tmp[1]+'').length;
  
  if (pY > p){
    p = pY;
  }
  tmp2 = (x%y);
  
  // toFixed will give an out of bound error so we fix it like this
  if (p < -100 || p > 20){        
    l  = Math.round(Math.log(tmp2)/Math.log(10));
    l2 = Math.pow(10, l);
    return (tmp2 / l2).toFixed(l-p)*l2;    
  }else{
    return parseFloat(tmp2.toFixed(-p));
  }
}

// 1 = mouseover
// 2 = mouseout
// 3 = mousedown
function setPic(picId, sv){
  picSrc = document.getElementById(picId).src;
  switch (sv){
    case '1':
      if(picSrc.indexOf("hex88.png") != -1){
        document.getElementById(picId).src = 'img/hex88Green.png';;
      }
      break;

    case '2':
      if(picSrc.indexOf("hex88Green.png") != -1){
        document.getElementById(picId).src = 'img/hex88.png';;
      }
      break;

    case '3':
      if(picSrc.indexOf("hex88.png") != -1 || picSrc.indexOf("hex88Green.png") != -1){
        document.getElementById(picId).src = 'img/hex88Pool.png';;
      }else{
        document.getElementById(picId).src = 'img/hex88.png';;
      }
      break;
  }
}

function getStyle(id, attr){
  return document.getElementById(id)[attr];
}

function setStyle(id, attr, val){
  document.getElementById(id).style[attr] = val;
}

// Scales board by passed multiplier
// Limits scaling to reasonable limits
function scale(m){
  var min = 11;
  var max = 176;
  if(m > 1 && getStyle('0t0', 'offsetWidth') >= max){
    return;
  }else if(m < 1 && getStyle('0t0', 'offsetWidth') <= min){
    return;
  }else{
    if(window.getComputedStyle){
      for(var ii=0; ii < <?php print $hexRows; ?>; ii++){
        for(var jj=0; jj < <?php print $hexCols; ?>; jj++){
          setStyle(ii + 't' + jj, 'width', getStyle(ii + 't' + jj, 'offsetWidth') * m + 'px');
          setStyle(ii + 't' + jj, 'height', getStyle(ii + 't' + jj, 'offsetHeight') * m + 'px');
          setStyle(ii + 'h' + jj, 'width', getStyle(ii + 'h' + jj, 'offsetWidth') * m + 'px');
          setStyle(ii + 'h' + jj, 'height', getStyle(ii + 'h' + jj, 'offsetWidth') * 0.75 + 'px');
        }
        setStyle('r' + ii, 'width', getStyle('r' + ii, 'offsetWidth') * m + 'px');
        setStyle('r' + ii, 'left', getStyle('0t0', 'offsetWidth') / 2 + 'px');
      }
      // JS is ambiguous when adding strings and integers in the same statement
      var bWidth = (getStyle('0h0', 'offsetWidth') * jj) + (getStyle('0h0', 'offsetWidth') / 2);
      setStyle('board', 'width', bWidth + 'px');
      
      var bHeight = (getStyle('0h0', 'offsetHeight') * (ii - 1)) + getStyle('0t0', 'offsetHeight');
      setStyle('board', 'height', bHeight + 'px');
      
    }else{
      alert('Not Supported');
    }
  }
}
//-->
</script>
  </head>
  <body onload="javascript: scale('0.5')">
    <div id="menu">
      <div id="baby-board">
<?php
   for($ii=0; $ii < $hexRows; $ii++){
     if(fmod($ii, 2) == 0)  print "\n<div class=\"baby-row baby-offset\" id=\"br" . $ii . "\">";
     else{
       print "\n<div class=\"baby-row\" id=\"br" . $ii . "\">";
     }
     for($jj=0; $jj < $hexCols; $jj++){
       print "\n<span class=\"baby-hex\" id=\"" . $ii . "bh" . $jj . "\">";
       print "\n  <img class=\"baby-tile\" src=\"img/hex88.png\" id=\"" . $ii . "bt" . $jj . "\" /></a>";
       print "\n</span>";
     }
     print "\n</div>";
   }
?>
      </div>
<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ea commodo dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris  ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

    </div>
    <br/>
    <div id="board-container">
    <center>
      <a onmousedown="javascript: scale('0.5')"><img src="img/subtract.png" /></a>
      <a onmousedown="javascript: scale('2')"><img src="img/add.png" /></a>
    </center>
    <br/>
    <div id="board">
<?php
   for($ii=0; $ii < $hexRows; $ii++){
     if(fmod($ii, 2) == 0)  print "\n<div class=\"row offset\" id=\"r" . $ii . "\">";
     else{
       print "\n<div class=\"row\" id=\"r" . $ii . "\">";
     }
     for($jj=0; $jj < $hexCols; $jj++){
       print "\n<span class=\"hex\" id=\"" . $ii . "h" . $jj . "\">";
       print  "\n  <a onmouseover=\"javascript: setPic('" . $ii . "t" . $jj . "', '1')\"
               onmouseout=\"javascript: setPic('" . $ii . "t" . $jj . "', '2')\"
               onmousedown=\"javascript: setPic('" . $ii . "t" . $jj . "', '3')\">";
       print "\n  <img class=\"tile\" src=\"img/hex88.png\" id=\"" . $ii . "t" . $jj . "\" /></a>";
       print "\n</span>";
     }
     print "\n</div>";
   }
?>
    </div>
    </div>
  </body>
</html>