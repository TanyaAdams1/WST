#!/usr/bin/env python
import re

import fcntl

print "Content-type: text/html\n\n"
try:
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
except Exception as e:
    print "{code:0,msg:\"Internal error\"}\n"
    exit(1)
