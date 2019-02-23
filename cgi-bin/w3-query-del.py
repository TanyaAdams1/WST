#!/usr/bin/env python
import cgi
import cgitb
import re

import fcntl


def print_res():
    print "Content-type: text/html\n\n"
    f = open("../homework/w3/query/w3-query.dat")
    fcntl.flock(f, fcntl.DN_ACCESS)
    template = "".join(open("../homework/w3/src/table.html").readlines()).split("<!-- insert point-->")
    data = ""
    lines = f.readlines()
    fcntl.flock(f, fcntl.F_UNLCK)
    f.close()
    i = 0
    for line in lines:
        data += "<tr>\n"
        fields = re.split("\t+", line)
        for field in fields[0:4]:
            data += "<td>" + str(field) + "</td>\n"
        data += """<td>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="""
        data += str(i) + """ value="1">
                  </td>
                  </tr>\n
            """
        i += 1
    if lines.__len__() == 0:
        data = "<tr>\n<h3>Nothing</h3></tr>"
    print template[0] + data + template[1]


def main():
    try:
        cgitb.enable()
        del_list = []
        form = cgi.FieldStorage()
        for key in form.keys():
            del_list.append(int(key))
        fin = open("../homework/w3/query/w3-query.dat")
        fcntl.flock(fin, fcntl.DN_ACCESS)
        lines = fin.readlines()
        fin.close()
        fout = open("../homework/w3/query/w3-query.dat", "w")
        for line, i in zip(lines, range(lines.__len__())):
            if not i in del_list:
                fout.write(line)

        fcntl.flock(fout, fcntl.F_UNLCK)
        fout.close()
        print_res()
    except Exception as e:
        print """
            Content-type: text/html
            
            <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
            <html><head>
            <title>Internal Server Error</title>
            </head><body>
            <h1>Internal Server Error</h1>
            <p>The server encountered an uncaughted exception and was unable to complete
            your request.</p>
            <p>Please contact the server administrator at 
             billtao@pku.edu.cn to inform them of the time this error occurred,
             and the actions you performed just before this error.</p>
            <p>More information about this error may be available
            in the server error log.</p>
            </body></html>
            """
        exit(-1)


main()
