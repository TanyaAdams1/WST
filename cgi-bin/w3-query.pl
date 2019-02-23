#!/usr/bin/perl -w
print "Content-type: application/json\n\n";
open FH, '>> ../homework/w3/query/w3-query.dat' or die "{code:2,msg:\"Internal error\"}\n";
flock(FH,8);
my $query_str=<STDIN>;
my @name_val_pair=split(/&/,$query_str);
if(@name_val_pair<4){
    die "{code:1,msg:\"Invalid query string\"}\n";
}
my $res="";
foreach my $name_val (@name_val_pair){
    my($name,$val)=split(/=/,$name_val);
    unless((name ne "age"&&$val)||$val==0){
        die "{code:1,msg:\"Invalid query string\"}\n";
    }
    $val =~ tr/+/ /;
    $val =~ s/%([\dA-Fa-f][\dA-Fa-f])/pack("C",hex($1))/eg;
    $res=$res.$val."\t\t\t";
}
print FH $res,"\n";
flock(FH,2);
print "{\"code\":0,\"msg\":\"Form recorded\"}\n";