function display_photo(p_name,p_w,p_h,p_legend) {
    if (self.innerWidth) {
       winwidth = self.innerWidth;
       winheight = self.innerHeight;
    }
    else if (document.documentElement && document.documentElement.clientWidth) {
       winwidth = document.documentElement.clientWidth;
       winheight = document.documentElement.clientHeight;
    }
    else if (document.body) {
       winwidth = document.body.clientWidth;
       winheight = document.body.clientHeight;
    }
    if (Number(p_w) < winwidth) winwidth = Number(p_w);
    if (Number(p_h) < winheight) winheight = Number(p_h);
    winwidth += 8; winheight += 40;
  pwin=window.open("","","toolbar=0,location=0,directories=0,status=0,menubar=0,resizable=1,scrollbars=yes,copyhistory=0,width="+winwidth+",height="+winheight+",left=10,top=10" );
    pwin.document.write("<html><head>" );
    pwin.document.write("<title>Zoom</title>" );
    pwin.document.write("<style type=text/css>" );
    pwin.document.write("body {" );
    pwin.document.write("margin:0;" );
    pwin.document.write("padding:0;" );
    pwin.document.write("color:white;" );
    pwin.document.write("background-color:black; }" );
    pwin.document.write("</style>" );
    pwin.document.write("</head>" );
    pwin.document.write("<body>" );
    pwin.document.write("<img src="+p_name+" width="+p_w+" height="+p_h+">" );
    pwin.document.write("<table noborder width=100%><tr>" );
    pwin.document.write("<form><td align=left>"+p_legend+"</td>" );
    pwin.document.write("<td align=right><input type='button' value='Fermer' onClick='window.close()'></td>" );
    pwin.document.write("</tr></table></form>" );
    pwin.document.write("</body></html>" );
 }